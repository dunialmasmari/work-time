<?php

namespace App\Http\Controllers\Major;

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
        $major = Major::select('majors.major_name','majors.major_id','majors.type','majors.active');
        if($major->exists())
        {
            return response()->json($major->get(), 200);
        }
        else{
            return response()->json(['message' => 'You do not have active major '], 404);
        }
    }

    public function getactivemajors()
    {
        $major = Major::select('majors.major_name','majors.major_id','majors.type')->where('active',1);
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
        $major = Major::create($request->all());
        return response()->json($major, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $major = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->where('major_id',$id);
        if($major->exists())
        {
            return response()->json($major->get(), 200);
        }
        else{
            return response()->json(['message' => 'major not found'], 404);
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
    public function update(Request $request, $id)
    {
        $major = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->where('major_id',$id);
        if($major->exists())
        {
            $major->Update($request->all());
            return response()->json($major->get(), 200);
        }
        else{
            return response()->json(['message' => 'major not found'], 404);
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
