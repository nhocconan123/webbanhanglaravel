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
                        @foreach ($edit_product_image as $cate_pro)
                        <form role="form" action="{{URL::to('/update-image-product/'.$cate_pro->image_id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        
                        {{-- xem lại chỗ này --}}
                        
                        
                        <div class="form-group">
                            @for($i=1;$i<=1;$i++)
                                <label>Ảnh sản phẩm {{$i}}</label>
                                <input id="img{{$i}}" type="file" name="image_product" class="form-control hidden"
                                onchange="changeImg{{$i}}(this)">
                                
                                <img id="avatar{{$i}}" class="thumbnail" width="100%" height="350px" src="public/uploads/product/{{$cate_pro->product_image}}">
                            @endfor 
                        </div>
                        
                        
                        
                        
                        <button type="submit" class="btn btn-info" name="addProduct">Edit image Product</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>
            
    </div>
</div>
@endsection