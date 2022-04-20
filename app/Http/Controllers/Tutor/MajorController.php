<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Classmate;
use App\Models\Department;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function list(){
        $majors = Major::all();
        $majors->load('departmentBelong');
        return view('tutor.major.list',compact('majors'));
    }

    public function addForm(){
        $departments = Department::all();
        return view('tutor.major.add',compact('departments'));
    }

    public function saveAdd(Request $request){
        $majors = new Major();
        $majors->fill($request->all());
        $majors->save();
        return redirect(route('tutor.major.list'))->with('msg','Thêm mới thành công!');
    }

    public function editForm($id){
        $majors = Major::find($id);
        $departments = Department::all();
        return view('tutor.major.edit',compact('majors','departments'));
    }

    public function saveEdit($id,Request $request){
        $majors = Major::find($id);
        $majors->fill($request->all());
        $majors->save();
        return redirect(route('tutor.major.list'))->with('msg','Sửa thành công!');
    }

    public function delete($id){
        $model= Major::find($id);
        if(!$model){
            return redirect(route('tutor.major.list'));
        }
        $classmates = Classmate::where("major_id", $id)->get();
        foreach ($classmates as $key => $item) {
            $item->delete();
        }
        Major::destroy($id);
        return redirect()->back()->with('msg','Xóa thành công!');
    }
}
