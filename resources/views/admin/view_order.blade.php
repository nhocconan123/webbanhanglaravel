@extends('admin_layout')
@section('admin_container')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông Tin Người Mua
      </div>
      <div class="table-responsive">
        
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên khách Hàng</th>
              <th>Số điện Thoại</th>
              <th>email</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>{{$customer->customer_name}}</td>
              <td>{{$customer->customer_phone}}</td>
              <td>{{$customer->customer_email}}</td>
            </tr>
            
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông Tin Người Nhận Hàng
      </div>
      <div class="table-responsive">
        
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên Người Nhận</th>
              <th>Địa Chỉ</th>
              <th>Số Điện Thoại</th>
            </tr>
          </thead>
          <tbody>
           
            <tr>
              <td>{{$shipping->shipping_name}}</td>
              <td>{{$shipping->shipping_address}}</td>
              <td>{{$shipping->shipping_phone}}</td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông Tin Đơn Hàng
      </div>
      <div class="table-responsive">
        
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên Sản Phẩm</th>
              <th>Số Lượng</th>
              <th>Giá</th>
              <th>Size</th>
              <th>color</th>
              <th>Tổng Tiền</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($order_details_product  as $key =>$item)
            <tr>
              
              
              <td>{{$item->product_name}}</td>
              <td>{{$item->product_sales_quantity}}</td>
              <td>{{$item->product_price}}</td>
              <td>
                  {{$item->product_size}}
                <!-- @php
                if($item->product_size==1)
                {
                  echo 'size S';
                }
                elseif($item->product_size==2){
                  echo 'size M';
                }
                elseif($item->product_size==3){
                  echo 'size L';
                }
                elseif($item->product_size==4){
                  echo 'size XL';
                }
                elseif($item->product_size==5){
                  echo 'size XS';
                }
                
                @endphp       -->
              </td>
              <td>
              {{$item->product_color}}
              </td>
              <td>{{$item->product_price*$item->product_sales_quantity}}</td>
            </tr>
            @endforeach
            <tr>
              <td> 
                  Thanh Toán: 
                  
              </td>
            </tr>
          </tbody>
        </table>
        <a target="_blank" href="{{URL::to('/print-order/'.$item->order_id.'')}}">In hóa đơn</a>
      </div>
      <div class="view-order">
        <form action="{{URL::to('/update-order/'.$item->order_id.'')}}" method="post">
          {{ csrf_field() }}
          <input type="text" value="1" name="name" style="display: none">
          <button>Cận phật đơn hàng</button>
        </form>
      </div>
      <div class="view-order">
        <form action="{{URL::to('/send-mail')}}" method="post">
          {{ csrf_field() }}
          <input type="text" value="{{$customer->customer_name}}" name="name" style="display: none">
          <input type="text" value="{{$customer->customer_email}}" name="namemail" style="display: none">
          <button>xác nhận đơn hàng</button>
        </form>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection