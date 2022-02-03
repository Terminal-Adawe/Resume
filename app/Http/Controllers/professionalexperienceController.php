<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Professional_experience;
use App\Personal_detail;
use App\ProgressBar;
use App\ProgressPages;

class professionalexperienceController extends Controller
{
    //
    public function professionalexperience(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

    	$data = $request->session()->all();

        $where = [['session_id',$sessionkey]];

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
            $where = [['session_id',$sessionkey],['resume_id',Auth::user()->active_resume]];
        }

        $data['personaldetails']=Personal_detail::where('session_id','=',$sessionkey)
                                ->first();

    	if($sessionkey=="0"){
    		// return redirect('/');
    	}


    	$data['professionalexperience'] = Professional_experience::where($where)
    		->get();

        if(ProgressBar::where('session_id',$sessionkey)->exists()){

        } else {
            $data_p = ['session_id'=>$sessionkey];

            ProgressBar::insert($data_p);
        }

        $data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

        $data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

        $data['page'] = "Professional Experience";

    	return view('professionalexperience')->with('data',$data);
    }
}
