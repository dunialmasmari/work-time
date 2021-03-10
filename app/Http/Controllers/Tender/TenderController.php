<?php

namespace App\Http\Controllers\Tender;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tender;
use App\Models\Major;
use Illuminate\Support\Collection;
use validator;
use Carbon\Carbon;
use App\Models\userNotify;
use App\Models\Advertising;



 
use Illuminate\Console\Command;
use App\Models\userProf;
use Illuminate\Support\Facades\Mail; 
use App\Mail\Notifies\NotifyEmail;


class TenderController extends Controller
{
    public function viewTender()
    {

        $date=Carbon::today();
        $tenders=tender::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20); 

            $majors=Major::get();
            $major_ar=array();
            $compa_ar=array();
            $loca_ar=array();
            foreach($majors as $major)
            {  
                foreach($tenders as $tender)
                {
                    if($tender->major_id == $major->major_id)
                    {
                        $name=$major->major_name ; 
                        $id=$major->major_id;
                        $major_ar[]=['id'=>$id,'name'=>$name];
                    break;
                    }
                }
            }
            foreach($tenders as $tender)
                {
                    $compa_ar[]=$tender->company;
                }
                //$compa_ar=array_unique($compa_ar);
            $compa_ar = array_values( array_flip( array_flip( $compa_ar ) ) );
            foreach($tenders as $tender)
            {
                $loca_ar[]=$tender->location;
            }
            //$loca_ar=array_unique($loca_ar);
            $loca_ar = array_values( array_flip( array_flip( $loca_ar ) ) );
            $key=['major','company','location'];
            $value=[$major_ar,$compa_ar,$loca_ar];
            $filters=array_combine($key,$value);

            $data=['tenders' => $tenders ,'filters'=>$filters];



