<?php

namespace App\Http\Controllers\Tutor;
use App\Models\ClassmateTutor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(){

        $authID = Auth::user()->id;
        // pie
            $listStudent = collect(DB::table('list_students')
            ->join('classmate_tutors','classmate_tutors.id','=','list_students.classmatetutor_id')
            ->select('list_students.user_id')
            ->where('classmate_tutors.user_id','=',$authID)->get())->keyBy('user_id')->count();
            $countSTD = DB::table('users')->where('role','=','USR')->count();
            $percentStdJoined = round(($listStudent/$countSTD)*100,2);
            $percentStdNotParticipate = 100 - $percentStdJoined;

        // barchart
            // Lấy danh sách tháng trong năm
                // lấy năm hiện tại
                $monthnow = Carbon::now()->month;
                $year = Carbon::now()->year;
                // danh sách tên trong tháng
                $names = collect(DB::table('classmate_tutors')->select('name')->whereYear('date',$year)->whereMonth('date',$monthnow)->get())->pluck('name')->all();
            
                // dd($names);
                
        // trả về
            return view('tutor.index',compact('percentStdJoined','percentStdNotParticipate','monthnow','year','names'));
    }
}