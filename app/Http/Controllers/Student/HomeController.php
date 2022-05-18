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
    public function index(Request $request){
        // Đếm số giảng viên
        $countgv = User::all()->where("role","=","TT")->count();
        $countsv = User::all()->where("role","=","USR")->count();
        // Số tt đã diễn ra
        $countttp = ClassmateTutor::all()->count();
        // số tt sắp diễn ra
        $countttf = ClassmateTutor::all()->count();
        // số tt đang diễn ra
        $countttn = ClassmateTutor::all()->count();
        $pagesize = config('common.default_page_size'); 
        $search = ClassmateTutor::where('name', 'like', "%".$request->keyword."%")->where('date','>', Carbon::yesterday());
        $searchClassmateTutor = $search->paginate($pagesize);
        $searchClassmateTutor->appends($request->except('page'));
        // dd($search);
        $classmateTutor = ClassmateTutor::all()->where('date','>', Carbon::yesterday());
        $tutors = User::all()->where("role","=","TT")->all();
        $classmateTutor->load('usersBelongTo','classmateBelongTo');
        
        return view('layouts.clients.home',compact('countgv','countttp','countttf','countttn','searchClassmateTutor','countsv','tutors','classmateTutor'));
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
        $checkList = collect(DB::table('list_students')
        ->join('classmate_tutors','classmate_tutors.id','=','list_students.classmatetutor_id')
        ->select(
            'list_students.id',
            'list_students.user_id',
            'list_students.classmatetutor_id',
            'list_students.action_id',
        )
        ->where('classmate_tutors.id',$id)
        ->where('list_students.action_id','=',1)->get())->contains('user_id',$IdUser);

        

        $test = collect(DB::table('classmate_tutors')->where('date','<',Carbon::now())->where('id',$id)->get());

        
        $test1 = DB::table('classmate_tutors')->select('start_time')->where('id',$id)->get();
        $test2 = DB::table('classmate_tutors')->select('end_time')->where('id',$id)->get();
        $test3 = DB::table('classmate_tutors')->select('date')->where('id',$id)->get();
        
        // $test4 = DB::table('classmate_tutors')
        // ->where('date','=',Carbon::now()->today())
        // ->where('id',$id)->get();
        // $d = Carbon::now()->format('H:i');
        // $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
        // $dt = date_add();
        // dd($nextyear);
        
        //Start_time
        foreach($test1 as $key => $val){
            foreach($val as $key1 => $val1){
                // dd($val1);
            }
        }

        // End_time
        foreach($test2 as $key3 => $val3){
            foreach($val3 as $key4 => $val4){
                // dd($val4);
            }
        }

        //Date today
        foreach($test3 as $key5 => $val5){
            foreach($val5 as $key6 => $val6){
                // dd($val6);
            }
        }
        // $test5 = Carbon::now()->diffInHours($val1);
        // dd($test5);
        $test6 = date('H:i');
        $test7 = date('Y-m-d');
        // dd($test7);
        // dd($test6);
        // if($val1 < $test6 && $test6<$val4 && $val6 == $test7){
            // dd('true');
        // }else{
            // dd('false');
        // }

        // $t = Carbon::now()->hour;
        // dd($t);
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
            'list_students.action_id as action_list',
            'list_students.id as id_list'
            )
        ->where('classmate_tutors.id',$id)
        ->where('list_students.user_id',$IdUser)->get();

        return view('home.classmate-for-me',compact('classmateTutor','classmateTutorMe','countClassmateTutor','checkIds','IdUser','test','val1','test6','val4','test7','val6','checkList'));
    }


    public function diemDanh(Request $request){
        if($request->isMethod('post')){
            $list_id = $request->get('list_id');
            $list = ListStudent::find($list_id);
            $list->fill(
                [
                    'user_id' => $list->user_id,
                    'classmatetutor_id' => $list->classmatetutor_id,
                    'action_id' => 2

                ]
            );
            $list->save();
            return redirect()->back();
        }
    }

    public function saveVote(Request $request){
        $classmateTutor = new Vote();
        $classmateTutor->fill($request->all());
        $classmateTutor->save();
        return redirect()->back();
    }

    
}
