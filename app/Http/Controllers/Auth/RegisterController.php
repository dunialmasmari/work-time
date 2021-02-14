<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\role_user;
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
       // dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        $user_role = new role_user();
        $user_role->user_id = $user->user_id;
        $user_role->role_id = $data['role_id'];
        $user_role->user_type =  'App/User';
        $user_role->save();
       //$user_id = $user->user_id;
        // $user_type = 'App/User';
        // $user_role = role_user::create([
        //     'role_id' => $data['role_id'],
        //     'user_id' => $data['user_id'],
        //     'user_type' => $data['user_type'],
        // ]);
        // dd( $user_id);
       // return redirect('welcome');
      //  return $user;
    }

    //     /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  $user
    //  * @return \App\role_user
    //  */
    //  protected function createrole(array $data)
    //  {
    //      return User::create([
    //          'name' => $data['name'],
    //          'email' => $data['email'],
    //          'username' => $data['username'],
    //          'password' => Hash::make($data['password']),
    //      ]);
    //  }
}
