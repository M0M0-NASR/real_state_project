<?php

namespace App\Http\Controllers;

use App\Models\ProfileInfo;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileInfoController extends Controller
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
            ['phone'=>'required'
            ,
            'address'=>['required','max:25'],
            'image'=>'required'
            ]
            );
            if($this->UserProfile(session('UserId')) == 0)
            {
            $ProfileData = new ProfileInfo;
            $ProfileData->ProfileOwner = session('UserId');
            $ProfileData->Phone = $request->phone;
            $ProfileData->Address = $request->address;

            if($request->hasFile('image'))
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->move('ProfileImages/',$fileName);
        $ProfileData->ProfileImg = $fileName;
    }

        $ProfileData->save();
        return back()->with('saved','Profile Information has been saved');
    }
else
{
    $ProfileData = ProfileInfo::where('ProfileOwner',session('UserId'));
    if($request->hasFile('image'))
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->move('ProfileImages/',$fileName);

    }
    $ProfileData
     ->update([
        'ProfileOwner' =>session('UserId'),
        'Phone' => $request->phone,
        'Address' => $request->address,
        'ProfileImg'=>$fileName
     ]
     );
     return back()->with('saved','Profile Information has been saved');
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileInfo  $profileInfo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ProfileInfo = ProfileInfo::where('ProfileOwner',session('UserId'))->get();
        return view('Profile',compact($ProfileInfo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileInfo  $profileInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileInfo $profileInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileInfo  $profileInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileInfo $profileInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileInfo  $profileInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileInfo $profileInfo)
    {
        //
    }
    protected function UserProfile($UserID)
    {
        $Profile = ProfileInfo::where('ProfileOwner',$UserID);
        return $Profile->count();
    }
}
