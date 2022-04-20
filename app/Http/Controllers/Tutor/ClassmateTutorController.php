<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Classmate;
use App\Models\ClassmateTutor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassmateTutorController extends Controller
{
    public function list(Request $request){

        $idUser = Auth::user()->id;
        
        $classmate = Classmate::all();
        
        //Lịch học Hôm nay
        $classmateTutorToday = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
        ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
        ->where('classmate_tutors.date','=', Carbon::now()->toDateString())
        ->orderBy('date')
        ->where('users.id',$idUser)->get();
        // dd($classmateTutorToday);
        $classmateTutorToday->load('classmateBelongTo','listStudent');

        //Lịch học 7 ngày tiếp theo (mặc định)
        $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
        ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
        ->where('classmate_tutors.date','>', Carbon::now())
        ->where('classmate_tutors.date','<', Carbon::now()->addDays(7))
        ->orderBy('date')
        ->where('users.id',$idUser)->get();
        // dd($classmateTutor);
        $classmateTutor->load('classmateBelongTo','listStudent');


        //Tìm kiếm lịch học
        if($request->has('order_by') && $request->order_by >0){
            if($request->order_by == 1){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','>', Carbon::now())
                ->where('classmate_tutors.date','<', Carbon::now()->addDays(7))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }else if($request->order_by == 2){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','>', Carbon::now())
                ->where('classmate_tutors.date','<', Carbon::now()->addDays(14))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }
            else if($request->order_by == 3){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','>', Carbon::now())
                ->where('classmate_tutors.date','<', Carbon::now()->addDays(30))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }
            else if($request->order_by == 4){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','>', Carbon::now())
                ->where('classmate_tutors.date','<', Carbon::now()->addDays(60))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }else if($request->order_by == 5){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','<', Carbon::yesterday())
                ->where('classmate_tutors.date','>', Carbon::yesterday()->subDays(7))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }else if($request->order_by == 6){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','<', Carbon::yesterday())
                ->where('classmate_tutors.date','>', Carbon::yesterday()->subDays(14))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }
            else if($request->order_by == 7){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','<', Carbon::yesterday())
                ->where('classmate_tutors.date','>', Carbon::yesterday()->subDays(30))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }
            else if($request->order_by == 8){
                $classmateTutor = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
                ->select('classmate_tutors.id','classmate_tutors.name','classmate_tutors.information','classmate_tutors.link','classmate_tutors.date','classmate_tutors.start_time','classmate_tutors.end_time','classmate_tutors.user_id','classmate_tutors.classmate_id')
                ->where('classmate_tutors.date','<', Carbon::yesterday())
                ->where('classmate_tutors.date','>', Carbon::yesterday()->subDays(60))
                ->orderBy('date')
                ->where('users.id',$idUser)->get();
            }
        }

        return view('tutor.classmate-tutor.list',compact('classmateTutor','classmate','classmateTutorToday'));
    }

    public function addForm(){
        $idUser = Auth::user()->id;
        $classmate = Classmate::all();
        return view('tutor.classmate-tutor.add',compact('classmate','idUser'));
    }

    public function saveAdd(Request $request){
        $classmateTutor = new ClassmateTutor();
        $classmateTutor->fill($request->all());
        if($request->hasFile('image')){
            $newFileName = uniqid(). '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/classmatetutors', $newFileName);
            $classmateTutor->image = str_replace('public/', '', $path);
        }
        $classmateTutor->save();
        // dd($classmateTutor->image);
        return redirect(route('tutor.classmatetutor.list'))->with('msg','Thêm mới thành công');
    }

    public function editForm($id,Request $request){
        $classmateTutor = ClassmateTutor::find($id);
        $classmate = Classmate::all();
        return view('tutor.classmate-tutor.edit',compact('classmateTutor','classmate'));
    }

    public function saveEdit($id,Request $request){
        $classmateTutor = ClassmateTutor::find($id);
        $classmateTutor->fill($request->all());
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-' . $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/classmatetutors', $newFileName);
            $classmateTutor->image = str_replace('public/', '', $path);
        }
        $classmateTutor->save();
        return redirect(route('tutor.classmatetutor.list'))->with('msg','Thêm mới thành công');
    }

    public function delete($id){
        ClassmateTutor::destroy($id);
        return redirect()->back()->with('msg','Xóa thành công');
    }

    public function detail($id){
        $classmateTutor = ClassmateTutor::find($id);
        $classmateTutor->load('listStudent');
        return view('tutor.list-student.list',compact('classmateTutor'));
    }
}
