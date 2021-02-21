<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\role_user;
use App\Models\compnyInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'alpha', 'max:75', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $url = url()->previous();
        preg_match("/[^\/]+$/", $url, $matches);
        $last_word = $matches[0]; // test

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
            ]);  
            $user_role = new role_user();
            $user_role->user_id = $user->user_id;
            if($data['type_search'] == 'Jobs')
            {
                $user_role->role_id = '2';
            }
            elseif($data['type_search'] == 'Tenders')
            {
                $user_role->role_id = '3';
            }
            elseif($data['type_search'] == 'Jobs&Tender')
            {
                $user_role->role_id = '4';
            }
            $user_role->user_type =  'App/User';
            $user_role->save();
    }

       /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function compvalidator(array $data)
    {
        return Validator::make($data, [
            'companyName' => ['required', 'string', 'max:255', 'unique:compnyinfo'],
            'websitelink' => ['string', 'url', 'max:255', 'unique:compnyinfo'],
            'phone'=> ['required', 'numeric', 'min:20', 'unique:compnyinfo'],
            'address' => ['required', 'string', 'max:255'],
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'alpha', 'max:75', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function compcreate(array $data)
    {
       
      //  dd($data);

            $user = User::create([
                'name' => $data['companyName'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
            ]);  
            $compnyInfo = new compnyInfo();
            $compnyInfo->user_id = $user->user_id;
            $compnyInfo->companyName = $data['companyName'];
            $compnyInfo->phone = $data['phone'];
            $compnyInfo->email = $data['email'];
            $compnyInfo->websitelink = $data['websitelink'];
            $compnyInfo->address = $data['address'];
            $compnyInfo->save();

            $user_role = new role_user();
            $user_role->user_id = $user->user_id;
            if($data['type_search'] == 'Jobs')
            {
                $user_role->role_id = '5';
            }
            elseif($data['type_search'] == 'Tenders')
            {
                $user_role->role_id = '6';
            }
            elseif($data['type_search'] == 'Jobs&Tender')
            {
                $user_role->role_id = '7';
            }
            $user_role->user_type =  'App/User';
            $user_role->save();
    }


}
