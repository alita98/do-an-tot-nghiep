<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Student\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tutor\ClassmateController;
use App\Http\Controllers\Tutor\ClassmateTutorController;
use App\Http\Controllers\Tutor\DashboardController as TutorDashboardController;
use App\Http\Controllers\Tutor\DepartmentController;
use App\Http\Controllers\Tutor\MajorController;
use App\Http\Controllers\Tutor\ListStudentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('welcome');

Route::get('/user-profile',[ProfileController::class,'profile'])->name('UserProfile');
Route::get('/user-profile/edit/{id}',[ProfileController::class,'editForm'])->name('profile.edit');
Route::post('/user-profile/edit/{id}',[ProfileController::class,'saveEdit']);

//For admin
Route::prefix('admin/')->middleware('authadmin')->group(function(){

    //Dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    //User
    Route::prefix('/user')->group(function(){
        Route::get('/list',[UserController::class,'list'])->name('user.list.admin');
        Route::get('/add',[UserController::class,'addForm'])->name('user.add.admin');
        Route::post('/add',[UserController::class,'saveAdd']);
        Route::get('/edit/{id}',[UserController::class,'editForm'])->name('user.edit.admin');
        Route::post('/edit/{id}',[UserController::class,'saveEdit']);
        Route::get('/remove/{id}',[UserController::class,'delete'])->name('user.delete.admin');
    });
});

//For tutor
Route::prefix('tutor/')->middleware('authtutor')->group(function(){
    
    //Dashboard
    Route::get('dashboard',[TutorDashboardController::class,'index'])->name('tutor.dashboard');

    //Classmate
    Route::prefix('classmate/')->group(function(){
        Route::get('list/',[ClassmateController::class,'list'])->name('tutor.classmate.list');
        Route::get('add/',[ClassmateController::class,'addForm'])->name('tutor.classmate.add');
        Route::post('add/',[ClassmateController::class,'saveAdd']);
        Route::get('edit/{id}',[ClassmateController::class,'editForm'])->name('tutor.classmate.edit');
        Route::post('edit/{id}',[ClassmateController::class,'saveEdit']);
        Route::get('delete/{id}',[ClassmateController::class,'delete'])->name('tutor.classmate.delete');
    });

    //Classmate Tutor
    Route::prefix('classmate-tutor/')->group(function(){
        Route::get('/list',[ClassmateTutorController::class,'list'])->name('tutor.classmatetutor.list');
        Route::get('/add',[ClassmateTutorController::class,'addForm'])->name('tutor.classmatetutor.add');
        Route::post('/add',[ClassmateTutorController::class,'saveAdd']);
        Route::get('/edit/{id}',[ClassmateTutorController::class,'editForm'])->name('tutor.classmatetutor.edit');
        Route::post('/edit/{id}',[ClassmateTutorController::class,'saveEdit']);
        Route::get('/remove/{id}',[ClassmateTutorController::class,'delete'])->name('tutor.classmatetutor.delete');
        Route::get('/detai-list-student/{id}',[ClassmateTutorController::class,'detail'])->name('tutor.classmatetutor.detail');
        Route::get('/export-tasks/{id}',[ClassmateTutorController::class,'exportCsv'])->name('export-tasks');
    });

    //Department
    Route::prefix('department/')->group(function(){
        Route::get('/list',[DepartmentController::class,'list'])->name('tutor.department.list');
        Route::get('/add',[DepartmentController::class,'addForm'])->name('tutor.department.add');
        Route::post('/add',[DepartmentController::class,'saveAdd']);
        Route::get('/edit/{id}',[DepartmentController::class,'editForm'])->name('tutor.department.edit');
        Route::post('/edit/{id}',[DepartmentController::class,'saveEdit']);
        Route::get('/remove/{id}',[DepartmentController::class,'delete'])->name('tutor.department.delete');
    });

    //Major
    Route::prefix('major/')->group(function(){
        Route::get('/list',[MajorController::class,'list'])->name('tutor.major.list');
        Route::get('/add',[MajorController::class,'addForm'])->name('tutor.major.add');
        Route::post('/add',[MajorController::class,'saveAdd']);
        Route::get('/edit/{id}',[MajorController::class,'editForm'])->name('tutor.major.edit');
        Route::post('/edit/{id}',[MajorController::class,'saveEdit']);
        Route::get('/remove/{id}',[MajorController::class,'delete'])->name('tutor.major.delete');
    });
});

//For user
Route::prefix('student/')->middleware('auth')->group(function(){

    //Classmate Tutor ???? tham gia
    Route::get('classmate-tutor-for-me',[HomeController::class,'classmateForMe'])->name('classmate.me');

    //Vote
    Route::post('vote',[HomeController::class,'saveVote'])->name('vote');
    //Xem chi ti???t l???p h???c ???? tham gia
    Route::get('classmate-tutor-for-me-detail/{id}',[HomeController::class,'classmateForMeDetail'])->name('classmate.me.detail');
    
    //Detail Classmate Tutor
    Route::get('detail-classmate-tutor/{id}',[HomeController::class,'detail'])->name('detail.classmatetutor');

    //Join Classmate Tutor
    Route::post('detail-classmate-tutor/{id}',[HomeController::class,'saveJoin']);

    // Route::get('diem-danh/{id}',[HomeController::class,'diemDanhForm'])->name('diem.danh.form');
    Route::post('diem-danh',[HomeController::class,'diemDanh'])->name('diem.danh');



    Route::get('/forum', [PagesController::class, 'index'])->name('forum');

    Route::resource('/blog', PostsController::class);
    Route::POST('/comment/store',  [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
    Route::post('/reply/store', [\App\Http\Controllers\CommentController::class,'replyStore'])->name('reply.add');
    Route::get('/search', [\App\Http\Controllers\PagesController::class,'search'])->name('PostSearch');
    Route::get('/category', [\App\Http\Controllers\CategoryController::class,'index'])->name('category');
    Route::get('/tag', [\App\Http\Controllers\TagController::class,'index'])->name('tag');
});


//Login Logout Register
Route::get('login',[LoginController::class,'loginForm'])->name('login');
Route::post('login',[LoginController::class,'saveLogin']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//????ng nh???p b???ng Google, Facebook

Route::get('/login/google',[LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback',[LoginController::class,'handleGoogleCallback']);

Route::get('/login/facebook',[LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback',[LoginController::class,'handleFacebookCallback']);

// 403
Route::get('/403',function(){
    return view('404');
})->name('403');