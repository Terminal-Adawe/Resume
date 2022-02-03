<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Skill;
use App\ProgressBar;
use App\ProgressPages;

class skillsController extends Controller
{
    //
    public function skills(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

        $where = [['session_id',$sessionkey]];

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
            $where = [['session_id',$sessionkey],['resume_id',Auth::user()->active_resume]];
        }

    	$data['skills'] = Skill::where($where)->get();


    	if(ProgressBar::where('session_id',$sessionkey)->exists()){

    	} else {
    		$data_p = ['session_id'=>$sessionkey];

    		ProgressBar::insert($data_p);
    	}

    	$data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

    	$data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

    	$data['page'] = "Skills";

    	return view('skills')->with('data',$data);
    }
}
