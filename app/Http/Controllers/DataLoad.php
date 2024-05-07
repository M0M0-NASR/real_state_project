<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\property;
use Illuminate\Http\Request;
use PhpParser\Builder\Property as BuilderProperty;
use Illuminate\Support\Facades\DB;

class DataLoad extends Controller
{
    public function LoadBuyPage()
    {
        $Property = Property::where('PropertyStatus','Buy')->orderBy('created_at','desc')->paginate(5);
        return view('buy.Buy',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);
    }
    public function LoadRentPage()
    {
        $Property = Property::where('PropertyStatus','Rent')->orderBy('created_at','desc')->paginate(5);
        return view('RentPage.Rent',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);
    }
    public function LoadAddHomePage()
    {
        return view('AddHome.AddHome');
    }
    public function LoadSearchPage()
    {
        return view('Search.search');
    }
    public function LoadUpdateHomePage(Request $req)
    {

        $id = $req->PropertyId;
        $Property = Property::where('id',$id)->get();
        return view('AddHome.Update',['Property'=>$Property]);
    }
}
