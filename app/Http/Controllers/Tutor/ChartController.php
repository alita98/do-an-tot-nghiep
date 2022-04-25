<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\ListStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function barChart($id){
        
        $datas = array(0,0,0);
        return view('tutor.bar-chart',compact('datas'));
    }
}
