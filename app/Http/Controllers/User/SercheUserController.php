<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class SercheUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('role_users', 'users.user_id', '=', 'role_users.user_id')
        ->select('users.*', 'role_users.role_id')
        ->where('role_users.role_id', '2')
        ->orwhere('role_users.role_id', '3')
        ->orwhere('role_users.role_id', '4')->get();
         return view('admin.SercheUser.SercheUser_list',['users' => $users]); 
    }

    public function viewUserdetilse()
    {
        $users= User::select()->where('user_id',$id);
       
        if ($users->exists())
        {
            $users=$users->get();
                  return view('admin.SercheUser.SercheUser_details',['users' => $users]);           
         } 
        else 
        {
        return response()->json(["message" => "Tender not found!"], 404);
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
    public function SercheUseractivation($id)
    {
       // dd($id);
            $user = user::where('user_id',$id)->where('active','1');
            if($user->exists())
            {
                $user->Update(['active' => '0']);
                return redirect()->route('controlpanel.SercheUser.index');

            }
            else
            {
                $user = user::where('user_id',$id);
                $user->Update(['active' => '1']);
                return redirect()->route('controlpanel.SercheUser.index');

            }
    } 
}
