<?php

namespace App\Http\Controllers\Service;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
class ServiceDashboarControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = service::get();
        return view('admin.service.service_list',['services' => $services]);
    }

    public function service_add()
    {
        $services=service::select()->get();
        return view('admin.service.service_add',['services' => $services]);
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
            //  dd($request);
            $service = new service();
            $service->user_id = $request->input('user_id');
            $service->title = $request->input('title');  
            $service->description = $request->input('description');
            $service->active = $request->input('active');
            if($request->hasfile('image'))
            {
            $imagename = time().'.'.$request->file('image')->extension();
            $result = $request->file('image')->move(public_path().'/assets/uploads/services/images/', $imagename); //store('files');
            $service->image = $imagename;
            }
            $service->save();
          
            $services = service::get();
                //return view('admin.service.service_list',['services' => $services]);
                return redirect()->route('controlpanel.service.index')->with(['services' => $services]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = service::where('service_id',$id);
        if($service->exists())
        {
            $services = $service->get();
            return view('admin.service.service_edite',['services'=> $services]);
        }
        else
        {
            return response()->json(['message' => 'service not found'], 404);
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
    public function updateservice(Request $request)
    {
        $service = service::where('service_id',$request->service_id);
        if($service->exists())
        {
            $service->title = $request->input('title');
            $service->user_id = $request->input('user_id');
            $service->description = $request->input('description');
            $service->active = $request->input('active');
            if($request->image != '')
            {
                if($request->hasfile('image'))
                {
                    $imagename = time().'.'.$request->file('image')->extension();
                    $result = $request->file('image')->move(public_path().'/assets/uploads/services/images/', $imagename); //store('files');
                    $service->image = $imagename;
                }
                $service->Update(['title' => $service->title, 'user_id' => $service->user_id,
                'description' => $service->description, 'active' => $service->active,
                'image' => $service->image,]);
            }
          else 
          {
            $service->Update(['title' => $service->title, 'user_id' => $service->user_id,
             'description' => $service->description, 'active' => $service->active,]);
          }
            $services = service::get();
            //return view('admin.service.service_list',['services' => $services]);
            return redirect()->route('controlpanel.service.index')->with(['services' => $services]);

        }
        else{
            return response()->json(['message' => 'service not found'], 404);
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

    public function serviceactivation($id)
    {
            $service = service::where('service_id',$id)->where('active','1');
            if($service->exists())
            {
                $service->Update(['active' => '0']);
                $services = service::get();
                //return view('admin.service.service_list',['services' => $services]);
                return redirect()->route('controlpanel.service.index')->with(['services' => $services]);

            }
            else
            {
                $service = service::where('service_id',$id);
                $service->Update(['active' => '1']);
                $services = service::get();
                //return view('admin.service.service_list',['services' => $services]);
                return redirect()->route('controlpanel.service.index')->with(['services' => $services]);
            }
    } 
}
