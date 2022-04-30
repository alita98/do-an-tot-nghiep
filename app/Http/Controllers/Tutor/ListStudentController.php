<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\ListStudent;
use App\Models\ClassmateTutor;
use Illuminate\Http\Request;

class ListStudentController extends Controller
{
    // public function list($id){
    //     $classmatetutor = ClassmateTutor::find($id);
    //     if(!$classmatetutor){
    //         return redirect(route('tutor.classmatetutor.list'));
    //     }
    //     $listStudent = ListStudent::where('id', $id);
    //     return view('tutor.list-student.list',compact('listStudent'));
    // }
}
