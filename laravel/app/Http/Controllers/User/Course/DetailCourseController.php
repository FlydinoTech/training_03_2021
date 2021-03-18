<?php

namespace App\Http\Controllers\User\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
class DetailCourseController extends Controller
{
    //
    public function detailCourse($id){
        $course = Course::FindOrFail($id);
        $user = Auth::user();
     
        return view('user.course.detailCourse',compact('course','user'));
    }
    public function register($id){
        $course = Course::FindOrFail($id);
        $listSche = Schedule::where('course_id',$id)->get();
      
        //đã đăng ký register
        $listRegister =  Register::join('schedules','schedules.id','=','registers.schedule_id')->where(['registers.user_id'=>Auth::user()->id,'schedules.course_id'=>$id])->get();
     $arrRegis = [];   
     if(count($listRegister)>0)$listRegister=$listRegister->toArray();
     foreach($listRegister as $item){
        
        $arrRegis[] =$item['id'];
        
     }
    


        
        return view('user.course.formRegister',compact(['listSche','arrRegis']));
    }
    public function smRegister($id,Request $re){
        if(!empty($re->schedule)){
        $data = [];
        foreach($re->schedule as $item){
            $data[] = [
                'schedule_id' => $item,
                'user_id' => Auth::user()->id,
            ];
        }
        //dd($data);
        //DB::table('registers')->insert($data);
        Register::insert($data);
        return redirect()->route('home')->with('successReC','Đăng ký thành công');
    }else{
        return redirect()->route('home');
    }
    }
}