        return view('HR.tenders',$data);
    }

    public function viewTenderid($id)
    {
        $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
            ->select('majors.major_name','tenders.*')
            ->where('tenders.tender_id', $id);
            $advers=Advertising::select('*')->where('active','1')->where('Advertising_Position','2')->get();

            
            
            if ($tenders->exists())
            {
                $tenders=$tenders->get();
                $data=['tenders' => $tenders,
                       'advers' => $advers,
                      ];
                return view('HR.tenderDetails',$data);           
             } 
            else 
            {
            return response()->json(["message" => "Tender not found!"], 404);
            }
            
            
        
    } 
    
    public function getActiveTenders()
    {

        /*if (Auth::check()) 
        {*/
            $tender=tender::where('active','1')->where('deadline','>=',now())
            ->where('start_date','<=',now())->orderByRaw('start_date DESC')->paginate();//->limit(8)
            return response()->json($tender,200);
       /* }
        else
        {
            return response()->json(['message' => 'The pages not found'], 401);
        } */
    }
    
    public function getTenderById($id) 
    {
      /*  if (Auth::check()) 
        {*/
            //$tender=tender::where('tender_id', $id);
            $tender=tender::join('majors','tenders.major_id','=','majors.major_id')
            ->select('majors.major_name','tenders.*')->where('tenders.tender_id', $id);
            if ($tender->exists())
            {
            return response()->json($tender->get(), 200);
            } 
            else 
            {
            return response()->json(["message" => "Tender not found!"], 404);
            }
        /*}
        else
        {
            return response()->json(['message' => 'The pages not found'], 401);
        } */
      }

      public function getTenderMajor()
      {
       /* if (Auth::check()) 
        {*/
            $tenders=tender::where('active','1')->get();
            $majors=Major::where('active','1')->get();
            $collection =collect([]);
            $major_ar=array();
            foreach($majors as $major)
            {  
                foreach($tenders as $tender)
                {
                    if($tender->major_id == $major->major_id)
                    {
                        $key=$major->major_name ; 
                        $count=tender::where('active','1')->where('major_id',$major->major_id)->get()->count();
                        
                        $major_ar[]=['count'=>$count,'name'=>$key];
                    // $collection->prepend( $count,$key);
                    break;
                    }
                }
            }
            return response()->json($major_ar,200);
      /*  }
        else
        {
            return response()->json(['message' => 'The pages not found'], 401);
        } */
      }

      
    public function filterActiveTenderField()
    {
        $date=Carbon::today();
        $tenders=tender::where('active','1')
        ->where('deadline','>=',$date)
        ->where('start_date','<=',$date)->get();
        $majors=Major::get();
        $major_ar=array();
        $compa_ar=array();
        $loca_ar=array();
        foreach($majors as $major)
        {  
            foreach($tenders as $tender)
            {
                if($tender->major_id == $major->major_id)
                {
                    $name=$major->major_name ; 
                    $id=$major->major_id;
                    $major_ar[]=['id'=>$id,'name'=>$name];
                break;
                }
            }
        }
        foreach($tenders as $tender)
            {
                $compa_ar[]=$tender->company;
            }
            //$compa_ar=array_unique($compa_ar);
        $compa_ar = array_values( array_flip( array_flip( $compa_ar ) ) );
        foreach($tenders as $tender)
        {
           $ar= explode(',',$tender->location);
           foreach($ar as $a){
            $loca_ar[]=$a;
           }
        }
        //$loca_ar=array_unique($loca_ar);
        $loca_ar = array_values( array_flip( array_flip( $loca_ar ) ) );
         
        $filters=['majors'=>$major_ar,'companies'=>$compa_ar,'locations'=>$loca_ar];
        //print_r($filters);

        return $filters;
    } 

    public function dowenloadFile($filename)
    {
            return response()->download(public_path('assets/uploads/tenders/pdf/'.$filename));
    }
    
    public function viewTenders(Request $request)
    {

        $filterFileds=  $this->filterActiveTenderField();
        $date=Carbon::today();

        $id=$request->input('major_id');
        $comp=$request->input('company');
        $loc=$request->input('location');
        $id_ar=$id;
        $comp_ar= $comp;
        $loc_ar=$loc;
        //////no filters 
        if($id == '' && $comp == '' && $loc == '') 
        {
            $tenders=tender::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
            $data=[
                'major_id'=>$id,
                'company'=>$comp,
                'location'=>$loc,
                'tenders'=>$tenders,
               
            ]+  $filterFileds;
           return view('HR.tenders',$data);
    
        }
        //////////filtter by major_id
        if($id != '' && $comp == '' && $loc == '')
        {
           $tenders= tender::whereIn('major_id',$id_ar)->where('active','1')
           ->where('deadline','>=',$date)
           ->where('start_date','<=',$date)
           ->orderByRaw('start_date DESC')
           ->paginate(20);
                $data=[
                    'major_id'=>$id,
                    'company'=>$comp,
                    'location'=>$loc,
                    'tenders'=>$tenders,
                    
            ]+  $filterFileds;
               return view('HR.tenders',$data);
    
        }
                //////////filtter by company name
        if($id == '' && $comp != '' && $loc == '')
        {
            $tenders=   tender::whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
                $data=[
                    'major_id'=>$id,
                    'company'=>$comp,
                    'location'=>$loc,
                    'tenders'=>$tenders,
                   
            ]+  $filterFileds;
               return view('HR.tenders',$data);
        }
        //////////filtter by location 
        if($id == '' && $comp == '' && $loc != '')
        {
            $tend=[];
            $ten =tender::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
               foreach($ten as $tender){
                   $tend_loc = explode(',', $tender->location);
                  
                 foreach($loc_ar as $va){
                     foreach( $tend_loc as $tendloc)
                    if($tendloc == $va){
                        $tend[]=$tender->tender_id;
                       
                    }
                    }
               }
               $tenders =tender::whereIn('tender_id',  $tend)->where('active','1')
               ->where('deadline','>=',$date)
               ->where('start_date','<=',$date)
               ->orderByRaw('start_date DESC')
               ->paginate(20);
            $data=[
                    'major_id'=>$id,
                    'company'=>$comp,
                    'location'=>$loc,
                    'tenders'=>$tenders,
                   
            ]+  $filterFileds;
             
               return view('HR.tenders',$data);
        }
        //////////filtter by major_id and company name
        if($id != '' && $comp != '' && $loc == '')
        {
            $tenders= tender::whereIn('major_id',$id_ar)->whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
                    $data=[
                        'major_id'=>$id,
                        'company'=>$comp,
                        'location'=>$loc,
                        'tenders'=>$tenders,
                       
            ]+  $filterFileds;
                   return view('HR.tenders',$data);
        }
        //////////filtter by major_id and location
        if($id != '' && $comp == '' && $loc != '')
        {
            $ten= tender::whereIn('major_id',$id_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);


                $tend=[];
              
                   foreach($ten as $tender){
                       $tend_loc = explode(',', $tender->location);
                      
                     foreach($loc_ar as $va){
                         foreach( $tend_loc as $tendloc)
                        if($tendloc == $va){
                            $tend[]=$tender->tender_id;
                           
                        }
                        }
                   }
                   $tenders =tender::whereIn('tender_id',  $tend)->where('active','1')
                   ->where('deadline','>=',$date)
                   ->where('start_date','<=',$date)
                   ->orderByRaw('start_date DESC')
                   ->paginate(20);
                    $data=[
                        'major_id'=>$id,
                        'company'=>$comp,
                        'location'=>$loc,
                        'tenders'=>$tenders,
                        
            ]+  $filterFileds;
                   return view('HR.tenders',$data);
        }
        //////////filtter by company name and location
        if($id == '' && $comp != '' && $loc != '')
        {
            $ten= tender::whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);

                $tend=[];
              
                foreach($ten as $tender){
                    $tend_loc = explode(',', $tender->location);
                   
                  foreach($loc_ar as $va){
                      foreach( $tend_loc as $tendloc)
                     if($tendloc == $va){
                         $tend[]=$tender->tender_id;
                        
                     }
                     }
                }
                $tenders =tender::whereIn('tender_id',  $tend)->where('active','1')
                ->where('deadline','>=',$date)
                ->where('start_date','<=',$date)
                ->orderByRaw('start_date DESC')
                ->paginate(20);
                    $data=[
                        'major_id'=>$id,
                        'company'=>$comp,
                        'location'=>$loc,
                        'tenders'=>$tenders,
                        
            ]+  $filterFileds;
                   return view('HR.tenders',$data);
        }
        //////////filtter by major id , company name and location
        if($id != '' && $comp != '' && $loc != '')
        {
            $ten= tender::whereIn('major_id',$id_ar)->whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
                          $tend=[];
              
                          foreach($ten as $tender){
                              $tend_loc = explode(',', $tender->location);
                             
                            foreach($loc_ar as $va){
                                foreach( $tend_loc as $tendloc)
                               if($tendloc == $va){
                                   $tend[]=$tender->tender_id;
                                  
                               }
                               }
                          }
                          $tenders =tender::whereIn('tender_id',  $tend)->where('active','1')
                          ->where('deadline','>=',$date)
                          ->where('start_date','<=',$date)
                          ->orderByRaw('start_date DESC')
                          ->paginate(20);
                          $data=[
                            'major_id'=>$id,
                            'company'=>$comp,
                            'location'=>$loc,
                            'tenders'=>$tenders,
                           
            ]+  $filterFileds;
                       return view('HR.tenders',$data);
        }
    }
    
}
