<?php

namespace App\Http\Controllers\Major;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (session()->has('data')) 
        // {
            $major = Major::select('majors.major_name','majors.major_id','majors.type','majors.active');
            if($major->exists())
            {
                return response()->json($major->get(), 200);
            }
            else{
                return response()->json(['message' => 'You do not have active major '], 404);
            }
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // }
    }

    public function getactivemajors()
    {
        // if (session()->has('data')) 
        // {
            $major = Major::select('majors.major_name','majors.major_id','majors.type')->where('major_id',$id);
            if($major->exists())
            {
                return response()->json($major->get(), 200);
            }
            else{
                return response()->json(['message' => 'You do not have active major '], 404);
            }
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // }
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
        // if (session()->has('data')) 
        // {
            $major = Major::create($request->all());
            return response()->json($major, 201);
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if (session()->has('data')) 
        // {
            $major = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->where('major_id',$id);
            if($major->exists())
            {
                return response()->json($major->get(), 200);
            }
            else
            {
                return response()->json(['message' => 'major not found'], 404);
            }
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // }
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
        // if (session()->has('data')) 
        // {
            $major = Major::where('major_id',$id);
            if($major->exists())
            {
                $major->Update($request->all());
                return response()->json($major->get(), 200);
            }
            else{
                return response()->json(['message' => 'major not found'], 404);
            }
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (session()->has('data')) 
        // {
            $major = Major::where('major_id',$id);
            if($major->exists())
            {
                if($major->active = 1){
                    $major->Update(['active' => '0']);
                    return response()->json(['message' => 'major not active'], 200);
                }
            else{
                $major->Update(['active' => '1']);
                return response()->json(['message' => 'major active'], 200);
                }
            }
            else{
                return response()->json(['message' => 'major not found'], 404);
            }
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // }
    } 

    public function delete($id)
    {
        // if (session()->has('data')) 
        // {
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
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // }
    }
}
