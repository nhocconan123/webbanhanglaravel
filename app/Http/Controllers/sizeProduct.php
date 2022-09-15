<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class sizeProduct extends Controller
{
    public function add_size_product(){
        return view('admin.add_size_product');
    }
    public function all_size_product(){

        $all_category_product= DB::table('tbl_size_product')->get();
        $massager_size_product = view('admin.all_size_product')->with('all_size',$all_category_product);
        return view('admin_layout')->with('admin.all_admin_size_product',$massager_size_product);
    }

    //add size 
    public function save_size_product(Request $request){
        $data=array();
        $data['size_name']=$request->size_product_name;
        $data['name_desc']=$request->size_product_description;

        DB::table('tbl_size_product')->insert($data);
        Session::put('Message','Add category product success');
        return redirect::to('all-size-product');
    }
}
