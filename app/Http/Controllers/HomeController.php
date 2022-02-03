<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Resume;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['resumes'] = Resume::where('user_id',Auth::user()->id)->get();
        return view('home')->with('data',$data);
    }

    public function existing_resume(Request $request)
    {
        $resume_id = $request->resume_id;

        User::where('id',Auth::user()->id)->update(['active_resume'=>$resume_id]);

        return redirect('/professionalexperience');
    }

}
