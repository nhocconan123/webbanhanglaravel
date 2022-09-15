<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class brandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return redirect('dashboard');
        }
        else{
            return redirect('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        // $all_brand_product= DB::table('tbl_brand_product')->get();
        $all_brand_product=Brand::orderBy('brand_id','DESC')->paginate(10);
        $massager_brand_product = view('admin.all_brand_product')->with('all_Brand',$all_brand_product);
        return view('admin_layout')->with('admin.all_admin_brand_product',$massager_brand_product);
    }
    public function save_brand_product(Request $request)
    {
        
        $data=$request->all();
        $brand=new Brand();
        $brand->brand_name=$data['brand_product_name'];
        $brand->brand_slug=$data['brand_slug'];
        $brand->brand_desc=$data['brand_desc'];
       
        // $data['product_image']
        $get_image=$request->file('brand_logo');
        if($get_image){
            $new_image=rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/brand',$new_image);
            $brand->brand_logo=$new_image;
                 
        }
        $brand->brand_status=$data['brand_status'];
        
       
        $brand->save();

        Session::put('Message','Add category product success');
        return redirect::to('all-brand-product');
    }
    public function unactive_brand_product($brand_product_id)
    {
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('Message','không kích hoạt thành công');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id){
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('Message','không kích hoạt thành công');
        return redirect::to('all-brand-product');
    }
    //update
    public function edit_brand_product($brand_product_id){
        // dd("den");
        // $edit_brand_product= DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $edit_brand_product=Brand::where('brand_id',$brand_product_id)->get();
        $massager_brand_product = view('admin.edit_brand_product')->with('edit_brand',$edit_brand_product);
        return view('admin_layout')->with('admin.all_admin_brand_product',$massager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_id){
        $data=array();
        $data['brand_name']=$request->brand_product_name;
        $data['brand_desc']=$request->brand_product_description;
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update($data);
        Session::put('Message','edit success');
        return redirect::to('all-brand-product');
    }
    public function product_brand($brand_product_id,Request $request){
        // seo
        $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
        $meta_keywords="quần áo nam nữ, quan ao nam nu";
        $meta_title="cửa hàng thời trang TNG Store";
        $url_canonical = $request->url();
        // andseo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        // $keywords = $request->search;
        $product_search=DB::table('tbl_product')->where('brand_id',$brand_product_id)->get();
        return view('pages.product.search')->with('productserach',$product_search)
        ->with('category_product',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
}
