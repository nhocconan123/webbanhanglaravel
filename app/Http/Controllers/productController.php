<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Product;

session_start();
class productController extends Controller
{
    public function add_product_product(){
        $cate_prduct=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_prduct=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $size_prduct=DB::table('tbl_size_product')->orderby('size_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_prduct)->with('brand_product',$brand_prduct)->with('size_product',$size_prduct);
    }
    public function all_product(){
        $details_product = Product::with('img')->paginate(10);
        
        $massager_product = view('admin.all_product')->with('details_product',$details_product);
        return view('admin_layout')->with('admin.all_admin_product',$massager_product);
    }
    public function save_product(Request $request){

        $data=array();
        // $data['color']=$request->color;
        $arrayToString=implode(',',$request->input('color'));
        $data['product_color']=$arrayToString;
        // dd($data);
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_description;
        // $data['product_content']=$request->product_contener;
        $data['product_price']=$request->price_product;
        $arrayToString=implode(',',$request->input('show_size'));
        $data['product_size']=$arrayToString;
        $data['product_status']=$request->product_status;
        $data['number_product']=$request->number_product;
        //add color
        // dd($data);
        // $data['product_image']
        $get_image=$request->file('product_image');
        if($get_image){
            $new_image=rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/product',$new_image);
            $data['product_content']=$new_image;
        }
        

        $last_id=DB::table('tbl_product')->insertGetid($data);
        $data['img_product']=$request->file('image_product');
        foreach ($request->file('image_product') as $item)
        {
            $da=array();
            $get_name_image = $item->getClientOriginalName();

            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,999).'.'.$item->getClientOriginalExtension();
           
            $item->move('public/uploads/product',$new_image);
            
            $da['product_id']=$last_id;
            $da['product_image']=$new_image;
           
            DB::table('tbl_image')->insert($da);
            
        }
        Session::put('Message','Add product success');
        return redirect::to('all-product');
    }
    public function unactive_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message',' Hiển thị sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
       DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
       Session::put('message','Ẩn Sản Phẩm thành công');
       return Redirect::to('all-product');
   }
   public function edit_product($product_id){
    $cate_prduct=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $brand_prduct=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

    $edit_product = Product::with('img')->where('product_id',$product_id)->get();
    //$edit_product=DB::table('tbl_product')->where('product_id',$product_id)->get();

    $massager_edit_product = view('admin.edit_product')->with('edit_product',$edit_product)
    ->with('cate_prduct',$cate_prduct)->with('brand_prduct',$brand_prduct);
    return view('admin_layout')->with('admin.all_admin_edit_product',$massager_edit_product);
   }
   public function delete_product($product_id){
        // $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        DB::table('tbl_image')->where('product_id',$product_id)->delete();
    //    dd($product_id);

       Session::put('message','Xóa sản phẩm thành công');
       return Redirect::to('all-product');
   }

   //updae product
   public function update_product(Request $request,$product_id){
    // dd($product_id);
        $data=array();
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_name']=$request->name_product;
        $data['product_desc']=$request->product_description;
        $data['product_price']=$request->price_product;
        $data['product_color']=$request->color;
        $data['product_size']=$request->size;
        $get_image = $request->file('brand_logo');
        
        if($get_image){
            // dd("ok");
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/product',$new_image);
            $data['product_content'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
    //    dd($data);
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        // dd('okd');
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
   }

   //detail product
   public function detail_product($product_id, Request $request){
    // dd('ok');
     

    $cate_category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        
    $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
    $details_product = Product::with('img')->where('tbl_product.product_id',$product_id)->orderby('product_id','desc')
    ->get();
    
    foreach($details_product as $key => $value){
        $category_id = $value->category_id;
            //seo 
                $meta_desc = $value->product_desc;
                $meta_keywords = $value->product_desc;
                $meta_title = $value->product_name;
                $url_canonical = $request->url();
            //--seo
        }
        // dd($meta_desc);
    $related_product=DB::table('tbl_product')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    ->whereNotIn('product_id',[$product_id])->orderby('product_id','desc')->limit(4)->get();
    // ->join('tbl_brand.brand_id','=','tbl_product.brand_id')
    // ->whereNotIn('product_id',[$product_id])->limit(4)->get();
        
    return view('pages.detailProduct.detailProduct')->with('category_product',$cate_category_product)
    ->with('brand',$brand_product)->with('product',$details_product)->with('meta_desc',$meta_desc)
    ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
    ->with('url_canonical',$url_canonical)->with('related_product',$related_product);
   }

   //edit image product 
   public function edit_product_image($image){
    //    dd($image);
     $edit_product_image=DB::table('tbl_image')->where('image_id',$image)->get();
    //  dd($edit_product_image);
    // $massager_edit_product = view('admin.edit_image_product')->with('edit_product_image',$edit_product_image);
    return view('admin.edit_image_product')->with('edit_product_image',$edit_product_image);
   }
   //update image product
   public function update_product_image($image_id, Request $request){
        // dd('ok');
        $data=array();
        $get_image=$request->file('image_product');
        if($get_image){
            $new_image=rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_image')->where('image_id',$image_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        
   }
}
