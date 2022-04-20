<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListStudent extends Model
{
    use HasFactory;
    protected $table = 'list_students';
    protected $fillable = ['user_id','classmatetutor_id'];

    public function userBelongTo(){
        return $this->belongsTo(User::class,'user_id');
    }
}
