
@extends('admin_layout')
@section('admin_container')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ADD Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_product as $item)
                        <form role="form" action="{{URL::to('/update-product/'.$item->product_id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Product Name</label>
                            <input type="text" name="name_product" class="form-control" id="exampleInputEmail1" placeholder=" Product Name"  data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự"
                            value="{{$item->product_name}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Price Product</label>
                            <input type="number" name="price_product" class="form-control" id="exampleInputEmail1" 
                            placeholder="category Product Name"  data-validation="length" 
                            data-validation-length="min1"  data-validation-error-msg="Làm ơn nhập lại số tiền"
                            value="{{$item->product_price}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product description</label>
                            <textarea style="rezise:none" rows="5" name="product_description"  class="form-control" 
                            id="exampleInputPassword1" placeholder="description"  data-validation="length" 
                            data-validation-length="min50" data-validation-error-msg="Làm ơn điền ít nhất 50 ký tự"
                            >{{$item->product_desc}}</textarea>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <label for="">Category Product</label>
                            <select name="category_id" id="" class="form-control input-sm m-bot15">
                                @foreach ($cate_prduct as $item)
                                <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Brand Product</label>
                            <select name="brand_id" id="" class="form-control input-sm m-bot15">
                                @foreach ($brand_prduct as $item)
                                <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                @endforeach     
                            </select>
                        </div>
                        @foreach ($edit_product as $item)
                        {{--add color--}}
                        <div class="form-group" id="crud_table">
                            <label for="exampleInputEmail1">color product</label>
                            <input type="text" name="color" class="form-control" placeholder="nhập màu sắc" value="{{$item->product_color}}">
                            
                        </div>
                        <div class="form-group">
                            <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                        </div>
                        {{--end add color--}}
                        {{--add color--}}
                        <div class="form-group" id="crud_size">
                            <label for="exampleInputEmail1">size product</label>
                            <input type="text" name="size" class="form-control" placeholder="nhập màu sắc" value="{{$item->product_size}}">
                            
                        </div>
                        {{--end size--}}
                        @endforeach
                        {{-- anh chính --}}
                        <div class="form-group">
                            @foreach ($edit_product as $item)
                            <label for="exampleInputPassword1">Product Image</label>
                            <input id="img" type='file' name='brand_logo' class='form-control hidden' onchange='changeImg(this)'>
                            <img id='avatar' class='thumbnail' width='100%' height='350px' src="public/images/product/{{$item->product_content}}">
                            @endforeach 
                        </div>
                        {{-- xem lại chỗ này --}}
                        {{-- <div class="form-group">
                            @foreach ($edit_product as $cate_pro)
                            @foreach ($cate_pro->img as $pr_img)
                            @for($i=1;$i<=1;$i++)
                                <label>Ảnh sản phẩm {{$i}}</label>
                                <input id="img{{$i}}" type="file" name="image_product[]" class="form-control hidden"
                                onchange="changeImg{{$i}}(this)">
                                <img id="avatar{{$i}}" class="thumbnail" width="100%" height="350px" src="public/uploads/product/{{$pr_img->product_image}}">
                            @endfor
                            @endforeach
                            @endforeach
                            
                            
                         </div> --}}
                         
                        
                        
                         {{-- kết thúc chỗ này --}}
                        {{-- @foreach ($edit_product->img as $pr_img)
                        {{$pr_img->product_image}}
                        @endforeach --}}
                        <button type="submit" class="btn btn-info" name="addProduct">Edit Product</button>
                    </form>
                    </div>

                </div>
            </section>
            
    </div>
</div>
    
@endsection

