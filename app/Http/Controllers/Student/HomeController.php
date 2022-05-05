<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassmateTutor;
use App\Models\ListStudent;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        // Đếm số giảng viên
        $countgv = User::all()->where("role","=","ADM")->count();
        $countsv = User::all()->where("role","=","USR")->count();
        // Số tt đã diễn ra
        $countttp = ClassmateTutor::all()->count();
        // số tt sắp diễn ra
        $countttf = ClassmateTutor::all()->count();
        // số tt đang diễn ra
        $countttn = ClassmateTutor::all()->count();

        $classmateTutor = ClassmateTutor::all()
        ->where('date','>', Carbon::yesterday());
        $classmateTutor->load('usersBelongTo','classmateBelongTo');
        
        return view('layouts.clients.home',compact('countgv','countttp','countttf','countttn','countsv','classmateTutor'));
    }

    public function detail($id){
        $IdUser = Auth::user()->id;    
        $checkIds = collect(DB::table('list_students')->where('classmatetutor_id','=',$id)->get())->contains('user_id',$IdUser);
        $classmateTutor = ClassmateTutor::find($id);
        $countClassmateTutor = DB::table('classmate_tutors')->join('list_students','list_students.classmatetutor_id','=','classmate_tutors.id')->select('list_students.classmatetutor_id')->where('list_students.classmatetutor_id','=',$id)->count();
        $idStudent = Auth::user()->id;
        $classmateTutor->load('usersBelongTo','classmateBelongTo','listStudent');
        return view('home.detail',compact('classmateTutor','idStudent','countClassmateTutor','checkIds'));
    }

    public function saveJoin(Request $request){
        $classmateTutor = new ListStudent();
        $classmateTutor->fill($request->all());
        $classmateTutor->save();
        return redirect()->back();
    }

    public function classmateForMe(){
        $IdUser = Auth::user()->id;
        $classmateTutor = DB::table('list_students')
        ->join('classmate_tutors','classmate_tutors.id','=','list_students.classmatetutor_id')
        ->join('users','classmate_tutors.user_id','=','users.id')
        ->join('classmates','classmates.id','=','classmate_tutors.classmate_id')
        ->select(
            'classmate_tutors.id as id_classmate',
            'classmates.name as name_classmate',
            'classmate_tutors.date as date_classmatetutor',
            'classmate_tutors.name as name_classmate_tutor',
            'users.name as name_tutor',
            'classmate_tutors.information as information_classmatetutor'
            )
        ->where('list_students.user_id',$IdUser)
        ->get();
        
        return view('home.classmate-me',compact('classmateTutor'));
    }

    public function classmateForMeDetail($id){
        $IdUser = Auth::user()->id;

        $checkIds = collect(DB::table('votes')->where('classmatetutor_id','=',$id)->get())->contains('user_id',$IdUser);
        // dd($checkIds);

        $test = collect(DB::table('classmate_tutors')->where('date','<',Carbon::now())->where('id',$id)->get());
        // dd(isset($test[0]));
        
        $classmateTutor = ClassmateTutor::find($id);

        $countClassmateTutor = DB::table('classmate_tutors')
        ->join('list_students','list_students.classmatetutor_id','=','classmate_tutors.id')
        ->select('list_students.classmatetutor_id')
        ->where('list_students.classmatetutor_id','=',$id)->count();

        $classmateTutorMe = DB::table('list_students')
        ->join('classmate_tutors','classmate_tutors.id','=','list_students.classmatetutor_id')
        ->join('users','users.id','=','classmate_tutors.user_id')
        ->join('classmates','classmates.id','=','classmate_tutors.classmate_id')
        ->select(
            'classmate_tutors.id as id_classmatetutor',
            'classmate_tutors.name as name_classmatetutor',
            'users.name as name_tutor',
            'classmate_tutors.link as link_classmatetutor',
            'classmate_tutors.date as date_classmatetutor',
            'classmate_tutors.start_time as start_time_classmatetutor',
            'classmate_tutors.end_time as end_time_classmatetutor',
            'classmate_tutors.information as information_classmatetutor',
            )
        ->where('classmate_tutors.id',$id)
        ->where('list_students.user_id',$IdUser)->get();

        return view('home.classmate-for-me',compact('classmateTutor','classmateTutorMe','countClassmateTutor','checkIds','IdUser','test'));
    }

    public function saveVote(Request $request){
        $classmateTutor = new Vote();
        $classmateTutor->fill($request->all());
        $classmateTutor->save();
        return redirect()->back();
    }

    
}
