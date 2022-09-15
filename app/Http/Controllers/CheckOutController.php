<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Order;
use App\Product;
class CheckOutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout(){
        return view('pages.checkout.login_checkout');
    }
    public function add_customer(Request $request){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;

        $customer_id=DB::table('tbl_customers')->insertGetid($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect('/checkout');
    }
    public function checkout(Request $request){
        // seo
        $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
        $meta_keywords="quần áo nam nữ, quan ao nam nu";
        $meta_title="cửa hàng thời trang TNG Store";
        $url_canonical = $request->url();
        // andseo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        return view('pages.checkout.showcheckout')->with('category_product',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function login_customer(Request $request){
        $email=$request->email;
        $password=md5($request->password);

        $result=DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
       if($result)
       {
        Session::put('customer_id',$result->customer_id);
        return Redirect('/show-cart');
       }
       else{
        return Redirect('/login-checkout');
       } 
        
    }
    public function save_check_out_customer(Request $request)
    {
        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_email']=$request->shipping_email;
        if($request->shipping_note==null)
        {
            $data['shippingnote']="k có yêu cầu";
        }
        else{
            $data['shippingnote']=$request->shipping_note;
        }
        

        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);

        return Redirect('/payment');
    }
    public function payment(Request $request){
        // seo
        $meta_desc="chuyên cung cấp quần áo giá rẻ, quần áo nam, nữ, trẻ em. các phụ kiện";
        $meta_keywords="quần áo nam nữ, quan ao nam nu";
        $meta_title="cửa hàng thời trang TNG Store";
        $url_canonical = $request->url();
        // andseo
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->get(); 
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('category_product',$cate_product)->with('brand',$brand_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function order_plade(Request $request){
        //insert payment method
        
        
        $data=array();
        $data['payment_method']=$request->payment_option;
        
        $data['payment_status']='Đang chờ xử lý';
        
        $payment_id=DB::table('tbl_payment')->insertGetid($data);
        
        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::priceTotal();
        $order_data['order_status'] = '0';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
       

        $content = Cart::content();
        foreach($content as $v_content){

           

            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_color'] = $v_content->options->color;
            $order_d_data['product_size'] = $v_content->options->size;
            
            $order_d_data['product_sales_quantity'] = $v_content->qty;

            DB::table('tbl_order_details')->insert($order_d_data);


             //note
           
           
            //  $number_total=$product_quantity-$v_content->qty;
            //  $soluong[]=$v_content->qty;
            // dd($soluong);
             //end note
            //  dd($number_total);
        }
       


        if($data['payment_method']==1){

            echo 'Thanh toán thẻ ATM';

        }
        elseif($data['payment_method']==2){
            Cart::destroy();
           return view('pages.checkout.handcash');
        }else{
            echo 'ghi nợ';
        }
    }

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order  = view('admin.managa_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.managa_order', $manager_order);
    }
    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();
        
        // dd($order_by_id);
        $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
        
    }

    public function update_order(Request $request,$order_id){
        $data=$request->all();
        $update_order=Order::find($order_id);
        $update_order->order_status=$data['name'];

        

        $update_order->save();
        return redirect('/dashboard')->with('message', 'cập nhật thành công');  
    }
    public function logout_user(){
    	Session::forget('customer_id');
    	return Redirect::to('/');
    }
}
