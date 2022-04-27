<?php

namespace App\Http\Controllers\Tutor;
use App\Models\ClassmateTutor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class DashboardController extends Controller
{
    public function index(){
    //     $authID = Auth::user()->id;
    //         $listStudent = collect(DB::table('list_students')
    //         ->join('classmate_tutors','classmate_tutors.id','=','list_students.classmatetutor_id')
    //         ->select('list_students.user_id')
    //         ->where('classmate_tutors.user_id','=',$authID)->get())->keyBy('user_id')->count();
    //         $countSTD = DB::table('users')->where('role','=','USR')->count();
    //         $percentStdJoined = ($listStudent/$countSTD)*100;
    //         $percentStdNotParticipate = 100 - $percentStdJoined;
    //         return view('layouts.admin.dashboard',compact('percentStdJoined','percentStdNotParticipate'));
            return view('tutor.index');
    }
}