<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Certification;
use App\Education;
use App\Personal_detail;
use App\ProgressBar;
use App\ProgressPages;

class educationController extends Controller
{
    //
    public function education(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

        $where = [['session_id',$sessionkey]];

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
            $where = [['session_id',$sessionkey],['resume_id',Auth::user()->active_resume]];
        }

    	$data['certificates'] = Certification::all();
    	$data['education'] = Education::where($where)->get();
    	$data['personaldetails']=Personal_detail::where('session_id','=',$sessionkey)
    							->first();

    	if(ProgressBar::where('session_id',$sessionkey)->exists()){

    	} else {
    		$data_p = ['session_id'=>$sessionkey];

    		ProgressBar::insert($data_p);
    	}

    	$data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

    	$data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

    	$data['page'] = "Education";

    	return view('education')->with('data',$data);
    }
}
