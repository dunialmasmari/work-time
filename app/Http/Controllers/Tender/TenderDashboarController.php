<?php

namespace App\Http\Controllers\Tender;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\tender;
use App\Models\Major;
use App\Models\role_user;
class TenderDashboarController extends Controller
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
            $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
            ->select('majors.major_name', 'tenders.*' )->get();
                return view('admin.tender.tender_list',['tenders' => $tenders, 'role_users' => $role_users]);
        }
        else{
             return view('HR.Erroe');   
        }
    }

    public function tender_add()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $majors=Major::select()->get();
                return view('admin.tender.tender_add',['majors' => $majors, 'role_users' => $role_users]);
         }
        else{
             return view('HR.Erroe');   
        }
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
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $tender = new tender();
            $tender->user_id = $user_id;
            $tender->major_id = $request->input('major_id');
            $tender->title = $request->input('title');
            $tender->company = $request->input('company');
            $tender->description = $request->input('description');
            $tender->apply_link = $request->input('apply_link');
            $tender->start_date = $request->input('start_date');
            $tender->deadline = $request->input('deadline');
            $tender->posted_date = $request->input('posted_date');
            $tender->active = '1';
            $tender->location = implode(",", $request->input('location'));
            if($request->hasfile('filename'))
            {
            $filename = time().'.'.$request->file('filename')->extension();
            $result = $request->file('filename')->move(public_path().'/assets/uploads/tenders/pdf/', $filename); //store('files');
            $tender->filename = $filename;
            }
            if($request->hasfile('image'))
            {
            $imagename = time().'.'.$request->file('image')->extension();
            $result = $request->file('image')->move(public_path().'/assets/uploads/tenders/images/', $imagename); //store('files');
            $tender->image = $imagename;
            }
            $tender->save();
          
            $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
            ->select('majors.major_name', 'tenders.*' )->get();
                //return view('admin.tender.tender_list',['tenders' => $tenders]);
                return redirect()->route('controlpanel.tender.index')->with(['tenders' => $tenders]);
         }
        else
        {
             return view('HR.Erroe');
        } 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $tender = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
            ->select('majors.major_name', 'tenders.*' )->where('tenders.tender_id', $id);
            if($tender->exists())
            {
                $tenders = $tender->get();
                $majors=Major::select()->get();
                return view('admin.tender.tender_edite',['tenders'=> $tenders, 'majors' => $majors, 'role_users' => $role_users]);
            }
            else{
                return response()->json(['message' => 'You do not have active tenders '], 404);
            }
        }
        else
        {
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
    public function updatetender(Request $request)
    {
       // dd($request);
        //echo $request->tender_id;
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $tender = tender::where('tender_id',$request->tender_id);
            if($tender->exists())
            {
                $tender->title = $request->input('title');
                $tender->user_id = $user_id;
                $tender->major_id = $request->input('major_id');
                $tender->company = $request->input('company');
                $tender->description = $request->input('description');
                $tender->apply_link = $request->input('apply_link');
                $tender->start_date = $request->input('start_date');
                $tender->deadline = $request->input('deadline');
                $tender->posted_date = $request->input('posted_date');
                $tender->location = implode(",", $request->input('location'));

                if($request->filename != '')
                {
                    if($request->hasfile('filename'))
                        {
                            $filename = time().'.'.$request->file('filename')->extension();
                            $result = $request->file('filename')->move(public_path().'/assets/uploads/tenders/pdf/', $filename); //store('files');
                            $tender->filename = $filename;
                        }
                  $tender->Update(['title' => $tender->title, 'user_id' => $tender->user_id, 'major_id' => $tender->major_id, 'company' => $tender->company, 'description' => $tender->description,
                  'apply_link' => $tender->apply_link, 'location' => $tender->location, 'start_date' => $tender->start_date,
                  'deadline' => $tender->deadline, 'posted_date' => $tender->posted_date,
                  'filename' => $tender->filename,]);  
                }

                if($request->image != '')
                {
                    if($request->hasfile('image'))
                    {
                        $imagename = time().'.'.$request->file('image')->extension();
                        $result = $request->file('image')->move(public_path().'/assets/uploads/tenders/images/', $imagename); //store('files');
                        $tender->image = $imagename;
                    }
                  $tender->Update(['title' => $tender->title, 'user_id' => $tender->user_id, 'major_id' => $tender->major_id, 'company' => $tender->company, 'description' => $tender->description,
                  'apply_link' => $tender->apply_link, 'location' => $tender->location, 'start_date' => $tender->start_date,
                  'deadline' => $tender->deadline, 'posted_date' => $tender->posted_date,
                  'image' => $tender->image,]);
                }

               // if($request->image = '' && $request->image = '') 
               // {
                    $tender->Update(['title' => $tender->title, 'user_id' => $tender->user_id, 'major_id' => $tender->major_id, 'company' => $tender->company, 'description' => $tender->description,
                    'apply_link' => $tender->apply_link, 'location' => $tender->location, 'start_date' => $tender->start_date,
                    'deadline' => $tender->deadline, 'posted_date' => $tender->posted_date,]);
               // } 

                $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                ->select('majors.major_name', 'tenders.*' )->get();
                //return view('admin.tender.tender_list',['tenders' => $tenders]);
                return redirect()->route('controlpanel.tender.index')->with(['tenders' => $tenders]);
            
            }
            else{
                return response()->json(['message' => 'tender not found'], 404);
            }
        }
        else
        {
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
       
    }

    public function tenderactivation($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $tender = tender::where('tender_id',$id)->where('active','1');
            if($tender->exists())
            {
                    $tender->Update(['active' => '0']);
                    $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                    ->select('majors.major_name', 'tenders.*' )->get();
                    //return view('admin.tender.tender_list',['tenders' => $tenders]);
                    return redirect()->route('controlpanel.tender.index')->with(['tenders' => $tenders]);

            }
            else
            {
                $tender = tender::where('tender_id',$id);
                $tender->Update(['active' => '1']);
                $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                 ->select('majors.major_name', 'tenders.*' )->get();
                    //return view('admin.tender.tender_list',['tenders' => $tenders]);
                    return redirect()->route('controlpanel.tender.index')->with(['tenders' => $tenders]);

            }
        }
        else
        {
             return view('HR.Erroe');
        }
    } 

    public function viewTenderdetilse($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
            ->select('majors.major_name','tenders.*')
            ->where('tenders.tender_id', $id);
        
            if ($tenders->exists())
            {
                $tenders=$tenders->get();
                    return view('admin.tender.tender_details',['tenders' => $tenders, 'role_users' => $role_users]);           
            } 
            else 
            {
            return response()->json(["message" => "Tender not found!"], 404);
            }
        }
        else
        {
             return view('HR.Erroe');
        }
    }

    public function delete($id)
    {
        
            $tender = tender::where('tender_id',$id);
            if($tender->exists())
            {
            
                    $tender->delete();
                    return response()->json(['message' => 'tender deleted'], 200);
            }
            else{
              //  return response()->json(['message' => 'tender not found'], 404);
            }
      
    }


}
