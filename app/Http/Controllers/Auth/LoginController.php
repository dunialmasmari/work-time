<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\role_user;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
public function authenticated()
{
    $user_id = auth()->user()->user_id;
    $role_users= role_user::select()->where('user_id',$user_id)->get();
    session(['role_users' =>$role_users]);
    foreach($role_users as $role_user)
    {
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            return redirect('controlpanel/major'); 
            
        }
         if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        {
            return redirect()->route('userInfo'); 
        }
        if($role_user->role_id == 2 || $role_user->role_id == 3 || $role_user->role_id == 4)
        {
            return redirect()->route('userProfile'); 
        }
        else 
        {
            return redirect()->route('homehr');
        }
    }
   /* dd($request);
    if ($user->role_user_id == 1) {
        return redirect('/admin');
   // } else 
    if (auth()->user()->name == 'sub_admin') {
        return redirect('controlpanel/major');
    }*/
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout()
    {
        $this->guard('web_buyer')->logout();

        return view('HR.login');
    }
}
