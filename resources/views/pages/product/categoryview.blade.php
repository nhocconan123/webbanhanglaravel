@extends('layout')
@section('noidung')

<!-- PRODUCTS -->

<section class="section products">
    <div class="products-layout container">
      <div class="col-1-of-4">
        <div>
          <div class="block-title">
            <h3>Danh mục sản phẩm</h3>
          </div>

          <ul class="block-content">
          @foreach($cate_product as $item)
            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>{{$item->category_name}}</span>
              </label>
            </li>
          @endforeach
          </ul>
        </div>

        <div>
          <div class="block-title">
            <h3>Thương Hiệu</h3>
          </div>

          <ul class="block-content">
          @foreach($brand_product as $item)
            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>{{$item->brand_name}}</span>
              </label>
            </li>
          @endforeach
          </ul>
        </div>
      </div>
      <div class="col-3-of-4">
        <form action="">
          <div class="item">
            <label for="sort-by">Sort By</label>
            <select name="sort-by" id="sort-by">
              <option value="title" selected="selected">Name</option>
              <option value="number">Price</option>
              <option value="search_api_relevance">Relevance</option>
              <option value="created">Newness</option>
            </select>
          </div>
          <div class="item">
            <label for="order-by">Order</label>
            <select name="order-by" id="sort-by">
              <option value="ASC" selected="selected">ASC</option>
              <option value="DESC">DESC</option>
            </select>
          </div>
          <a href="">Apply</a>
        </form>
        <div class="product-layout">
            
            @foreach($productserach as $product)
            <div class="product">
                <div class="img-container">
                  <a href="{{URL::to('/detail-product/'.$product->product_id)}}">
                    <img src="public/images/product/{{$product->product_content}}" alt="" />
                  </a>
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
                <a href="productDetails.html">{{$product->product_name}}</a>
                <div class="price">
                    <span>{{$product->product_price}}</span>
                </div>
                </div>
            </div>
            @endforeach
        </div>

       
      </div>
    </div>
  </section>


@endsection