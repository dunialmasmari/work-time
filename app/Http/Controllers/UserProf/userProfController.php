<?php

namespace App\Http\Controllers\UserProf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userProf;
//use validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class userProfController extends Controller
{
    public function userProfAdd(Request $request)
    {
        /*$rules=[
            'userProfs_email' => 'required|email',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator ->false())
        {
             return response()->json($validator->error(),400);
        }*/
        $email=$request->input('userProfs_email');
        $user=userProf::insert([
            'userProfs_email' => $email,
            
        ]);
        return response()->json(['message' => 'add sucessful'], 201); 
    }

    public function getActiveUser()
    {
        $users=userProf::paginate(6);
        return response()->json($users,200);
    } 

}
