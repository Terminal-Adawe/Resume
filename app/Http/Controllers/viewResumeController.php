<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Auth;
use App\Personal_detail;
use App\Education;
use App\Professional_experience;
use App\Certification;
use App\Skill;
use App\Hobby;
use App\Summary;
use App\UserTemplateProperty;
use App\TemplateProperty;
use App\ProgressBar;
use App\ProgressPages;
use PDF;
use DB;

class viewResumeController extends Controller
{
    //
    public function viewtemplates(){
    	
        $data['templates'] = TemplateProperty::where('active','1')->get();

    	return view('templates')->with('data',$data);
    }

    public function viewresume(Request $request){
    	$sessionkey = $request->session()->get('_token', 'default');

        $where = [['session_id',$sessionkey]];

        $resume_id = 0;

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
            $resume_id = Auth::user()->active_resume;
            $where = [['session_id',$sessionkey],['resume_id',$resume_id]];
        }

    	$hiddencheck = $request->hiddencheck;
        $templateid = $request->templateid;

    	$data['personaldetails'] = Personal_detail::where('session_id',$sessionkey)
    		->first();

    	$data['education'] = Education::join('certifications','certifications.id','=','education.certification_id')->where($where)
            ->select('*','education.id as eid')
    		->get();

        $data['education_projects'] = Education::leftJoin('educational_projects','education.id','educational_projects.education_id')
            ->join('certifications','certifications.id','=','education.certification_id')
            ->where($where)
            ->select('*','education.id as eid')
            ->get();

    	$data['professionalexperience'] = Professional_experience::where($where)
    		->get();

        $data['professionalexperience_responsibilities'] = Professional_experience::leftJoin('work_duties','professional_experiences.id','work_duties.professional_experience_id')
            ->where($where)
            ->get();

        $data['professionalexperience_projects'] = Professional_experience::leftJoin('work_projects','professional_experiences.id','work_projects.professional_experience_id')
            ->where($where)
            ->get();

    	$data['skills'] = Skill::where($where)
    		->get();

    	$data['hobbies'] = Hobby::where($where)
    		->get();

    	$data['summary'] = Summary::where($where)
    		->first();

        if (UserTemplateProperty::where([['session_id',$sessionkey],['resume_id',$resume_id],['template',$templateid]])->doesntExist()) {
            // ...
            $data['templateproperties'] = TemplateProperty::where('template_id',$templateid)->first();
            $colors = explode(",",$data['templateproperties']->available_colors);
            $fonts = explode(",",$data['templateproperties']->available_fonts);

            $userProperties=['session_id'=>$sessionkey,'resume_id'=>$resume_id,'template'=>$templateid,'color1'=>trim($colors[0]),'color2'=>'black','font'=>trim($fonts[0])];

            DB::table('user_template_properties')->insert($userProperties);
            }


        $data['templateproperties'] = TemplateProperty::where('template_id',$templateid)->first();

        Log::debug("template ID is ".$templateid);
        Log::debug($data['templateproperties']);

        $data['properties'] = UserTemplateProperty::where([['session_id',$sessionkey],['resume_id',$resume_id],['template',$templateid]])->first();

        $data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

        $data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

        $data['page'] = "viewresume";

