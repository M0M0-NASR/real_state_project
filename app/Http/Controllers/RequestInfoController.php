<?php

namespace App\Http\Controllers;

use App\Models\RequestInfo;
use Illuminate\Http\Request;

class RequestInfoController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Will be edited soon
        $RequestInfo = new RequestInfo;
        $RequestInfo->user_id = session()->get('UserId');
        $RequestInfo->property_id = $request->input('PropertyID');
        if(RequestInfo::where('user_id',$RequestInfo->user_id)->where('property_id',$RequestInfo->property_id)->count()==0){
            $RequestInfo->save();

        return back()->with('RequestSuccess','Your request info has been sent to the publisher');
        }
        else
        {
            return back()->with('RequestFailed','your request is already exists on this property');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestInfo  $requestInfo
     * @return \Illuminate\Http\Response
     */
    public function show(RequestInfo $requestInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestInfo  $requestInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestInfo $requestInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestInfo  $requestInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestInfo $requestInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestInfo  $requestInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestInfo $requestInfo)
    {
        //
    }
}
