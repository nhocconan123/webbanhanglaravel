@extends('layout')
@section('noidung')
    <!-- Cart Items -->
    <?php
      $content = Cart::content();
     
    ?>





    <div class="container cart">
        <table>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>
          @foreach ($content as $v_content)
          <tr>
            <td>
              <div class="cart-info">
                <img src="public/images/product/{{$v_content->options->image}}" alt="" />
                <div>
                  <p>{{$v_content->name}}</p>
                  <span>Price: {{number_format($v_content->price)}} VND</span>
                  <br />
                  <span>Color: {{$v_content->options->color}}</span>
                  <br />
                  <span>Size: {{$size=$v_content->options->size}}
                  
                  </span>
                  <br />
                  <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">remove</a>
                </div>
              </div>
            </td>
            <td>
              <form action="{{URL::to('/update-cart-qty')}}" method="post">
                {{ csrf_field() }}
                <input type="number" value="{{$v_content->qty}}" name="qty" min="1" />
                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" min="1" />
                <input type="submit" value="Cập Nhật" name="update_qty">
              </form>
            </td>
            <td>
              <?php 
              $subtotal=$v_content->price * $v_content->qty;
              echo number_format($subtotal)
              ?>  
            </td>
          </tr>
          @endforeach
        </table>
  
        <div class="total-price">
          <table>
            <tr>
              <td>Subtotal</td>
              <td>{{Cart::priceTotal().' '.'vnđ'}}</td>
            </tr>
            <tr>
              <td>Phí vận chuyển</td>
              <td>30000</td>
            </tr>
            <tr>
              <td>Total</td>
              <td>{{Cart::priceTotal().' '.'vnđ'}}</td>
            </tr>
          </table>
          <?php
            
            
            $customer_id=Session::get('customer_id');
            if($customer_id !=null){
          ?>
          <a href="{{URL::to('/checkout')}}" class="checkout btn">Proceed To Checkout</a>
          <?php } else {
            ?>
          <a href="{{URL::to('/login-checkout')}}" class="checkout btn">Tiến hành thành toán</a>
          <?php } ?>
        </div>
      </div>
  
@endsection