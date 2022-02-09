<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Personal_detail;
use App\Education;
use App\Professional_experience;
use App\Certification;
use App\Skill;
use App\Hobby;
use App\Summary;
use App\ProgressBar;
use DB;

class savedetailsController extends Controller
{
    //
    public function savepersonaldetails(Request $request){

    	$sessionkey = $request->session()->get('_token', 'default');

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
        }
    	$surname = $request->surname;
    	$othernames = $request->othernames;
    	$email = $request->email;
    	$country = $request->country;
    	$city = $request->city;
    	$address = $request->address;
    	$contact1 = $request->contact1;
    	$contact2 = $request->contact2;

    	$checker = Personal_detail::select('session_id')->where('session_id',$sessionkey)->exists();


    	$data = ['session_id'=>$sessionkey,'surname'=>$surname,'other_names'=>$othernames,'email'=>$email,'city'=>$city,'country'=>$country,'address'=>$address,'contact_number_1'=>$contact1,'contact_number_2'=>$contact2];

    	if($checker){
    		// echo $sessionkey." in checker true ".$checker;
    		DB::table('personal_details')->update($data);
    	} else {
    		// echo $sessionkey." in checker false ".$checker;
    		$insertid = DB::table('personal_details')->insertGetId($data);
    	}

        $data_r = ['personal_details'=>true];

        if(ProgressBar::where([['session_id',$sessionkey],['personal_details',true]])->doesntExist()){
                    ProgressBar::where('session_id',$sessionkey)->update($data_r);
                }

