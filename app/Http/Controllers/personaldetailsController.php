<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Personal_detail;
use App\ProgressBar;
use App\ProgressPages;
use App\Resume;
use App\User;

class personaldetailsController extends Controller
{
    //
    public function personaldetails(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
        }

    	$data['personaldetails']=Personal_detail::where('session_id','=',$sessionkey)
    							->first();

    	if(ProgressBar::where('session_id',$sessionkey)->exists()){

    	} else {
    		$data_p = ['session_id'=>$sessionkey];

    		ProgressBar::insert($data_p);
    	}


    	$data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

    	$data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

    	$data['page'] = "Personal Details";

    	return view('personaldetails')->with('data',$data);
    							// echo $data['personaldetails'];
    }


    public function create_cv(Request $request){
        $sessionkey = $request->session()->get('_token', 'default');

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
        }

        return view('decisive');
    }

    public function decisive(Request $request){
        $sessionkey = $request->session()->get('_token', 'default');
        $decision = $request->decision;
        $path = $request->path_yes;

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
        }

        if($decision=='no'){
            $path = $request->path_no;
        }

        // Create Resume

        $date = date('Ymd.His');

        $data = ['title'=>'temp','status'=>1,'user_id'=>Auth::user()->id,'stage'=>1];

        $data['resume_id'] = Resume::insertGetId($data);

        $data['title'] = strval("R".$date).".".strval($data['resume_id']);

        Resume::where('resume_id',$data['resume_id'])->update(['title'=>$data['title']]);

        $update_data = ['default_resume'=>$data['resume_id'],'active_resume'=>$data['resume_id']];

        if(Auth::user()->default_resume != NULL){
            $update_data = ['active_resume'=>$data['resume_id']];
        }

        User::where('id',Auth::user()->id)
                ->update($update_data);

        return redirect($path);
    }

}
