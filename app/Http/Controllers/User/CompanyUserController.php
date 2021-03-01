<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\role_user;
use App\Models\job;
use App\Models\tender;
use App\Models\compnyInfo;

class CompanyUserController extends Controller
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
            ->join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
            ->select('users.*', 'compnyinfo.*', 'role_users.role_id')
            ->where('role_users.role_id', '5')
            ->orwhere('role_users.role_id', '6')
            ->orwhere('role_users.role_id', '7')->get();
        // dd($users);
            return view('admin.CompanyUser.CompanyUser_list',['users' => $users, 'role_users' => $role_users]); 
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
    }

    public function viewDetails($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $tenders = '';
            $jobs = '';
            $role_users= role_user::select()->where('user_id',$id)->get();
            $users = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
                            ->select('users.*', 'compnyinfo.*')
                            ->where('users.user_id', $id)
                            ->get();
            foreach($role_users as $role_user)

            if($role_user->role_id == 5)
            {
                $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
                ->join('users', 'jobs.user_id', '=', 'users.user_id')
                ->select('majors.major_name','jobs.*')
                ->where('jobs.user_id',$id)
                ->orderByRaw('jobs.start_date DESC')
                ->get();
                
                $data=[
                    'users' => $users,
                    'jobs' => $jobs,
                    'tenders' => $tenders,
                    'role_users' => $role_users
                    ];
            }
            elseif($role_user->role_id == 6)
            {
                $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                ->join('users', 'tenders.user_id', '=', 'users.user_id')
                ->select('majors.major_name', 'tenders.*' )
                ->where('tenders.user_id',$id)
                ->orderByRaw('tenders.start_date DESC')
                ->get();
                $data=[
                    'users' => $users,
                    'jobs' => $jobs,
                    'tenders' => $tenders,
                    'role_users' => $role_users
                    ];
            }
            elseif($role_user->role_id == 7)
            {
                $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
                ->join('users', 'jobs.user_id', '=', 'users.user_id')
                ->select('majors.major_name','jobs.*')
                ->where('jobs.user_id',$id)
                ->orderByRaw('jobs.start_date DESC')
                ->get();

                $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                ->join('users', 'tenders.user_id', '=', 'users.user_id')
                ->select('majors.major_name', 'tenders.*' )
                ->where('tenders.user_id',$id)
                ->orderByRaw('tenders.start_date DESC')
                ->get();
                $data=[
                    'users' => $users,
                    'jobs' => $jobs,
                    'tenders' => $tenders,
                    'role_users' => $role_users
                    ];
            } 
            return view('admin.CompanyUser.CompanyUser_details',$data);
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
    }

    public function viewJobdetilse($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
            ->select('majors.major_name','jobs.*')
            ->where('jobs.job_id', $id);
            if ($jobs->exists())
            {
                $jobs=$jobs->get();
                return view('admin.CompanyUser.Job_details',['jobs' => $jobs, 'role_users' => $role_users]);
            } 
            else 
            {
            return response()->json(["message" => "Job not found!"], 404);
            }
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }

    }

    public function viewTenderdetilse($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
            ->select('majors.major_name','tenders.*')
            ->where('tenders.tender_id', $id);
        
            if ($tenders->exists())
            {
                $tenders=$tenders->get();
                    return view('admin.CompanyUser.Tender_details',['tenders' => $tenders, 'role_users' => $role_users]);           
            } 
            else 
            {
            return response()->json(["message" => "Tender not found!"], 404);
            }
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }

    }

    public function viewCompanydetilse($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $compnyInfos= compnyInfo::select()->where('user_id',$id);
        
            if ($compnyInfos->exists())
            {
                $compnyInfos=$compnyInfos->get();
                    return view('admin.CompanyUser.Company_details',['compnyInfos' => $compnyInfos, 'role_users' => $role_users]);           
            } 
            else 
            {
            return response()->json(["message" => "Tender not found!"], 404);
            }
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
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

    public function CompanyUseractivation($id)
    {
       // dd($id);
       $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $user = user::where('user_id',$id)->where('active','1');
            if($user->exists())
            {
                $user->Update(['active' => '0']);
                return redirect()->route('controlpanel.CompanyUser.index');

            }
            else
            {
                $user = user::where('user_id',$id);
                $user->Update(['active' => '1']);
                return redirect()->route('controlpanel.CompanyUser.index');

            }
        }
        else{
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
    } 
}
