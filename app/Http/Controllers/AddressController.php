<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(
            [
                'counrtry'=>'max:10',
                'city'=>'max:10',
                'address'=>'max:10',
            ]
            );
            $Address = new Address;
            if($this->UserAddressesNumber(session('UserId'))==0){

                        $Address->UserId = session('UserId');
                        $Address->Country = $request->country;
                        $Address->City= $request->city;
                        $Address->Address= $request->address;

                $Address->save();
            }

            else{

                $Address = Address::where('UserId',session('UserId'));
                   $Address
                    ->update([
                        'Country'=>$request->country,
                        'City'=>$request->city,
                        'Address'=>$request->address
                    ]
                    );

                }

            return back()->with('AddressAdded','Your address has been changed successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Address $Address,$Country,$City ,$UserID)
    {
        $Address = Address::where('UserId',$UserID);
        $Address->update([
            'Country'=>$Country,
            'City'=>$City,
            'Address'=>$Address
        ]);
        $Address->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
    protected function UserAddressesNumber($UserID)
    {
        $address = Address::where('UserId',$UserID);
        return $address->count();
    }

}
