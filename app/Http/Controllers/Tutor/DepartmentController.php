<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Major;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function dashboard(){
        return view('layouts.admin.admin-layout');
    }

    public function list(){
        $departments = Department::all();
        return view('tutor.department.list',compact('departments'));
    }

    public function addForm(){
        return view('tutor.department.add');
    }

    public function saveAdd(Request $request){
        $departments = new Department();
        $departments->fill($request->all());
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-' . $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/departments', $newFileName);
            $departments->image = str_replace('public/', '', $path);
        }
        $departments->save();
        return redirect(route('tutor.department.list'))->with('msg','Thêm mới thành công!');
    }

    public function editForm($id){
        $departments = Department::find($id);
        return view('tutor.department.edit',compact('departments'));
    }

    public function saveEdit($id,Request $request){
        $departments = Department::find($id);
        if(!$departments){
            return redirect(route('tutor.department.list'));
        }
        $departments->fill($request->all());
        if($request->hasFile('file_upload')){
            $newFileName = uniqid(). '-' . $request->file_upload->getClientOriginalName();
            $path = $request->file_upload->storeAs('public/uploads/departments', $newFileName);
            $departments->image = str_replace('public/', '', $path);
        }
        $departments->save();
        return redirect(route('tutor.department.list'))->with('msg','Sửa thành công!');
    }

    public function delete($id){
        $model= Department::find($id);
        if(!$model){
            return redirect(route('tutor.department.list'));
        }
        $major = Major::where("department_id", $id)->get();
        foreach ($major as $key => $item) {
            $item->delete();
        }
        Department::destroy($id);
        return redirect()->back()->with('msg','Xóa thành công!');
    }
}
