<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassmateTutor extends Model
{
    use HasFactory;
    protected $table = 'classmate_tutors';
    protected $fillable = ['name','information','link','date','start_time','end_time','user_id','classmate_id'];
    public function usersBelongTo(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function classmateBelongTo(){
        return $this->belongsTo(Classmate::class,'classmate_id');
    }
    public function listStudent(){
        return $this->hasMany(ListStudent::class,'classmatetutor_id');
    }
}
