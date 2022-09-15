@extends('admin_layout')
@section('admin_container')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt Kê Đơn Hàng
      </div>
      
      <div class="table-responsive">
        <?php
          $message = Session::get('message');
          if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
          }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Mã đơn hàng</th>
              <th>Tổng Giá Tiền</th>
              <th>Tình Trạng</th>
              <th>Hiển Thị</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order as $order)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$order->customer_name}}</td>
              <td>{{$order->order_total}}</td>
              <td>
               
                @php
                if($order->order_status==0)
                {
                  echo '<p style={color: red;}><i class="fal fa-lightbulb-on"></i>Đang Chờ Xử Lý</p>';
                }
                elseif($order->order_status==1){
                  echo 'Đơn Hàng Đã Được Xác Nhận';
                }else{
                  echo 'Liên Hệ Lại Cho Nhà Phát Triển';
                }      
                @endphp
              </td>
              <td>
                <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
                  <i class="fas fa-eye"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{URL::to('/detete-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
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