<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\has_licence as LicenceModel;


class has_licence extends Controller
{
    static function checkLicence(){
        // return "has licence" ;
        $data = LicenceModel::first();
        // dd($data);
        if($data->is_autherized){
            return true;
        }
        else{
            return false ;
        }



    }
    public function changeStatus($val){

        $data = LicenceModel::first();
        if($val == 1){
            $data->is_autherized = true ;
        }
        else{
            $data->is_autherized = false ;
        }
        $data->save();
        return redirect()->route('home');

    }
}
