<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property;
use App\Models\Type;
use PhpParser\Builder\Property as BuilderProperty;
use PhpParser\Node\Stmt\Property as StmtProperty;
use TijsVerkoyen\CssToInlineStyles\Css\Property\Property as PropertyProperty;

class SearchController extends Controller
{
    protected function TakeInputsInSearchPage()
    {
        $location = $_POST['Location'];
        $TypeID = $_POST['PropertyType'];
        $MinPrice = $_POST['MinPrice'];
        $MaxPrice = $_POST['MaxPrice'];
        $Bedrooms = $_POST['Bedrooms'];
        $Bathrooms = $_POST['Bathrooms'];
        $FormInput = array(['Location'=>$location,'TypeID'=>$TypeID,'Bedrooms'=>$Bedrooms,'Bathrooms'=>$Bathrooms]);
        return $FormInput;
    }
    protected function SearchByLocation($location)
{
    $FoundedProperties = Property::where('Location',$location)->get();
    return $FoundedProperties;

}
protected function SearchByMinPrice($MinPrice)
{
    $FoundedProperties = Property::where('Price','>=',$MinPrice)->get();
    return $FoundedProperties;
}
protected function SearchByMaxPrice($MaxPrice)
{
    $FoundedProperties = Property::where('Price','<=',$MaxPrice)->get();
    return $FoundedProperties;
}
protected function SearchByBedrooms($Bedrooms)
{
    $FoundedProperties = Property::where('Bedrooms',$Bedrooms)->get();
    return $FoundedProperties;

}
protected function SearchByBathrooms($Bathrooms)
{
    $FoundedProperties = Property::where('Bathrooms',$Bathrooms)->get();
    return $FoundedProperties;

}
//////////////////////////////////////////////////////////////////////////////////////////
    protected function Search(Request $request)
    {
        $location = $request->Location;
        $PropertyStatus = $request->PropertyStatus;
        $FoundedProperties =Property::where('PropertyStatus',$PropertyStatus)
        ->when($request->Location, function($query) {
            $query->where('Location', request()->Location);
        })
        ->when($request->PropertyType, function($query) {
            $query->where('TypeID', request()->PropertyType);
        })

        ->when($request->Bedrooms, function($query) {
            $query->where('Bedrooms','Like','%'.request()->Bedrooms.'%');
        })
        ->when($request->Bathrooms, function($query) {
            $query->where('Bathrooms','Like','%'. request()->Bathrooms.'%' );
        })
        ->when($request->MinPrice, function($query) {
            $query->Where('Price','>=',request()->MinPrice);
        })->when($request->MaxPrice, function($query) {
            $query->Where('Price','<=',request()->MaxPrice);
        })
        ->orderBy('created_at','desc')
        ->paginate(6);




        return view('Search.SearchResults',['FoundedProperties'=>$FoundedProperties,'ItemsNumber'=>$FoundedProperties->count()]);

}
protected function SecondSearch(Request $request)
{
    $SearchQuery = $request->SearchQuery;
    $PropertyType = Type::where('Type_name','Like','%'.$SearchQuery.'%')->get();
    if($PropertyType->count()>0){
    $TypeID = $PropertyType[0]->Type_ID;
    }
    else
    {
        $TypeID ='UnKnown';
    }
     $FoundedProperties = Property::where('Location','Like','%'.$SearchQuery.'%')
     ->when($request->Bedrooms, function($query) {
        $query->where('Bedrooms','Like','%'.request()->Bedrooms.'%');
    })
    ->when($request->Bathrooms, function($query) {
        $query->where('Bathrooms','Like','%'. request()->Bathrooms.'%' );
    })
    ->when($request->PropertyType, function($query) {
        $query->where('TypeID','Like','%'. request()->PropertyType.'%' );
    })
    ->when($request->PriceRange, function($query) {

        $PriceValues =request()->PriceRange;
        $PriceRange = explode("-",$PriceValues);
        if($PriceValues != '+'){
        $query->Wherebetween('Price',[$PriceRange[0],$PriceRange[1]]);
    }
    else
    {
        $query->Where('Price','>','1000000');
    }
})
->when($request->PropertyStatus, function($query) {
        $query->Where('PropertyStatus',request()->PropertyStatus);
    })

    ->orwhere('Description','Like','%'.$SearchQuery.'%')
    ->orwhere('TypeID','Like','%'.$TypeID.'%')->paginate(5);
    /*->when($request->SortFilter, function($query) {
        $SortFilter = request()->SortFilter;
        $SortValues = explode('-',$SortFilter);
        $query->orderby($SortValues[0],$SortValues[1]);
    })*/
    ;

//$FoundedProperties = $this->Sort($FoundedProperties);
    return view('Search.SearchResults',['FoundedProperties'=>$FoundedProperties,'ItemsNumber'=>$FoundedProperties->count()]);
}
/*protected function FilterInRent(Request $request)
{
    $TypeID = $request->PropertyType;
    $Bedrooms = $request->bedrooms;
    $Bathrooms = $request->bathrooms;
    $MaxPrice = $request->MaxPrice;
    $MinPrice = $request->MinPrice;

    if($TypeID == ''&& $Bedrooms == '' && $Bathrooms == '' && $MinPrice =='' && $MaxPrice =='')
    {
        return redirect('RentPage');
    }
    elseif($Bedrooms == '' && $Bathrooms == '')
    {
        $Property = Property::
        where('PropertyStatus','Rent')
        ->where('TypeID',$TypeID)
        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('RentPage.Rent',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);
    }
    elseif($TypeID == ''&& $Bedrooms == '' && $Bathrooms == '')
    {
        $Property = Property::where('PropertyStatus','Rent')
        ->Wherebetween('Price',[$MinPrice,$MaxPrice])
        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('RentPage.Rent',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);
    }
    elseif($TypeID == '')
    {
        $Property = Property::where('PropertyStatus','Rent')
        ->where('Bedrooms',$Bedrooms)
        ->where('Bathrooms',$Bathrooms)

        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('RentPage.Rent',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);
    }

    else{
$Property = Property::
where('PropertyStatus','Rent')
->where('TypeID',$TypeID)
->orwhere('Bedrooms',$Bedrooms)
->orwhere('Bathrooms',$Bathrooms)
->orderBy('created_at','desc')
->paginate(5);
return view('RentPage.Rent',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);
    }

}
*/
/*protected function FilterInBuy(Request $request)
{
    $TypeID = $request->PropertyType;
    $Bedrooms = $request->bedrooms;
    $Bathrooms = $request->bathrooms;
    $MaxPrice = $request->MaxPrice;
    $MinPrice = $request->MinPrice;
    $Type = Type::all();
    if($TypeID == ''&& $Bedrooms == '' && $Bathrooms == '' && $MinPrice =='' && $MaxPrice =='')
    {
        return redirect('BuyPage');
    }
    elseif($Bedrooms == '' && $Bathrooms == '')
    {
        $Property = Property::
        where('PropertyStatus','Buy')
        ->where('TypeID',$TypeID)
        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('buy.Buy',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);
    }

    else{
$Property = Property::
where('PropertyStatus','Buy')
->where('TypeID',$TypeID)
->where('Bedrooms',$Bedrooms)
->where('Bathrooms',$Bathrooms)
->orderBy('created_at','desc')
->paginate(5);

return view('buy.Buy',['Property'=>$Property]);
    }
}
*/
protected function FilterInBuy(Request $request)
{

    $Property = Property::where('PropertyStatus', 'Buy')
    ->when($request->PropertyType, function($query) {
        $query->where('TypeID', request()->PropertyType);
    })
    ->when($request->bedrooms, function($query) {
        $query->where('Bedrooms','Like','%'.request()->bedrooms.'%');
    })
    ->when($request->bathrooms, function($query) {
        $query->where('Bathrooms','Like','%'. request()->bathrooms.'%' );
    })
    ->when($request->minprice, function($query) {
        $query->Where('Price','>=',request()->minprice);
    })->
    when($request->maxprice, function($query) {
        $query->Where('Price','<=',request()->maxprice);
    })->when($request->SortFilter, function($query) {
        $SortFilter = request()->SortFilter;
        $SortValues = explode('-',$SortFilter);
        $query->orderby($SortValues[0],$SortValues[1]);
    })
    //sa7e7a->orderBy('created_at','desc')
    ->paginate(5);

    return view('buy.Buy',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);

}
protected function FilterInRent(Request $request)
{

    $Property = Property::where('PropertyStatus', 'Rent')
    ->when($request->PropertyType, function($query) {
        $query->where('TypeID', request()->PropertyType);
    })
    ->when($request->bedrooms, function($query) {
        $query->where('Bedrooms','Like','%'.request()->bedrooms.'%');
    })
    ->when($request->bathrooms, function($query) {
        $query->where('Bathrooms','Like','%'. request()->bathrooms.'%' );
    })
    ->when($request->MinPrice, function($query) {
        $query->Where('Price','>=',request()->MinPrice);
    })->
    when($request->MaxPrice, function($query) {
        $query->Where('Price','<=',request()->MaxPrice);
    })->when($request->SortFilter, function($query) {
        $SortFilter = request()->SortFilter;
        $SortValues = explode('-',$SortFilter);
        $query->orderby($SortValues[0],$SortValues[1]);
    })
    ->paginate(5);

    return view('RentPage.Rent',['Property'=>$Property,'ItemsNumber'=>$Property->count()]);

}
/*protected function Sort(Property $Property,$Item,$method)
{

return $Property->orderby($Item,$method);

}*/

}
