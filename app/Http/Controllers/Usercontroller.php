<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class Usercontroller extends Controller
{
    public function all_user(){
        $customer=Customer::orderBy('customer_id','DESC')->paginate(10);
        $massager_brand_product = view('admin.all_user')->with('all_user',$customer);
        return view('admin_layout')->with('admin.all_admin_brand_product',$massager_brand_product);
    }
}
