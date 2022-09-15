@extends('layout')
@section('noidung')

<div class="hero">
    <div class="left">
      <span>Exclusive Sales</span>
      <h1>UP TO 50% OFF ON SALES</h1>
      <small>Get all exclusive offers for the season</small>
      <a href="">View Collection </a>
    </div>
    <div class="right">
      <img src="public/fontend/images/hero.png" alt="" />
    </div>
  </div>
<!-- Promotion -->

<section class="section promotion">
    <div class="title">
      <h2>Danh Mục Sản Phẩm</h2>
      <span>Select from the premium product and save plenty money</span>
    </div>

    <div class="promotion-layout container">
    @foreach($category_product as $item)
      <div class="promotion-item">
        <img src="public/images/catogory/{{$item->category_logo}}" alt="" />
        <div class="promotion-content">
          <h3>{{$item->category_name}}</h3>
          <a href="{{URL::to('/product-category/'.$item->category_id)}}">SHOP NOW</a>
        </div>
      </div>
    @endforeach
    </div>
  </section>
   <!-- Products -->
   <section class="section products">
    <div class="title">
      <h2>Sản Phẩm Mơi Ra Mắt</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>

    <div class="product-layout">
    @foreach($product as $product_detail)
      <div class="product">
        <div class="img-container">
          
          <a href="{{URL::to('/detail-product/'.$product_detail->product_id)}}"><img src="public/images/product/{{$product_detail->product_content}}" alt="" /></a>
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">{{$product_detail->product_name}}</a>
          <div class="price">
            <span>{{number_format($product_detail->product_price)}} &nbsp VND</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</section>
<!-- ADVERT -->
<section class="section advert">
    <div class="advert-layout container">
      <div class="item ">
        <img src="public/fontend/images/promo7.jpg" alt="">
        <div class="content left">
          <span>Exclusive Sales</span>
          <h3>Spring Collections</h3>
          <a href="">View Collection</a>
        </div>
      </div>
      <div class="item">
        <img src="public/fontend/images/promo8.jpg" alt="">
        <div class="content  right">
          <span>New Trending</span>
          <h3>Designer Bags</h3>
          <a href="">Shop Now </a>
        </div>
      </div>
    </div>
</section>
<!-- BRANDS -->
<section class="section brands">
    <div class="title">
      <h2>Thương Hiệu Sản Phẩm</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>

    <div class="brand-layout container">
      <div class="glide" id="glide1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            @foreach($brand as $item)
            <li class="glide__slide">
              <a href="{{URL::to('/product-brand/'.$item->brand_id)}}"><img src="public\images\brand\{{$item->brand_logo}}" alt=""></a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

    </div>
  </section>
@endsection