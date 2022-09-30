<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Customer;


class IndexController extends Controller
{
    public function createMobRecord(){

        $mobile=new Mobile();
        $mobile->model="lg003";

        $customer=new Customer();
        $customer->name="komal";
        $customer->save();
        $customer->mobile()->save($mobile);
        return 'success';
        }

        public function showCustomer($id){
            $data['customer']=Mobile::find($id)->customer;
           // dd($data['customer']);
            return view('showCustomer',$data);

        }

         public function showMobile($id){
            $mobile=Customer::find($id)->mobile;
            dd($mobile->model);

        }

    
}
