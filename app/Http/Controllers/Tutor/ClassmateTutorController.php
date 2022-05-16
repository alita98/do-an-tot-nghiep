<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Classmate;
use App\Models\ClassmateTutor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ClassmateTutorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
        // $room = ClassmateTutor::join('users','users.id','=','classmate_tutors.user_id')
        // ->select('classmate_tutors.link')
        // ->where('classmate_tutors.date','=', Carbon::now()->toDateString())
        // ->orderBy('date')
        // ->where('users.id',$idUser)->get();
        // $checkRoom = Str::startsWith($room,'https://meet.google.com');
        // dd($checkRoom);
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
        $date = Carbon::tomorrow('Asia/Ho_Chi_Minh')->toDateString();
        return view('tutor.classmate-tutor.add',compact('classmate','idUser','date'));
    }

    public function saveAdd(ClassmateTutorRequest $request){
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

    public function editForm($id){
        $classmateTutor = ClassmateTutor::find($id);
        $classmate = Classmate::all();
        return view('tutor.classmate-tutor.edit',compact('classmateTutor','classmate'));
    }

    public function saveEdit($id,ClassmateTutorRequest $request){
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
        // $action_id = DB::table('list_students.action_id')->config('common.attendance'); 
        $listStudent = DB::table('list_students')
        ->join('classmate_tutors','classmate_tutors.id','=','list_students.classmatetutor_id')
        ->join('users','list_students.user_id','=','users.id')
        ->select('users.name AS name_student','users.email','action_id')->where('list_students.classmatetutor_id','=',$id)->get();
        // dd($listStudent);
        $classmateTutor->load('listStudent');
        return view('tutor.list-student.list',compact('classmateTutor','listStudent'));
    }
    
    public function exportCsv($id, Request $request){
        $classmateTutor = ClassmateTutor::find($id);
        $fileName = 'danh-sach-sinh-vien.csv';
        $tasks = DB::table('list_students')
        ->join('classmate_tutors','classmate_tutors.id','=','list_students.classmatetutor_id')
        ->join('users','list_students.user_id','=','users.id')
        ->select('users.name AS name_student','users.email','users.id AS id_student','action_id')
        ->where('list_students.classmatetutor_id','=',$id)->get();
        // dd($tasks);
     
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
            "Fonts" => "Times New Roman"
        );

        $columns = array('ID sinh vien','Ten sinh vien', 'Email', 'Trang thai diem danh');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['ID sinh vien']    = $task->id_student;
                $row['Ten sinh vien']    = $task->name_student;
                $row['Email']    = $task->email;
                $row['Trang thai diem danh']    = $task->action_id == 1 ? "Da tham gia" : "Da diem danh";
                fputcsv($file, array($row['ID sinh vien'], $row['Ten sinh vien'], $row['Email'], $row['Trang thai diem danh']));
            }

            fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
            return view('tutor.list-student.list', compact('tasks','fileName'));
         }
}
