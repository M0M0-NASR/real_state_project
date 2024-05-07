<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * 
     */
    protected function create(array $data)
    {
        $token = uuid_create();
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token' => $token,
        ]);

        request()->session()->put('UserId', $user->id);
        request()->session()->put('UserName', $user->username);
        request()->session()->put('Email', $user->email);
        request()->session()->put('Password', $user->password);


        //Validating the form inputs
        request()->validate(
            ['UserName'=>['unique:user_infos,User_Name','min:5','max:20'],
            'Email'=>['unique:user_infos,email','min:13','max:35'],
            'Pwd'=>['min:6','max:12']
            ]
        );
        //if the inputs valid they are added to the db
            $User = new UserInfo();
            $User->id = $user->id;
            $User->username = $user->username;
            $User->email = $user->email;
            $User->password = $user->password;
            $User->Role = 1;//normal user
            $User->save();
            session()->put('UnverifiedEmail',$User->email);
            session()->put('UnverifiedUserID',$User->id);
            session()->put('UnverifiedUserPassword',$User->password);
            return redirect('CodeVerification')->with('SuccessInput','Email created successfully');




        return $user;
    }
}
