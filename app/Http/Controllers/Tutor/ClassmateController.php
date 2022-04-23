<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Classmate;
use App\Models\ClassmateTutor;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Requests\ClassmateRequest;

class ClassmateController extends Controller
{
    public function list(){
        $classmates = Classmate::all();
        $classmates->load('majorBeLong');
        return view('tutor.classmate.list',compact('classmates'));
    }

    public function addForm(){
        $majors = Major::all();
        return view('tutor.classmate.add',compact('majors'));
    }

    public function saveAdd(ClassmateRequest $request){
        $classmates = new Classmate();
        $classmates->fill($request->all());
        $classmates->save();
        return redirect(route('tutor.classmate.list'))->with('msg','Thêm mới thành công!');
    }

    public function editForm($id){
        $classmates = Classmate::find($id);
        $majors = Major::all();
        return view('tutor.classmate.edit',compact('majors','classmates'));
    }

    public function saveEdit($id,ClassmateRequest $request){
        $classmates = Classmate::find($id);
        $classmates->fill($request->all());
        $classmates->save();
        return redirect(route('tutor.classmate.list'))->with('msg','Sửa thành công!');
    }

    public function delete($id){
        $model= Classmate::find($id);
        if(!$model){
            return redirect(route('tutor.classmate.list'));
        }
        $classmate_tutor = ClassmateTutor::where("classmate_id", $id)->get();
        foreach ($classmate_tutor as $key => $item) {
            $item->delete();
        }
        Classmate::destroy($id);
        return redirect()->back()->with('msg','Xóa thành công!');
    }
}
