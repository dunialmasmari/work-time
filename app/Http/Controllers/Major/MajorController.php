<?php

namespace App\Http\Controllers\Major;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\role_user;

class MajorController extends Controller
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
            $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
                return view('admin.major.major_list',['majors' => $majors, 'role_users' => $role_users]);
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
    }

    public function getactivemajors()
    {
            $major = Major::select('majors.major_name','majors.major_id','majors.type')->where('major_id',$id);
            if($major->exists())
            {
                return response()->json($major->get(), 200);
            }
            else{
                return response()->json(['message' => 'You do not have active major '], 404);
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
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $major = new Major();
                $major->user_id = $user_id;
                $major->major_name = $request->input('major_name');  
                $major->type = $request->input('type');
                $major->active = '1';
            
                $major->save();
            
            $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
            //return view('admin.major.major_list',['majors' => $majors]);
            return redirect()->route('controlpanel.major.index')->with(['majors' => $majors]);
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }

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
            $major = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')
            ->where('major_id',$id);
            if($major->exists())
            {
                $majors = $major->get();
                return view('admin.major.major_edite',['majors'=> $majors, 'role_users' => $role_users]);
            }
            else
            {
                return response()->json(['message' => 'major not found'], 404);
            }
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
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
    public function updatemajor(Request $request)
    {
        //dd($request);
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {

            $major = Major::where('major_id',$request->major_id);
            if($major->exists())
            {
                $major->Update(['major_name' => $request->major_name,'user_id' => $user_id, 'type' => $request->type,]);
            
                $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
              
               return redirect()->route('controlpanel.major.index')->with(['majors' => $majors]);
            }
            else{
                return response()->json(['message' => 'major not  found'], 404);
            }
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function majoractivation($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $major = Major::where('major_id',$id)->where('active','1');
            if($major->exists())
            {
                $major->Update(['active' => '0']);
                $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
                //return view('admin.major.major_list',['majors' => $majors]);
                return redirect()->route('controlpanel.major.index')->with(['majors' => $majors]);
            }
            else
            {
                $major = Major::where('major_id',$id);
                $major->Update(['active' => '1']);
                $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
                //return view('admin.major.major_list',['majors' => $majors]);
                return redirect()->route('controlpanel.major.index')->with(['majors' => $majors]);
            }
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
    } 

    public function delete($id)
    {
            $major = Major::where('major_id',$id);
            if($major->exists())
            {
                $major->delete();
                return response()->json(['message' => 'major deleted'], 200);
            }
            else
            {
                return response()->json(['message' => 'major not found'], 404);
            }
    }
}
