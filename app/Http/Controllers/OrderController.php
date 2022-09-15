<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use App\Customer;
use App\Product;
use App\Shipping;
use PDF;
class OrderController extends Controller
{
    public function manage_order(){
        $order = Order::orderby('order_id','DESC')->paginate(5);
    	return view('admin.manage_order')->with('order',$order);
    }
    public function view_order($orderId){
        $order_details=OrderDetails::where('order_id',$orderId)->get();
        $order = Order::where('order_id',$orderId)->get();
        
        foreach($order as $ord)
        {
            $customer_id=$ord->customer_id;
            $shipping_id = $ord->shipping_id;
           
        }
        $cus = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details_product = OrderDetails::where('order_id', $orderId)->get();
        
        // dd($order_details_product);

        return view('admin.view_order')->with('order_details',$order_details)->with('customer',$cus)->with('shipping',$shipping)
        ->with('order_details_product',$order_details_product);
    }
    public function print_order($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($checkout_code));
		
		return $pdf->stream();
    }
    public function print_order_convert($checkout_code){
        // return $checkout_code;
        
        $order_details_product = OrderDetails::where('order_id', $checkout_code)->get();

        $order = Order::where('order_id',$checkout_code)->get();
        
        foreach($order as $ord)
        {
            $customer_id=$ord->customer_id;
            $shipping_id = $ord->shipping_id;
           
        }
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details_product = OrderDetails::where('order_id', $checkout_code)->get();
        $output = '';
        $output.='<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<h1><center>CÔNG TY CP ĐẦU TƯ & THƯƠNG MẠI TNG</center></h1>
		<h4><center>Độc lập - Tự do - Hạnh phúc</center></h4>
		<p>Người đặt hàng</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên khách đặt</th>
                        <th>Địa chỉ giao hàng</th>
						<th>Số điện thoại</th>
						<th>Email</th>
                        <th>ghi chú</th>
					</tr>
				</thead>
				<tbody>';
                $output.='		
					<tr>
						<td>'.$shipping->shipping_name.'</td>
						<td>'.$shipping->shipping_address.'</td>
						<td>'.$shipping->shipping_phone.'</td>
						<td>'.$shipping->shipping_email.'</td>
						<td>'.$shipping->shipping_notes.'</td>
						
					</tr>';
				

                $output.='				
                        </tbody>
                    
                </table>';
                $output.='				
                <p>Đơn hàng đặt</p>
                    <table class="table-styling">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>size</th>
                                <th>màu sắc</th>
                                <th>Số lượng</th>
                                <th>Giá sản phẩm</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                    <tbody>';
                $total = 0;
                foreach($order_details_product as $key => $product){
                $subtotal = $product->product_price*$product->product_sales_quantity;
				$total+=$subtotal;
                $output.='		
					<tr>
                        <td>'.$product->product_name.'</td>
                        <td>'.$product->product_size.'</td>
                        <td>'.$product->product_color.'</td>
                    ';
                    
                        // if($product->product_size==1)
                        // {
                        //     $output.='size S';
                        // }
                        // elseif($product->product_size==2){
                        //     $output.='size M';
                        // }
                        // elseif($product->product_size==3){
                        //     $output.='size L';
                        // }
                        // elseif($product->product_size==4){
                        //     $output.='size Xl';
                        // }
                        // elseif($product->product_size==5){
                        //     $output.='size XXl';
                        // }
                    
                     
                        $output.='
                        <td>'.$product->product_sales_quantity.'</td>
                        <td>'.$product->product_price.'</td>
                        <td>'.number_format($subtotal,0,',','.').'</td>
                    </tr>';
                    
                }
                $output.= 
                    '<tr>
				        <td colspan="5">
					        
					        <p>Thanh toán : '.number_format($total,0,',','.').'đ'.'</p>
				        </td>
		            </tr>';
                    $output.='				
                    </tbody>                
                    </table>
            
                    <p>Ký tên</p>
                        <table>
                            <thead>
                                <tr>
                                    <th width="200px">Người lập phiếu</th>
                                    <th width="800px">Người nhận</th>
                                    
                                </tr>
                            </thead>
                            <tbody>';
                                    
                    $output.='				
                            </tbody>
                        
                    </table>
            
                    ';
        return $output;
    }
}
