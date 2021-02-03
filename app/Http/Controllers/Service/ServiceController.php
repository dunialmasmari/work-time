<?php

namespace App\Http\Controllers\Service;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
class ServiceController extends Controller
{

    public function viewService()
    {
        $services =service::where('active','1')->paginate(9);
        ;
        $data= ['services'=>$services];
        return view('HR.services',$data);    

    }
    public function viewServiceid($id)
    {
        $services =service::where('service_id', $id)
            ->where('active','1');
            
            
            if ($services->exists())
            {
                $services=$services->get();
                $data=['services' => $services];
                return view('HR.serviceDetails',$data);           
             } 
            else 
            {
            return response()->json(["message" => "Services not found!"], 404);
            }
        
            
        
    } 
}