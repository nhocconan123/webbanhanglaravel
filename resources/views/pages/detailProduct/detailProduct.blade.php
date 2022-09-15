@extends('layout')
@section('noidung')
 <!-- Product Details -->
 
 <section class="section product-detail">
    @foreach($product as $cate_product)
    <div class="details container">
      <div class="left">
        
        <div class="main">
          <img src="public/images/product/{{$cate_product->product_content}}" alt="" id="featured"  class="thumbnailImg active" />
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="public/images/product/{{$cate_product->product_content}}" alt="" id="featured"  class="thumbnailImg active" />
          </div>
          @foreach ($cate_product->img as $pr_img)
            <div class="thumbnail">
              <img src="public/uploads/product/{{$pr_img->product_image}}" alt="" class="thumbnailImg" />
            </div>
          @endforeach
        
        </div>
      </div>
      <div class="right">
        <span>Home/T-shirt</span>
        <h1>
          {{$cate_product->product_name}}
          {{-- share facebok --}}
          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" 
          src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=1239103799774053&autoLogAppEvents=1" 
          nonce="wn1IJ1hc"></script>
          <div class="fb-share-button" data-href="{{$url_canonical}}" 
          data-layout="box_count" data-size="small"><a target="_blank" 
          href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}" 
          class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
        </h1>
        <span>Giá Sản Phẩm : </span>
        <div class="price">{{number_format($cate_product->product_price)}} &nbsp VND</div>
        <form class="form" action="{{URL::to('/save-cart')}}" method="POST">
           {{ csrf_field() }}
           {{-- color --}}
            <div class="option_style input-group">
              <div class="option_title">Màu sắc</div>
              <div class="color_item">
                @foreach (explode(',',$cate_product->product_color) as $color)
                <?php
                    // $color !=null;
                    
                if($color !=null){
                echo '<label for="" class="product-variation a1288 active" data-option-value-id="1288">
                    <input type="radio" class="" name="color" value="'.$color.'">'.$color.'
                  </label>';}
                ?>
                @endforeach
              </div>
            </div>
            
            {{-- size --}}

            {{-- color --}}
            <div class="option_style input-group">
              <div class="option_title">Kích Thước</div>
              <div class="color_item">
                @foreach (explode(',',$cate_product->product_size) as $size)
                  <label for="" class="product-variation a1288 active" data-option-value-id="1288">
                    <input type="radio" class="" name="size" value="{{$size}}">{{$size}}
                  </label>
                @endforeach
              </div>
            </div>
            <br />
          <div class="option_style input-group">
            <div class="option_title">Số Lượng</div>
            <div class="color_item">
              <input type="number" placeholder="1" name="qty" max="{{$cate_product->number_product}}" min="1" value="1"/>
            </div>
          </div>
          
          
          <input type="hidden" name="product_hidden" value="{{$cate_product->product_id}}">
          
          <button class="addCart">Add To Cart</button>
        </form>
        <h3>Mô Tả Sản Phẩm</h3>
        <p class="show-more">
          {!! $cate_product->product_desc !!}
          {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/RdjuHUY8csU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
          <br>
          <a href="javascript:void();" class="readmore-btn">Read More</a>
        </p>
        <h3>hướng dẫn cách sử dụng</h3>
        <p>Giặt trước khi sử dụng
          Giặt máy ở nhiệt độ thường
          Không dùng chất tẩy
          Giặt với sản phẩm cùng màu
          Ủi ở nhiệt độ tối đa 150 độ C
          Sấy khô ở nhiệt độ thấp
        </p>
      </div>
    </div>
    @endforeach
     
  </section>
  
 
  <!-- Facebook comment -->
  <section class="section comment container">
    <div id="fb-root"></div>
    
    <div class="fb-comments" 
    data-href="{{$url_canonical}}" 
    data-width="" data-numposts="5"></div>
  </section>


  <!-- Related Products -->

  <section class="section related-products">
    <div class="title">
      <h2>Sản Phẩm Liên Quan</h2>
      <span>Chọn từ các thương hiệu sản phẩm cao cấp và tiết kiệm nhiều tiền</span>
    </div>

    <div class="product-layout container">
      @foreach($related_product as $related)
      <div class="product">
        <div class="img-container">
          <a href="{{URL::to('/detail-product/'.$related->product_id)}}">
          <img src="public/images/product/{{$related->product_content}}" alt="" />
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
          <a href="">{{$related->product_name}}</a>
          <div class="price">
            <span>{{$related->product_price}}</span>
          </div>
        </div>
      </div>
      @endforeach
      
      
    </div>
  </section>


  <!-- kết thúc -->
  @endsection
  