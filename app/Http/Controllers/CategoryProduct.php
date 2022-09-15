<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('admin.add_Category_product');
    }
    public function all_category_product(){

        $all_category_product= DB::table('tbl_category_product')->get();
        $massager_category_product = view('admin.all_category_product')->with('all_Catogory',$all_category_product);
        return view('admin_layout')->with('admin.all_admin_category_product',$massager_category_product);
    }
    public function save_category_product(Request $request)
    {
        $data=array();
        
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['category_name'] = $request->category_product_name;
        $data['slug_category_product'] = $request->slug_category_product;
    	$data['category_desc'] = $request->category_product_desc;
        $get_image=$request->file('category_image');
        
        if($get_image){
            $new_image=rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/catogory',$new_image);
            $data['category_logo']=$new_image;
            
        }
    	$data['category_status'] = $request->category_status;
        
        
        
        
        // dd($data);
        DB::table('tbl_category_product')->insert($data);
        Session::put('Message','Add category product success');
        return redirect::to('all-category-product');
    }
    public function unactive_category_product($category_product_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('Message','không kích hoạt thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('Message','không kích hoạt thành công');
        return redirect::to('all-category-product');
    }
    //update
    public function edit_category_product($category_product_id){
       
        $edit_category_product= DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        
        $massager_category_product = view('admin.edit_category_product')->with('edit_Catogory',$edit_category_product);
        return view('admin_layout')->with('admin.edit_admin_category_product',$massager_category_product);
    }
    public function update_category_product(Request $request,$category_id){
        $data=array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_desc;

        DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
        Session::put('Message','edit success');
        return redirect::to('all-category-product');
    }
    //delete category
    public function delete_category_product($category_id){
        DB::table('tbl_category_product')->where('category_id',$category_id)->delete();
        Session::put('Message','delete success');
        return redirect::to('all-category-product');
    }

    //danh mục sản phẩm
    public function show_category_home($category_id){

        $cate_category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        $details_product = Product::with('img')->where('tbl_product.category_id',$category_id)->get();
        return view('pages.category.show_category')->with('category_product',$cate_category_product)->with('brand',$brand_product)->with('product',$details_product);

       
    }

    //thương hiệu sản phẩm
    public function show_brand_home($category_id){

        $cate_category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        $details_product = Product::with('img')->where('tbl_product.brand_id',$category_id)->get();
        return view('pages.category.show_category')->with('category_product',$cate_category_product)->with('brand',$brand_product)->with('product',$details_product);

       
    }
    //show category product
    public function show_product_category($category_id,Request $request){
        // seo
        $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
        $meta_keywords="quần áo nam nữ, quan ao nam nu";
        $meta_title="cửa hàng thời trang TNG Store";
        $url_canonical = $request->url();
        // andseo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        // $keywords = $request->search;
        $product_search=DB::table('tbl_product')->where('category_id',$category_id)->get();
        return view('pages.product.categoryview')->with('productserach',$product_search)
        ->with('category_product',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
}
