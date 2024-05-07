<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use App\Models\EmailVerification;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserInfoController extends Controller
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
    public function create(Request $req)
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
         //Validating the form inputs
             $req->validate(
            ['UserName'=>['unique:user_infos,User_Name','min:5','max:20'],
            'Email'=>['unique:user_infos,email','min:13','max:35'],
            'Pwd'=>['min:6','max:12']
            ]
        );
        //if the inputs valid they are added to the db
            $User = new UserInfo();
            $User->username = $req->input('UserName');
            $User->email = $req->input('Email');
            $User->password = $req->input('Pwd');
            $User->Role = 1;//normal user
            $User->save();
            session()->put('UnverifiedEmail',$User->email);
            session()->put('UnverifiedUserID',$User->id);
            session()->put('UnverifiedUserPassword',$User->password);
            $this->SendEmail($User->email,$User->id);
            return redirect('CodeVerification')->with('SuccessInput','Email created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return UserInfo::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\saye  $saye
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $OldPassword = $request->oldpassword;
        $NewPassword = $request->newpassword;
        $NewPassConfirm = $request->confirmnewpassword;
        $User = UserInfo::find(session('UserId'));
        if($User->password == $OldPassword)
        {
            if($NewPassword == $NewPassConfirm)
            {
                $User->password = $NewPassword;
                $User->save();
                return back()->with('PasswordUpdate','Password has been updated succesfully');
            }
            else
            {
                return back()->with('PasswordFailedUpdate','The New Password and the confirmation are not identical');
            }
        }
        else
        {
            return back()->with('WrongPassword','Your old password is wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userinfo)
    {

    }
    protected function IsAdmin($id)
    {   $User = UserInfo::where('id',$id)->first();
        if($User->Role == 2)
        return 1;
    }
    protected function UserLogin(Request $req)
    {

        $FormEmail = $req->LoginEmail;
        $FormPassword = $req->Password;
        $User = UserInfo::where('email',$FormEmail)->first();
        if($User)
        //if the user exists in the database
        {
            if( $FormPassword == $User->password)
            {
                session()->put('UserId',$User->id);
                session()->put('UserName',$User->User_Name);
                session()->put('Email',$User->email);
                session()->put('Password',$User->password);
                if($User->EmailVerify->IsVerified && !$this->IsAdmin($User->id)){
                return redirect('Home');
                }
            elseif($this->IsAdmin($User->id))
            {
                session()->put('Admin',1);
                return redirect('AdminPage');
            }
                else
                {
                    return back()->with('NotVerified','Your Email is not verified yet');
                }
            }
            else
            {

                return back()->with('Failed','Wrong email or password');
            }
        }
        else
        {
        return back()->with('NoAccount','This account does not exist');
        }

    }
    protected function LogOut(Request $req)
    {
        $req->session()->flush();//destroying all sessions
        return redirect('/');
    }
    protected function SendEmail($email , $UserID)
    {   $RandomNumber = rand(10000,100000);
        $EmailVerfication = new EmailVerification();
            $EmailVerfication->UserId = $UserID;
            $EmailVerfication->VerificationCode = $RandomNumber;
            $EmailVerfication->IsVerified = false;
             $EmailVerfication->save();
        Mail::to($email)->send(new SignUp($RandomNumber));
    }
    protected function VerifyEmail(Request $request)
    {   $UserID = session('UserId')??session('UnverifiedUserID');
        $EmailVerification = EmailVerification::where('UserId',$UserID)->get();
        $FormVerificationCode = $request->FormVerficationCode;
        if($FormVerificationCode == $EmailVerification[0]->VerificationCode??'0')
        {
           $EmailVerify = EmailVerification::find($EmailVerification[0]->id??'0');
           $EmailVerify->IsVerified = 1;
           $EmailVerify->save();
           $User = UserInfo::where('id',$UserID)->first();
           session()->put('UserId',$User->id);
                session()->put('UserName',$User->User_Name);
                session()->put('Email',$User->email);
                session()->put('Password',$User->password);

            return redirect('Home')->with('SuccessVerify','Your Email has been verified you can now login');
        }
        else
        {
            return redirect()->back()->with('FailedVerify','The verification code is wrong');
        }
    }
    protected function AddAdmin(Request $request)
    {
        $request->validate(
            ['username'=>['unique:user_infos,User_Name','min:5','max:10'],
            'email'=>['unique:user_infos,email','min:13','max:35'],
            'password'=>['min:6','max:12']
            ]
        );
        //if the inputs valid they are added to the db
            $User = new UserInfo();
            $User->User_Name = $request->input('username');
            $User->email = $request->input('email');
            $User->password = $request->input('password');
            $User->Role = 2;//Admin user
            $User->save();
            $EmailVerfication = new EmailVerification();
            $EmailVerfication->UserId = $User->id;
            $EmailVerfication->VerificationCode = 123;
            $EmailVerfication->IsVerified = 1;
            $EmailVerfication->save();
            return redirect('AdminPage')->with('UserAdded','You have added new admin!');
    }
    protected function DeleteUser(Request $request)
    {   $UserID = $request->UserID;
       $User = UserInfo::where('id',$UserID);
       $User->delete($User);
       return redirect('AdminPage')->with('UserDeleted','You have deleted the user from the system');
    }
}
