<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\role_user;
use App\Models\compnyInfo;
use App\Models\userdetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Events\AdminNotification;
use App\Models\tender;
use App\Models\Major;
use Illuminate\Support\Collection;
use App\Models\job;
use App\Models\Advertising;
use App\Models\service;
use App\Models\blog;
use App\Models\RealTimeNotification;




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
        // $data['active'] = 0;
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'active' => '1',
                'password' => Hash::make($data['password']),
            ]);  
            $userdetail = new userdetail();
            $userdetail->user_id = $user->user_id;
            $userdetail->fullname = $data['name'];
            $userdetail->active = '1';
            $userdetail->email = $data['email'];
            $userdetail->save();
                 
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
      // dd($data);
            // $data['active'] = 0;
            $user = User::create([
                'name' => $data['companyName'],
                'email' => $data['email'],
                'username' => $data['username'],
                'active' => 2,
                'password' => Hash::make($data['password']),
            ]);  
            $compnyInfo = new compnyInfo();
            $compnyInfo->user_id = $user->user_id;
            $compnyInfo->companyName = $data['companyName'];
            $compnyInfo->phone = $data['phone'];
            $compnyInfo->active = 2;
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

                    /* add to notification  */
          $date=Carbon::today();
          $notify=RealTimeNotification::create([
              'type'=>'add-company',
              'id_type'=>$user->user_id,
              'see_it'=>0,
              'create_time'=>$date,
          ]);
      
             
          $dataevent =
          [ 
            'type'=>'add-company',
            'message'  => 'new company signup',
            'time' => $date,
            'id'=> $user->user_id
          ];
      event(new AdminNotification($dataevent)); 
      /* end add to notification  */
            
    }
     
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function usrevalidator(array $data)
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
    protected function usrecreate(array $data)
    {
        // $data['active'] = 1;
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'active' => '1',
                'password' => Hash::make($data['password']),
            ]);  
            $user_role = new role_user();
            $user_role->user_id = $user->user_id;
            $user_role->role_id = '8';
            $user_role->user_type =  'App/User';
            $user_role->save();

            
    }
}