    	return view('templates.'.$data['templateproperties']->template_name)->with('data',$data);
    }


    public function printsheet(Request $request){

      $objDateTime = date('Ymdis');
      $file = $objDateTime.".pdf";
      $filep = public_path()."/storage/resumes/".$file;
      // $objDateTime->format('Ymdis');

      $resume_id = Auth::user()->active_resume;

      $sessionkey = $request->session()->get('_token', 'default');
        $hiddencheck = $request->hiddencheck;

        $template = $request->template;

        $where = [['session_id',$sessionkey]];

        $resume_id = 0;

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
            $resume_id = Auth::user()->active_resume;

            $where = [['session_id',$sessionkey],['resume_id',$resume_id]];
        }


        $data['personaldetails'] = Personal_detail::where('session_id',$sessionkey)
            ->first();

        $data['education'] = Education::join('certifications','certifications.id','=','education.certification_id')->where($where)
            ->select('*','education.id as eid')
            ->get();

        $data['education_projects'] = Education::leftJoin('educational_projects','education.id','educational_projects.education_id')
            ->join('certifications','certifications.id','=','education.certification_id')
            ->where($where)
            ->select('*','education.id as eid')
            ->get();

        $data['professionalexperience'] = Professional_experience::where($where)
            ->get();

        $data['professionalexperience_responsibilities'] = Professional_experience::leftJoin('work_duties','professional_experiences.id','work_duties.professional_experience_id')
            ->where($where)
            ->get();

        $data['professionalexperience_projects'] = Professional_experience::leftJoin('work_projects','professional_experiences.id','work_projects.professional_experience_id')
            ->where($where)
            ->get();

        $data['skills'] = Skill::where($where)
            ->get();

        $data['hobbies'] = Hobby::where($where)
            ->get();

        $data['summary'] = Summary::where($where)
            ->first();

        $data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

        $data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

        $data['properties'] = UserTemplateProperty::where([['session_id',$sessionkey],['resume_id',$resume_id],['template',$template]])->first();

        $data['template'] = TemplateProperty::where('template_id',$template)->first();

        $data['page'] = "viewresume";

        // share data to view
        $pdf = new PDF();
    
        view()->share('data',$data);
        $pdf = PDF::loadView('templates.print.'.$data['template']->template_name, $data);
    
    
        // PDF::setBasePath(realpath($_SERVER['DOCUMENT_ROOT']));
    
          // download PDF file with download method
          return $pdf->download($file);
    }

    public function previewresume(Request $request){
        $sessionkey = $request->session()->get('_token', 'default');
        $template = $request->template;

        $templateid = $request->templateid;

        $themeColor = $request->themeColor;
        $themeFont;

        $resume_id = 0;


        $where = [['session_id',$sessionkey]];

        if(Auth::check()){
            $resume_id = Auth::user()->active_resume;

            $sessionkey = Auth::user()->id;
            $where = [['session_id',$sessionkey],['resume_id',$resume_id]];
        }

        $hiddencheck = $request->hiddencheck;


        // Update personal properties
        $user_prop=['color1'=>$themeColor];

        UserTemplateProperty::where('session_id',$sessionkey)->update($user_prop);


        $data['personaldetails'] = Personal_detail::where('session_id',$sessionkey)
            ->first();

        $data['education'] = Education::join('certifications','certifications.id','=','education.certification_id')->where($where)
            ->select('*','education.id as eid')
            ->get();

        $data['education_projects'] = Education::leftJoin('educational_projects','education.id','educational_projects.education_id')
            ->join('certifications','certifications.id','=','education.certification_id')
            ->where($where)
            ->select('*','education.id as eid')
            ->get();

        $data['professionalexperience'] = Professional_experience::where($where)
            ->get();

        $data['professionalexperience_responsibilities'] = Professional_experience::leftJoin('work_duties','professional_experiences.id','work_duties.professional_experience_id')
            ->where($where)
            ->get();

        $data['professionalexperience_projects'] = Professional_experience::leftJoin('work_projects','professional_experiences.id','work_projects.professional_experience_id')
            ->where($where)
            ->get();

        $data['skills'] = Skill::where($where)
            ->get();

        $data['hobbies'] = Hobby::where($where)
            ->get();

        $data['summary'] = Summary::where($where)
            ->first();

        $data['properties'] = UserTemplateProperty::where([['session_id',$sessionkey],['resume_id',$resume_id],['template',$templateid]])->first();

        $data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

        $data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

        $data['page'] = "viewresume";

        return view('templates.preview.'.$template.'Preview')->with('data',$data);
    }


    public function export(Request $request){
        $sessionkey = $request->session()->get('_token', 'default');

        $where = [['session_id',$sessionkey]];

        if(Auth::check()){
            $sessionkey = Auth::user()->id;
            $where = [['session_id',$sessionkey],['resume_id',Auth::user()->active_resume]];
        }

        $hiddencheck = $request->hiddencheck;

        $data['personaldetails'] = Personal_detail::where('session_id','=',$sessionkey)
            ->first();

        $data['education'] = Education::join('certifications','certifications.id','=','education.certification_id')->where($where)
            ->select('*','education.id as eid')
            ->get();

        $data['education_projects'] = Education::leftJoin('educational_projects','education.id','educational_projects.education_id')
            ->join('certifications','certifications.id','=','education.certification_id')
            ->where($where)
            ->select('*','education.id as eid')
            ->get();

        $data['professionalexperience'] = Professional_experience::where($where)
            ->get();

        $data['professionalexperience_responsibilities'] = Professional_experience::leftJoin('work_duties','professional_experiences.id','work_duties.professional_experience_id')
            ->where($where)
            ->get();

        $data['professionalexperience_projects'] = Professional_experience::leftJoin('work_projects','professional_experiences.id','work_projects.professional_experience_id')
            ->where($where)
            ->get();

        $data['skills'] = Skill::where($where)
            ->get();

        $data['hobbies'] = Hobby::where($where)
            ->get();

        $data['summary'] = Summary::where($where)
            ->first();

        $data['progress'] = ProgressBar::where('session_id',$sessionkey)->first();

        $data['properties'] = UserTemplateProperty::where([['session_id',$sessionkey],['resume_id',$resume_id],['template',$templateid]])->first();

        $data['progressPages'] = ProgressPages::orderBy('created_at', 'ASC')->get();

        $data['page'] = "viewresume";

        $pdf = PDF::loadView('template1.print.template1', ['data' => $data]);

        return $pdf->download('resume.pdf');
    }

}




