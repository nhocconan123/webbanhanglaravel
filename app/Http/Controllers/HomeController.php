<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Mail;
use App\Product;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    public function index(Request $request){
        // seo
        $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
        $meta_keywords="quần áo nam nữ, quan ao nam nu";
        $meta_title="cửa hàng thời trang TNG Store";
        $url_canonical = $request->url();
        // andseo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        $details_product = Product::with('img')->where('product_status','1')->orderby('product_id','desc')->limit(8)->get();
        return view('pages.home')->with('category_product',$cate_product)->with('brand',$brand_product)
        ->with('product',$details_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function send_mail(Request $request){
        //send mail
        $mail=$request->namemail;
        $name=$request->name;
        $to_name = $name;
        $to_email = $mail;//send to this email

        $data = array("name"=>"".$name."","body"=>'mail gửi về vấn đề hàng hóa'); //body of mail.blade.php
    
        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

            $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        //--send mail
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');

    }
    public function search(Request $request){
        // seo
        $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
        $meta_keywords="quần áo nam nữ, quan ao nam nu";
        $meta_title="cửa hàng thời trang TNG Store";
        $url_canonical = $request->url();
        // andseo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        $keywords = $request->search;
        $product_search=DB::table('tbl_product')->where('product_name','like', "%" . $keywords . "%")->paginate(10);
        // $massager_brand_product = view('admin.all_brand_product')->with('all_Brand',$product_search);
        return view('pages.product.search')->with('productserach',$product_search)
        ->with('category_product',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function contac_us(Request $request){
        // seo
        $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
        $meta_keywords="quần áo nam nữ, quan ao nam nu";
        $meta_title="cửa hàng thời trang TNG Store";
        $url_canonical = $request->url();
        // andseo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        return view('pages.contactus.contactus')
        ->with('category_product',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
