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
            $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
                return view('admin.major.major_list',['majors' => $majors]);
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
            $major = Major::create($request->all());
            $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
            return view('admin.major.major_list',['majors' => $majors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $major = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')
            ->where('major_id',$id);
            if($major->exists())
            {
                $majors = $major->get();
                return view('admin.major.major_edite',['majors'=> $majors]);
            }
            else
            {
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
    public function updatemajor(Request $request)
    {
        //dd($request);
            $major = Major::where('major_id',$request->major_id);
            if($major->exists())
            {
                $major->Update(['major_name' => $request->major_name, 'type' => $request->type,]);
              //  $major->Update($request->all());
                $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
                return view('admin.major.major_list',['majors' => $majors]);
               // return response()->json($major->get(), 200);
            }
            else{
                return response()->json(['message' => 'major not  found'], 404);
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
            $major = Major::where('major_id',$id)->where('active','1');
            if($major->exists())
            {
                $major->Update(['active' => '0']);
                $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
                return view('admin.major.major_list',['majors' => $majors]);
            }
            else
            {
                $major = Major::where('major_id',$id);
                $major->Update(['active' => '1']);
                $majors = Major::select('majors.major_name','majors.major_id','majors.type','majors.active')->get();
                return view('admin.major.major_list',['majors' => $majors]);
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
