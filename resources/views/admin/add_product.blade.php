
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
                        <form role="form" action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="category Product Name"  data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Price Product</label>
                            <input type="number" name="price_product" class="form-control" id="exampleInputEmail1" placeholder="category Product Name"  data-validation="length" data-validation-length="min1"  data-validation-error-msg="Làm ơn nhập lại số tiền">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product description</label>
                            <textarea style="rezise:none" rows="5" name="product_description"  class="form-control" id="exampleInputPassword1" placeholder="description"  data-validation="length" data-validation-length="min50" data-validation-error-msg="Làm ơn điền ít nhất 50 ký tự"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Product contener</label>
                            <textarea style="rezise:none" rows="5" name="product_contener"  class="form-control" id="exampleInputPassword1" placeholder="description" ></textarea>
                        </div> --}}
                        <div class="form-group">
                            <label for="">Category Product</label>
                            <select name="category_id" id="" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $item)
                                <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Brand Product</label>
                            <select name="brand_id" id="" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $item)
                                <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        {{--add color--}}
                        <div class="form-group" id="crud_table">
                            <label for="exampleInputEmail1">color product</label>
                            <input type="text" name="color[]" class="form-control" placeholder="nhập màu sắc">
                            
                        </div>
                        <div class="form-group">
                            <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                        </div>
                        {{--end add color--}}
                        <div class="form-group" id="crud_size">
                            <label for="">Size Product</label>
                            <input type="text" name="show_size[]" class="form-control" placeholder="nhập kích thưc sản phẩm">
                            
                            {{-- @foreach ($size_product as $item)
                                <label class="container">{{$item->size_name}}
                                    <input type="checkbox" name="show_size[]" value="{{$item->size_id}}">
                                </label>
                            @endforeach --}}
                            
                        </div>
                        <div class="form-group">
                            <button type="button" name="add" id="addsize" class="btn btn-success btn-xs">+</button>
                        </div>
                        {{--số lượng sp--}}
                        <div class="form-group">
                            <label for="exampleInputEmail1"> số lượng sản phẩm</label>
                            <input type="number" name="number_product" class="form-control" >
                        </div>
                        
                        {{--and số lượng--}}
                        {{-- anh chính --}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Image</label>
                            <input id="imgProductto" type="file" name="product_image"  class="form-control hidden"
                                onchange="changeImgProduct(this)">
                                <img id="imgProduct" class="thumbnail" width="100%" height="350px" src="public/backend/images/img.png">
                        </div>
                        {{-- xem lại chỗ này --}}
                        <div class="form-group">
                            @for($i=1;$i<=3;$i++)
                                <label>Ảnh sản phẩm {{$i}}</label>
                                <input id="img{{$i}}" type="file" name="image_product[]" class="form-control hidden"
                                onchange="changeImg{{$i}}(this)">
                                <img id="avatar{{$i}}" class="thumbnail" width="100%" height="350px" src="public/backend/images/img.png">
                            @endfor
                            
                            
                         </div>
                         
                        
                        
                         {{-- kết thúc chỗ này --}}
                        <div class="form-group">
                            <label for="">display</label>
                            <select name="product_status" id="" class="form-control input-sm m-bot15">
                                <option value="0">ẩn</option>
                                <option value="1">hiện</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="addProduct">ADD Category Product</button>
                    </form>
                    </div>

                </div>
            </section>
            
    </div>
</div>
    
@endsection
