<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Education;
use App\Professional_experience;
use App\Certification;
use App\ProgressBar;
use App\User;
use DB;

class EntriesController extends Controller
{
    //
    public function getDetails(Request $request){
        $data['certifications']= Certification::all();

        return $data;
    }


    public function getEntries(Request $request){
    	$sessionkey = $request->session;
        $authenticated = $request->authenticated;

        $where = [['session_id',$sessionkey]];

        Log::debug("authenticated status");
        Log::debug($authenticated);

        Log::debug($sessionkey);

        $resume_id = 0;

        if($authenticated=='1'){
            Log::debug("authenticated");
            $resume_id = User::where('id',$sessionkey)->first()->active_resume;

             Log::debug($resume_id);

            $where = [['session_id',$sessionkey],['resume_id',$resume_id]];
        }

    	$entryType = $request->type;

        Log::debug("Where: ");
        Log::debug(json_encode($where,true));

        // Log::debug(Auth::user()->id);
        // Log::debug(Auth::user()->active_resume);

    	if($entryType == "education"){

    		$data['entries'] = Education::join('certifications','certifications.id','=','education.certification_id')->where($where)
            ->select('*','education.id as eid')
            ->get();

        	$data['entries_projects'] = Education::leftJoin('educational_projects','education.id','educational_projects.education_id')
        	    ->join('certifications','certifications.id','=','education.certification_id')
        	    ->where($where)
        	    ->select('educational_projects.id','educational_projects.education_id as entryid','educational_projects.project')
        	    ->get();
    	}

    	if($entryType == "professional"){

    		$data['entries'] = Professional_experience::where($where)
                ->select('*','professional_experiences.id as eid')
                ->get();

        	$data['entries_responsibilities'] = Professional_experience::leftJoin('work_duties','professional_experiences.id','work_duties.professional_experience_id')
        	    ->where($where)
                ->select('work_duties.id','work_duties.professional_experience_id as entryid','work_duties.duty')
        	    ->get();
	
        	$data['entries_projects'] = Professional_experience::leftJoin('work_projects','professional_experiences.id','work_projects.professional_experience_id')
        	    ->where($where)
                ->select('work_projects.id','work_projects.professional_experience_id as entryid','work_projects.project')
        	    ->get();
    	}

    	return $data;
    	
    }

