<?php

namespace App\Http\Controllers;

use App\Models\property;
use Illuminate\Http\Request;
use App\Http\Controllers\TypeController;
use PhpParser\Builder\Property as BuilderProperty;
use PhpParser\Node\Stmt\Property as StmtProperty;
use TijsVerkoyen\CssToInlineStyles\Css\Property\Property as PropertyProperty;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Properties = Property::latest()->Paginate(5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
{
    $req->validate([
        'PType' => 'required',
        'Status' => 'required',
        'price' => 'required',
        'bedrooms' => ['required','max:2'],
        'bathrooms' => ['required','max:2'],
        'size' => 'required','max:2',
        'location' => 'required',
        'mobile' => 'required',
        'description' => 'required',
        //'imageFileInput'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000'
    ]);
    $PropertyStatus = $req->Status;
    $PropertyType = $req->input('PType');
    $Price = $req->input('price');
    $bedrooms = $req->input('bedrooms');
    $bathrooms = $req->input('bathrooms');
    $size = $req->input('size');
    $location = $req->input('location');
    $PublisherType= $req->input('PublisherType');
    $mobile = $req->input('mobile');
    $description = $req->input('description');
    ///////////////////////
    $property = new Property();
    $property->PropertyStatus = $PropertyStatus;
    $property->TypeID = $PropertyType;
    $property->Publisher_id =session()->get('UserId');
    $property->PublisherType = $PublisherType;
    $property->Location = $location;
    $property->Description = $description;
    $property->Area = $size;
    $property->Price = $Price;
    $property->Bedrooms = $bedrooms;
    $property->Bathrooms = $bathrooms;

    if($req->hasfile('imageFileInput'))
{
    //foreach($req->file('imageFileInput') as $file){
        $file = $req->file('imageFileInput');
        $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $file->move('Properties/',$fileName);
                $property->Property_Image = $fileName;
       // $property->Property_Image = implode(" ",$images);


}
    $property->Phone = $mobile;

    $property->save();
    if($PropertyStatus == 'Buy')
    {
        return redirect('BuyPage');
    }
    else if($PropertyStatus == 'Rent')
    {
        return redirect('RentPage');
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id)
    {
        $property = Property::find($id);
        return view('UpdateHome',['Property'=>$property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
{
    $request->validate([
        'PType' => 'required',
        'Status' => 'required',
        'price' => 'required',
        'bedrooms' => ['required','max:2'],
        'bathrooms' => ['required','max:2'],
        'size' => 'required','max:2',
        'location' => 'required',
        'mobile' => 'required',
        'description' => 'required',
        'imageFileInput'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000'
    ]);


    $property = Property::find($id);
    $PropertyStatus = $request->Status;

    $property->TypeID = $request->PType;
    $property->PropertyStatus = $request->Status;
    $property->price = $request->price;
    $property->bedrooms = $request->bedrooms;
    $property->bathrooms = $request->bathrooms;
    $property->Area = $request->size;
    $property->location = $request->location;
    $property->Phone = $request->mobile;
    $property->description = $request->description;
    if($request->hasFile('imageFileInput'))
    {
        $file = $request->file('imageFileInput');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->move('Properties/',$fileName);
        $property->Property_Image = $fileName;
    }
    $property->save();
    if($PropertyStatus == 'Buy')
    {
        return redirect('BuyPage');
    }
    else if($PropertyStatus == 'Rent')
    {
        return redirect('RentPage');
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $property = property::findOrFail($id);
    $property->delete();
    return redirect()->back()->with('message', 'Property deleted successfully');
}

    protected function SearchInBuypage(Request $request)
    {
        $PropertyType = $request->ProType;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;
        $MinPrice = $request->minprice;
        $MaxPrice = $request->maxprice;
    }
    protected function Search(Request $request)
    {
        $location = $request->Location;
        $TypeID = $request->PropertyType;
        $MinPrice = $request->MinPrice;
        $MaxPrice = $request->MaxPrice;
        $Bedrooms = $request->input('Bedrooms');
        $Bathrooms = $request->Bathrooms;
        $FoundedProperties =
    Property::
    where('Location',$location)
    ->Where('TypeID',$TypeID )
    ->where('Bedrooms',$Bedrooms)
    ->where('Bathrooms',$Bathrooms)
    ->Wherebetween('Price',[$MinPrice,$MaxPrice])->get();


        return view('Search.SearchResults',['FoundedProperties'=>$FoundedProperties,'ItemsNumber'=>$FoundedProperties->count()]);

}
protected function NewSearch(Request $request)
{
    $location = $request->Location;
    $TypeID = $request->PropertyType;
    $MinPrice = $request->MinPrice;
    $MaxPrice = $request->MaxPrice;
    $Bedrooms = $request->Bedrooms;
    $Bathrooms = $request->Bathrooms;
    $FormInputs = array("Location"=>$location,"TypeID"=>$TypeID,"Bedrooms"=>$Bedrooms,"Bathrooms"=>$Bathrooms);
    $FoundedProperties = Property::all();
    foreach($FormInputs as $Key => $value)
    {
        if($value == "")
        {
            continue;
        }
        else
        {
            $FoundedProperties = Property::where($Key,$value)->get();
        }
    }
    return view('Search.SearchResults',['FoundedProperties'=>$FoundedProperties,'ItemsNumber'=>$FoundedProperties->count()]);

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

protected function SecondSearch(Request $request)
{
    $SearchQuery = $request->SearchQuery;
    $FoundedProperties = Property::where('Location','Like','%'.$SearchQuery.'%')
    ->orwhere('Description','Like','%'.$SearchQuery.'%')
    ->orwhere('TypeID','Like','%'.$SearchQuery.'%')->orderBy('created_at','desc')
    ->get();
    return view('Search.SearchResults',['FoundedProperties'=>$FoundedProperties,'ItemsNumber'=>$FoundedProperties->count()]);
}
protected function ViewProperty($id)
{
$Property = Property::find($id);
return view('ViewProperty.view_property',['Property'=>$Property]);
}

}
