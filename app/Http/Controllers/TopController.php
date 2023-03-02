<?php

namespace App\Http\Controllers;

use App\Models\Top;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function show(Request $request)
    {
        $return = [];
        $id = $request->idtop;
        if($id){
            $top = Top::find($id);
            $return = ['status'=>'success',$top];
        }else{
            $return = ['status'=>'data tidak di temukan'];
        }
        return response($return);
    }
}
