@extends('layout')
@section('noidung')
    <!-- Cart Items -->
    <?php
      $content = Cart::content();
    ?>

    <div class="grid-container container section">
      <div class="item1 grid-item">
              <table>
                  <tr>
                  <th>Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Thành Tiền</th>
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
                          <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">remove</a>
                      </div>
                      </div>
                  </td>
                  <td>
                    <form action="{{URL::to('/update-cart-qty')}}" method="post">
                      {{ csrf_field() }}
                      <input type="number" value="{{$v_content->qty}}" name="qty" min="1" />
                      <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" min="1" />
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
              <div class="box-coupon">
                  <div class="coupon">
                      <h3 class="coupon-box-title">
                          Coupon
                      </h3>
                      <div class="inner-box">
                          <input type="text" name="coupon_code" class="input-text" id="coupon_code" placeholder="Coupon code">
                          <input type="submit" class="cart-btn" name="Apply Coupon" id="" value="Apply Coupon">
                      </div>
                  </div>
              </div>
      </div>
      <div class="item2 grid-item">
          <h2>Cart Totals</h2>
                <form action="{{URL::to('/order-plade')}}" method="post">
                  {{ csrf_field() }}
                  <table>
                  <tbody>
                  <tr>
                      <td>Tổng Tiền</td>
                      <td class="cart-price">{{Cart::priceTotal().' '.'vnđ'}}</td>
                  </tr>
                  <tr>
                      <td class="box-cart-total">Hình Thức Thanh Thoán</td>
                      <td class="option-pay">
                      <label for="">
                          <input type="radio" name="payment_option" id="" value="1">By Edit Cart
                      </label><br>
                      </label>
                      <label for="">
                          <input type="radio" name="payment_option" id="" value="2">Tiền Mặt
                      </label><br>
                      <label for="">
                          <input type="radio" name="payment_option" id="" value="3">Ghi Nợ
                      </label>
                      </td>
                  </tr>
                  <tr>
                      <td >
                      Tổng Tiền
                      </td>
                      <td>
                      <td><span class="price">{{Cart::priceTotal().' '.'vnđ'}}</span></td>
                      </td>
                  </tr>
                  </tbody>
                  </table>
                  <input type="submit" class="button medium" value="Đặt Hàng" >
                  {{-- <button class="button medium">UPDATE CART</button>
                  <button class="button medium btn-primary">PROCEED TO CHECKOUT</button> --}}
                </form>
          </div>
      </div>
    </div>



    {{-- <div class="container cart">
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
        <div class="box-coupon">
          <div class="coupon">
            <h3 class="coupon-box-title">Coupon</h3>
            <div class="inner-box">
              <input type="text" name="coupon_code" class="input-text" id="coupon_code" placeholder="Coupon code">
              <input type="submit" class="button" name="apply_coupon" value="Apply Coupon">
            </div>
          </div>
        </div>
        <div class="payment-options">
          <h4>Chọn Hình Thức Thanh Toán</h4>

          <div class="pay-option">
            <form action="{{URL::to('/order-plade')}}" method="post">
              {{ csrf_field() }}
              <span><label for=""><input type="checkbox" name="payment_option" value="1">Thanh Toán Bằng Tiền Mặt</label></span>
              <br>
              <span><label for=""><input type="checkbox" name="payment_option" value="2">Thanh Toán Bằng Thẻ</label></span>
              <br>
              <span><label for=""><input type="checkbox" name="payment_option" value="1">Thanh Toán Bằng Thẻ Ghi Nợ</label></span>
              <br>
              <input type="submit" class="btn payment" value="Đặt Hàng" >
            </form>
          </div>
        </div> --}}
        
{{-- @endsection --}}