    	return redirect('/professionalexperience');
    }

    public function saveeducationdetails(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
        }

    	$school = $request->school;
    	$certification = $request->certification;
    	$courses = $request->courses;
    	$country = $request->country;
    	$city = $request->city;
    	$address = $request->address;
    	$fromdate = $request->fromdate;
    	$todate = $request->todate;
    	$projects = $request->projects;
    	$hiddencheck = $request->hiddencheck;
        $resume_id = 0;

        $is_current = $request->current;

        if(!$is_current || $is_current==false){
            $is_current = 0;
        } else {
            $is_current = 1;
        }

    	// $checker = Education::select('session_id')->where('session_id',$sessionkey)->exists();

    	// echo $sessionkey." and checker is ".$checker;

    	// $certificateid = Certification::select('id')->where('certification',$certification)->first();

        $checkData = [['session_id',$sessionkey],['school',$school],['certification_id',$certification],['courses',$courses]];

        if(Auth::check()){
            $resume_id = Auth::user()->active_resume;

            $checkData = [['session_id',$sessionkey],['school',$school],['certification_id',$certification],['courses',$courses],['resume_id',$resume_id]];
        }

            if(Education::where($checkData)->doesntExist()){

    	$data = ['session_id'=>$sessionkey,'school'=>$school,'certification_id'=>$certification,'courses'=>$courses,'country'=>$country,'address'=>$address,'date_started'=>$fromdate,'date_ended'=>$todate, 'is_current'=>$is_current,'resume_id'=>$resume_id];

    	// echo "But I'm here ".$checker;

    		if(trim($school)=="" || trim($country) =="" || trim($address)=="" ){  } else {
    		// echo $sessionkey." in checker false ".$checker;
    		$insertid = DB::table('education')->insertGetId($data);

            DB::table('educational_projects')
                ->where('education_id',$insertid)
                ->delete();

            foreach ($projects as $i => $project) {
                # code...
                if(trim($project) != "" || trim($project) != NULL){
                    $project_value = ['education_id'=>$insertid,'project'=>$project];
                    DB::table('educational_projects')
                    ->insert($project_value);
                }
            }

    		}

        }

        $data_r = ['education'=>true];

        if(ProgressBar::where([['session_id',$sessionkey],['education',true]])->doesntExist()){
                    ProgressBar::where('session_id',$sessionkey)->update($data_r);
                }
    	
        // Hidden check of 1 means the page should be redirected to the next page
    	if($hiddencheck=='1'){
    		return redirect('/skills');
    	}

        if($hiddencheck=='10'){
            return redirect('/viewtemplates');
        }

    	return redirect('/education');
    }

    public function saveprofesionaldetails(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

    	$company = $request->company;
    	$role = $request->role;
    	$country = $request->country;
    	$city = $request->city;
    	$address = $request->address;
    	$fromdate = $request->fromdate;
    	$todate = $request->todate;
    	$duties = $request->duties;
    	$projects = $request->projects;
    	$hiddencheck = $request->hiddencheck;
        $is_current = $request->current;
        $resume_id = 0;

        if(!$is_current || $is_current==false){
            $is_current = 0;
        } else {
            $is_current = 1;
        }


        $checkData = [['session_id',$sessionkey],['company',$company],['role',$role]];

        if(Auth::check()){
            $resume_id = Auth::user()->active_resume;

            $sessionkey = Auth::user()->id;

            $checkData = [['session_id',$sessionkey],['company',$company],['role',$role],['resume_id',$resume_id]];
        }
    	// $checker = Professional_experience::select('session_id')->where('session_id',$sessionkey)->exists();

    	// echo $sessionkey." and checker is ".$checker;
        
            if(Professional_experience::where($checkData)->doesntExist()){

    	$data = ['session_id'=>$sessionkey,'company'=>$company,'role'=>$role,'city'=>$city,'country'=>$country,'address'=>$address,'date_started'=>$fromdate,'date_ended'=>$todate,'is_current'=>$is_current,'resume_id'=>$resume_id];

    	// echo "company name is ".$company." and role is ".$role." and address is ".$address." and from date is ".$fromdate." and to date is ".$todate." and country is ".$country;
     //    echo print_r($duties);

    	// echo "session key in saved is ".$sessionkey;

    	if(trim($company)=="" || trim($role)=="" || trim($country) =="" || trim($city)=="" || trim($address)=="" || $duties==""){  } else {
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
                if(trim($duty) != "" || trim($duty) != NULL){
                    echo $duty[1];
                    $duty_value = ['professional_experience_id'=>$insertid,'duty'=>$duty];
                    DB::table('work_duties')
                        ->insert($duty_value);
                    }
            }

            DB::table('work_projects')
                ->where('professional_experience_id',$insertid)
                ->delete();

            foreach ($projects as $i => $project) {
                # code...
                if(trim($project) != "" || trim($project) != NULL){
                    echo $project;
                    $project_value = ['professional_experience_id'=>$insertid,'project'=>$project];
                    DB::table('work_projects')
                        ->insert($project_value);
                    }
            }
    	}
    } else {  }
        // save progress
        $data_r = ['professional_details'=>true];

        if(ProgressBar::where([['session_id',$sessionkey],['professional_details',true]])->doesntExist()){
                    ProgressBar::where('session_id',$sessionkey)->update($data_r);
            }

    	// Hidden check of 1 means the page should be redirected to the next page
    	if($hiddencheck=='1'){
    		return redirect('/education');
    	}

        if($hiddencheck=='10'){
            return redirect('/viewtemplates');
        }

    	return redirect('/professionalexperience');
    }

    public function saveskill(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

    	$skill = $request->skill;
    	$hiddencheck = $request->hiddencheck;
        $resume_id = 0;

    	// echo $sessionkey." and checker is ".$checker;

        if(Auth::check()){
            $resume_id = Auth::user()->active_resume;


            $sessionkey = Auth::user()->id;
        }


    	$data = ['session_id'=>$sessionkey,'skill'=>$skill,'resume_id'=>$resume_id];

    	if(trim($skill)==""){  } else {
    		// echo $sessionkey." in checker false ".$checker;
    		$insertid = DB::table('skills')->insertGetId($data);
    	}

    	// Hidden check of 1 means the page should be redirected to the next page
    	if($hiddencheck=='1'){
    		return redirect('/hobbies');
    	}

        // save progress

        $data_r = ['skills'=>true];

        if(ProgressBar::where([['session_id',$sessionkey],['skills',true]])->doesntExist()){
                    ProgressBar::where('session_id',$sessionkey)->update($data_r);
                }

        // Hidden check of 1 means the page should be redirected to the next page
        if($hiddencheck=='10'){
            return redirect('/viewtemplates');
        }

    	return redirect('/skills');
    }

    public function savehobby(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');


    	$hobby = $request->hobby;
    	$hiddencheck = $request->hiddencheck;
        $resume_id = 0;


    	// echo $sessionkey." and checker is ".$checker;

        if(Auth::check()){
            $resume_id = Auth::user()->active_resume;

            $sessionkey = Auth::user()->id;
        }


    	$data = ['session_id'=>$sessionkey,'hobby'=>$hobby,'resume_id'=>$resume_id];

    	if(trim($hobby)==""){  } else {
    		// echo $sessionkey." in checker false ".$checker;
    		$insertid = DB::table('hobbies')->insertGetId($data);
    	}

    	// Hidden check of 1 means the page should be redirected to the next page
    	if($hiddencheck=='1'){
    		return redirect('/summary');
    	}

        // save progress
        $data_r = ['hobbies'=>true];

        if(ProgressBar::where([['session_id',$sessionkey],['hobbies',true]])->doesntExist()){
                    ProgressBar::where('session_id',$sessionkey)->update($data_r);
                }

         // Hidden check of 1 means the page should be redirected to the next page

        if($hiddencheck=='10'){
            return redirect('/viewtemplates');
        }

    	return redirect('/hobbies');
    }

    public function savesummary(Request $request){
        $sessionkey = $request->session()->get('_token', 'default');
        $resume_id = 0;

        if(Auth::check()){
            $sessionkey = Auth::user()->id;

            $resume_id = Auth::user()->active_resume;
        }

        $summary = $request->summary;
        $hiddencheck = $request->hiddencheck;


        $checker = Summary::select('session_id')->where('session_id',$sessionkey)->exists();

        // echo $sessionkey." and checker is ".$checker;

        $data = ['session_id'=>$sessionkey,'summary'=>$summary,'resume_id'=>$resume_id];

        if(trim($summary)==""){  } else {

        if($checker){
            // echo $sessionkey." in checker true ".$checker;
            DB::table('summaries')->update($data);
        } else {
            // echo $sessionkey." in checker false ".$checker;
            $insertid = DB::table('summaries')->insertGetId($data);
        }

        }

        // save progress
        $data_r = ['summary'=>true];

        if(ProgressBar::where([['session_id',$sessionkey],['summary',true]])->doesntExist()){
                    ProgressBar::where('session_id',$sessionkey)->update($data_r);
                }

        // Hidden check of 1 means the page should be redirected to the next page
        if($hiddencheck=='1'){
            return redirect('/addmore');
        }

         // Hidden check of 1 means the page should be redirected to the next page

        if($hiddencheck=='10'){
            return redirect('/viewtemplates');
        }

        // return redirect('/summary');
        return redirect('/viewtemplates');
    }
}
