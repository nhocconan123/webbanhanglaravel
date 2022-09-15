<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
class CartController extends Controller
{
    public function save_cart(Request $request){

        

        $productId=$request->product_hidden;
        $quantity=$request->qty;
        $size=$request->size;
        $color=$request->color;

        $product_info=DB::table('tbl_product')->where('product_id',$productId)->first();
        

        $data['id']=$productId;
        // dd($data['id']);
        $data['qty']=$quantity;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['weight']='500';
        $data['options']['size']=$size;
        $data['options']['color']=$color;
        $data['options']['image'] = $product_info->product_content;
        
        //note
        // $content = Cart::content();
        // foreach ($content as $v_content)
        // {
        //     if($v_content->id==$productId )
        //     {
        //         Cart::add($data);
        //         $soluongold=$v_content->qty;
        //         $tien=$v_content->price;
        //         $soluongold+=$quantity;
        //         $tien+=$product_info->product_price;
        //         Cart::update($v_content->rowId, ['qty' => $soluongold]);
        //         Cart::update($v_content->rowId, ['price' => $tien]);
        //         return Redirect::to('/show-cart');
        //     }
        // }

        //end not
        Cart::add($data);
        return Redirect::to('/show-cart');
        
    }
    public function show_cart(Request $request){
         // seo
         $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
         $meta_keywords="quần áo nam nữ, quan ao nam nu";
         $meta_title="cửa hàng thời trang TNG Store";
         $url_canonical = $request->url();
         // andseo
         $cate_product = DB::table('tbl_category_product')->where('category_status','1')->get(); 
         $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        return view('pages.cart.show_cart')->with('category_product',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_qty(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->qty;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
