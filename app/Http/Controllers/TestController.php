<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Department;
use App\Models\User;

class TestController extends Controller
{
    public function fetchTest(){
    $data['tests']=Test::all();
    return view('fetch_test',$data);
    }

    public function createTest(){

        $test=new Test;
        $test->name="raman";
        $test->address="muzaffarnagar";
        $test->phone=1234567891;
        $test->save();
        return 'success';


    }
   

   
}
