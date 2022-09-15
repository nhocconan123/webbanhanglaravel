@extends('layout')
@section('noidung')
<div class="features_items"><!--features_items-->
    
    <h2 class="title text-center">Danh Mục Sản Phẩm  </h2>
   
    @foreach($product as $cate_product)
    <div class="col-sm-4">
        
        <div class="product-image-wrapper">
            
            <div class="single-products">
                    <div class="productinfo text-center">
                        @foreach ($cate_product->img as $pr_img)
                        
                        <a href="{{URL::to('/detail-product/'.$product_detail->product_id)}}"><img src="public/uploads/product/{{$pr_img->product_image}}" style="width: 100px;height: 100px;" alt=""></a>
                        @endforeach
                        <h2>{{number_format($cate_product->product_price)}} VND</h2>
                        <p>{{$cate_product->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>$56</h2>
                            <p>{{$cate_product->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>danh sách yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                </ul>
            </div>
            
        </div>
       
    </div>
    @endforeach
</div><!--features_items-->



@endsection