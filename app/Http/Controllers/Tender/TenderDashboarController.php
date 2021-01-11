<?php

namespace App\Http\Controllers\Tender;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\tender;
use App\Models\Major;
class TenderDashboarController extends Controller
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
            $tender = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
            ->select('majors.major_name', 'tenders.*' );//->where('tenders.active','1');
            if($tender->exists())
            {
                return response()->json($tender->paginate(10), 200);
            }
            else{
                return response()->json(['message' => 'You do not have active tenders '], 404);
            } 
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // } 
    }

    public function getactivetender()
    {	
        if (session()->has('data')) 
        {
            $tender = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
            ->select('majors.major_name', 'tenders.*' )->where('tenders.active','1');
            if($tender->exists())
            {
                return response()->json($tender->paginate(10), 200);
            }
            else{
                return response()->json(['message' => 'You do not have active tenders '], 404);
            } 
        }
        else
        {
            return response()->json(['message' => 'The pages not found'], 401);
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
        // if (session()->has('data')) 
        // {
            $tender = new tender();
            $tender->user_id = $request->input('user_id');
            $tender->major_id = $request->input('major_id');
            $tender->title = $request->input('title');
            $tender->company = $request->input('company');
            $tender->description = $request->input('description');
            $tender->apply_link = $request->input('apply_link');
            $tender->start_date = $request->input('start_date');
            $tender->deadline = $request->input('deadline');
            $tender->posted_date = $request->input('posted_date');
            $tender->active = $request->input('active');
            $tender->location = $request->input('location');
            if($request->hasfile('filename'))
            {
            $filename = time().'.'.$request->file('filename')->extension();
            $result = $request->file('filename')->move(public_path().'/files/', $filename); //store('files');
            $tender->filename = $filename;
            }
            if($request->hasfile('image'))
            {
            $imagename = time().'.'.$request->file('image')->extension();
            $result = $request->file('image')->move(public_path().'/images/', $imagename); //store('files');
            $tender->image = $imagename;
            }
            $tender->save();
            return response()->json(['message' => 'add sucessful', 'data' => $tender], 201);  
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
    public function show( $id)
    {
        // if (session()->has('data')) 
        // {
            $tender = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
            ->select('majors.major_name', 'tenders.*' )->where('tenders.tender_id', $id);
            if($tender->exists())
            {
                return response()->json(['data' => $tender->get(), 'path the folder of files' => public_path('files/'), 'path the folder of images' => public_path('images/')], 200);
            }
            else{
                return response()->json(['message' => 'You do not have active tenders '], 404);
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
            $tender = tender::where('tender_id',$id);
            if($tender->exists())
            {
                $tender->title = $request->input('title');
                $tender->company = $request->input('company');
                $tender->description = $request->input('description');
                $tender->apply_link = $request->input('apply_link');
                $tender->start_date = $request->input('start_date');
                $tender->deadline = $request->input('deadline');
                $tender->posted_date = $request->input('posted_date');
                $tender->active = $request->input('active');
                $tender->location = $request->input('location');
                if($request->hasfile('filename'))
                {
                $filename = time().'.'.$request->file('filename')->extension();
                $result = $request->file('filename')->move(public_path().'/files/', $filename); //store('files');
                $tender->filename = $filename;
                }
                if($request->hasfile('image'))
                {
                $imagename = time().'.'.$request->file('image')->extension();
                $result = $request->file('image')->move(public_path().'/images/', $imagename); //store('files');
                $tender->image = $imagename;
                }
                $tender->Update();
            // $tender->Update($request->all());
                return response()->json($tender->paginate(), 200);
            }
            else{
                return response()->json(['message' => 'tender not found'], 404);
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
            $tender = tender::where('tender_id',$id);
            if($tender->exists())
            {
                if($tender->active = 1){
                    $tender->Update(['active' => '0']);
                    return response()->json(['message' => 'tender not active'], 200);
                }
            else{
                $tender->Update(['active' => '1']);
                return response()->json(['message' => 'tender active'], 200);
                }
            }
            else{
                return response()->json(['message' => 'tender not found'], 404);
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
            $tender = tender::where('tender_id',$id);
            if($tender->exists())
            {
            
                    $tender->delete();
                    return response()->json(['message' => 'tender deleted'], 200);
            }
            else{
                return response()->json(['message' => 'tender not found'], 404);
            }
        // }
        // else
        // {
        //     return response()->json(['message' => 'The pages not found'], 401);
        // } 
    }


}