    public function addEntries(Request $request){
    	$sessionkey = $request->input('session_id');


    	$school = $request->input('school');
    	$certification = $request->input('certification');
    	$courses = $request->input('courses');
    	$country = $request->input('country');
    	$city = $request->input('city');
    	$address = $request->input('address');
    	$fromdate = $request->input('fromdate');
    	$todate = $request->input('todate');
    	$projects = $request->input('projects');
        $entryType = $request->type;
        $company = $request->company;
        $role = $request->role;
        $duties = $request->input('duties');

    	// $hiddencheck = $request->hiddencheck;
        $authenticated = $request->input('authenticated');


        $resume_id = 0;

        if($authenticated=='1'){
            Log::debug("authenticated");

            $resume_id = User::where('id',$sessionkey)->first()->active_resume;
        }

        Log::debug("Session ID is ");
        Log::debug($sessionkey);

        Log::debug("Resume ID is ");
        Log::debug($resume_id);

        $is_current = $request->input('current');

        if(!$is_current || $is_current==false){
            $is_current = 0;
        } else {
            $is_current = 1;
        }

        $data['code'] = "99";
        $data['message'] = "Failed";

    	// $checker = Education::select('session_id')->where('session_id',$sessionkey)->exists();

    	// echo $sessionkey." and checker is ".$checker;

        if($entryType == "education"){

    	   // $certificateid = Certification::select('id')->where('certification',$certification)->first();
        
           $checkData = [['session_id',$sessionkey],['school',$school],['certification_id',$certification],['courses',$courses]];

           if($authenticated=='1'){
                $checkData = [['session_id',$sessionkey],['resume_id',$resume_id],['school',$school],['certification_id',$certification],['courses',$courses]];
            }

            if(Education::where($checkData)->doesntExist()){

                $data = ['session_id'=>$sessionkey,'school'=>$school,'certification_id'=>$certification,'courses'=>$courses,'country'=>$country,'address'=>$address,'date_started'=>$fromdate,'date_ended'=>$todate, 'is_current'=>$is_current,'resume_id'=>$resume_id];
    
                // echo "But I'm here ".$checker;
    
                 if(trim($school)=="" || trim($country) =="" || trim($address)=="" ){ 
                     $data['code'] = "101";
                     $data['message'] = "School/Country/Address not filled";
                  } else {
                 // echo $sessionkey." in checker false ".$checker;
                 $insertid = DB::table('education')->insertGetId($data);
    
                     DB::table('educational_projects')
                         ->where('education_id',$insertid)
                         ->delete();
    
                     foreach ($projects as $i => $project) {
                         # code...
                         if(trim($project[1]) != "" || trim($project[1]) != NULL){
                             $project_value = ['education_id'=>$insertid,'project'=>$project[1]];
                             DB::table('educational_projects')
                             ->insert($project_value);
                         }
                     }

                     $data['code'] = "000";
                     $data['message'] = "Successful";

                     $data_r = ['education'=>true];

                     if(ProgressBar::where([['session_id',$sessionkey],['education',true]])->doesntExist()){
                         ProgressBar::where('session_id',$sessionkey)->update($data_r);
                     }
    
                 }

            } else {
                $data['code'] = "103";
                $data['message'] = "School already added";
            }

    	   
    
    	   	return $data;
        }

        if($entryType == "professional"){


            $checkData = [['session_id',$sessionkey],['company',$company],['role',$role]];

            if($authenticated=='1'){
                $checkData = [['session_id',$sessionkey],['resume_id',$resume_id],['company',$company],['role',$role]];
            }

            if(Professional_experience::where($checkData)->doesntExist()){
                   $data = ['session_id'=>$sessionkey,'company'=>$company,'role'=>$role,'city'=>$city,'country'=>$country,'address'=>$address,'date_started'=>$fromdate,'date_ended'=>$todate,'is_current'=>$is_current,'resume_id'=>$resume_id];

            if(trim($company)=="" || trim($role)=="" || trim($country) =="" || trim($city)=="" || trim($address)=="" || $duties==""){ 
                $data['code'] = "101";
                $data['message'] = "Company/Country/Role/City/Address/Responsibilities not filled";
            } else {
            // echo "will insert if hidden check is 0. Hidden check is ".$hiddencheck;
            // if($hiddencheck==0){
            // echo $sessionkey." in checker false ".$checker;
                $insertid = DB::table('professional_experiences')->insertGetId($data);
            // }

                DB::table('work_duties')
                ->where('professional_experience_id',$insertid)
                ->delete();

                foreach ($duties as $i => $duty) {
                    # code...
                    if(trim($duty[1]) != "" || trim($duty[1]) != NULL){
                        $duty_value = ['professional_experience_id'=>$insertid,'duty'=>$duty[1]];
                        DB::table('work_duties')
                        ->insert($duty_value);
                        }
                }

                DB::table('work_projects')
                    ->where('professional_experience_id',$insertid)
                    ->delete();

                foreach ($projects as $i => $project) {
                    # code...
                    if(trim($project[1]) != "" || trim($project[1]) != NULL){
                        $project_value = ['professional_experience_id'=>$insertid,'project'=>$project[1]];
                        DB::table('work_projects')
                            ->insert($project_value);
                        }
                }

                $data['code'] = "000";
                $data['message'] = "Successful";

                $data_r = ['professional_details'=>true];

                if(ProgressBar::where([['session_id',$sessionkey],['professional_details',true]])->doesntExist()){
                    ProgressBar::where('session_id',$sessionkey)->update($data_r);
                    }
                }
        
            } else {
                $data['code'] = "103";
                $data['message'] = "This experience has already been added";
            }
    
            return $data;
        }
    }
}
