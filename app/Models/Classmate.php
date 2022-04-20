<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classmate extends Model
{
    use HasFactory;
    protected $table = 'classmates';
    protected $fillable = ['name','major_id','number','information'];

    public function majorBeLong(){
        return $this->belongsTo(Major::class,'major_id');
    }
}
