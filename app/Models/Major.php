<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'majors';
    protected $fillable = ['name','department_id'];

    public function departmentBelong(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
