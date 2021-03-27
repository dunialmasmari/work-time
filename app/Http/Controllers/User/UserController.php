<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\role_user;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $users = User::join('role_users', 'users.user_id', '=', 'role_users.user_id')
            ->select('users.*' )->where('role_users.role_id', '8')->get();
            return view('admin.user.user_list',['users' => $users, 'role_users' => $role_users]); 
        }
        else{
             return view('HR.Erroe');   
        } 
    }
    public function user_add()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $users=user::select()->get();
            return view('admin.user.user_add',['role_users' => $role_users]);
        }
        else{
             return view('HR.Erroe');   
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $user = User::where('user_id',$id);
            if($user->exists())
            {
                $users = $user->get();
                return view('admin.user.user_edite',['users'=> $users, 'role_users' => $role_users]);
            }
            else
            {
                return response()->json(['message' => 'user not found'], 404);
            }
        }
        else{
             return view('HR.Erroe');   
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateuser(Request $request)
    {
      //  dd($request);
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $user = User::where('user_id',$request->user_id);
            $password = auth()->user()->password;
            if($user->exists())
            {
                if($request->input('old_password') !=null)
                {   
                    if(Hash::check($request->input('old_password'), $password))
                // if(Hash::check( $password ,  ))
                        //Hash::check($password) === $request->input('old_password'))
                    {
                        $user->name = $request->input('name');
                        $user->email = $request->input('email');
                        $user->username = $request->input('username');
                        $user->password = Hash::make($request->input('password'));
                        $user->Update(['name' => $user->name, 'email' => $user->email,
                        'username' => $user->username, 'password' => $user->password]);
                        $users = User::get();
                        //return view('admin.user.user_list',['users' => $users]);
                        return redirect()->route('controlpanel.user.index')->with(['users' => $users]);
                    }
                    else
                    {
                        echo "soryy";
                    //  return redirect()->route('controlpanel.user.updateuser')->json(['message' => 'check youer old password']);
                    }
                }
                else {
                        $user->name = $request->input('name');
                        $user->email = $request->input('email');
                        $user->username = $request->input('username');
                        $user->Update(['name' => $user->name, 'email' => $user->email,
                        'username' => $user->username]);
                        $users = User::get();
                        return redirect()->route('controlpanel.user.index')->with(['users' => $users]);
                }
                
            
                

            }
            else{
                return response()->json(['message' => 'user not found'], 404);
            }
        }
        else{
             return view('HR.Erroe');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function useractivation($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $user = user::where('user_id',$id)->where('active','1');
            if($user->exists())
            {
                $user->Update(['active' => '0']);
                $users = user::get();
                //return view('admin.user.user_list',['users' => $users]);
                return redirect()->route('controlpanel.user.index')->with(['users' => $users]);

            }
            else
            {
                $user = user::where('user_id',$id);
                $user->Update(['active' => '1']);
                $users = user::get();
                //return view('admin.user.user_list',['users' => $users]);
                return redirect()->route('controlpanel.user.index')->with(['users' => $users]);

            }
        }
        else{
             return view('HR.Erroe');   
        }
    } 
     public function veiwChangePassword()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            return view('admin.changePassword',['role_users' => $role_users]); 
        }
        else{
             return view('HR.Erroe');   
        }
    }
    public function ChangePassword(Request $request)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
           
            $user_id = auth()->user()->user_id;
            $user = User::where('user_id',$user_id);
            $password = auth()->user()->password;
            if($user->exists())
            {  
                    if(Hash::check($request->input('old_password'), $password))
                
                    {
                        $user->password = Hash::make($request->input('password'));
                        $user->Update(['password' => $user->password]);
                        $users = User::get();
                        echo "chang password successfully";
                        return redirect()->route('logout')->with(['users' => $users]);
                    }
                    else
                    {
                        echo "soryy old password not correct";
                        return redirect()->route('veiwChangePassword',['role_users' => $role_users]); 
                   }
                
            }
            else{
                return response()->json(['message' => 'user not found'], 404);
            }
        }
        else{
             return view('HR.Erroe');   
        }
    }
}
