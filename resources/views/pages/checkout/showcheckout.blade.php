@extends('layout')
@section('noidung')

    <!--form check out-->
  <section class="forms section container">
    <div class="form">
        <div class="title">Điền Thông Tin Gửi Hàng</div>
        <div class="row">
            <div class="col-md-6">
            <form action="{{URL::to('/save-check-out-customer')}}" method="POST">
                {{ csrf_field() }}
                
                    <div class="input-username">
                        <label for="">Email*</label>
                        <input type="email" class="username" name="shipping_email" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập lại gmail">
                    </div>
                    <div class="input-username">
                        <label for="">Họ Và Tên*</label>
                        <input type="text" class="username" name="shipping_name" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập lại Tên">
                    </div>
                    <div class="input-username">
                        <label for="">Addrest*</label>
                        <input type="text" class="username" name="shipping_address">
                    </div>
                    <div class="input-username">
                        <label for="">Số Điện Thoại*</label>
                        <input type="text" class="username" name="shipping_phone">
                    </div>
                    <div class="input-username">
                      <label for="#3">YOUR MESSAGE*</label>
                      <textarea name="shipping_note" id="textare" cols="30" rows="10" ></textarea>
                  </div>
                  <div class="submit-t">
                      <button class="submit btn"><span>SEND</span></button>
                  </div>
                
            </form>
            </div>
        </div>
    </div>
  </section>

@endsection