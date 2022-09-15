<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- seo -->
	<meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="{{$meta_keywords}}"/>
	<meta name="robots" content="INDEX,FOLLOW"/>
	<meta name="author" content="{{$url_canonical}}">
	<link  rel="canonical" href="http://localhost/CuaHangThoiTranTNG" />
	<link  rel="icon" type="image/x-icon" href="" />
	{{-- end seo --}}
	<title>{{$meta_title}}</title>
	<!-- Favicon -->
	<base href="{{asset('')}}">
	
	<link rel="shortcut icon" href="public/fontend/images/favicon.ico" type="image/x-icon" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<!-- Glidejs -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
	<!-- jquery min -->
	<script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
	<!-- Custom StyleSheet -->
	<link rel="stylesheet" href="public/fontend/css/styles.css" />
	<link rel="stylesheet" href="public/fontend/css/jquery.nice-number.css" />
	<title>Codevo - Ecommerce Website</title>
   
</head><!--/head-->

<body>
	
		<!-- Navigation -->
		<nav class="nav">
			<div class="wrapper container">
			  <div class="logo"><a href="">TNG STORE</a></div>
			  <ul class="nav-list">
				<div class="top">
				  <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
				</div>
				<li><a href="#">TRANG CHỦ</a></li>
				<li>
				  <a href="" class="desktop-item">SẢN PHẨM <span><i class="fas fa-chevron-down"></i></span></a>
				  <input type="checkbox" id="showMega" />
				  <label for="showMega" class="mobile-item">SẢN PHẨM <span><i class="fas fa-chevron-down"></i></span></label>
				  <div class="mega-box">
					<div class="content">
					  <div class="row">
						<img src="public/fontend/images/woman.jpg" alt="" />
					  </div>
					  <div class="row">
						<header>LOẠI SẢN PHẨM</header>
						<ul class="mega-links">
						@foreach($category_product as $item)
						  <li><a href="{{URL::to('/product-category/'.$item->category_id)}}">{{$item->category_name}}</a></li>
						@endforeach
						</ul>
					  </div>
					  <div class="row">
						<header>THƯƠNG HIỆU</header>
						<ul class="mega-links">
						@foreach($brand as $item)
						  <li><a href="{{URL::to('/product-brand/'.$item->brand_id)}}">{{$item->brand_name}}</a></li>
						@endforeach
						</ul>
					  </div>
					  <div class="row">
						<header>Product Layout</header>
						<ul class="mega-links">
						  <li><a href="#">product layout 1</a></li>
						  <li><a href="#">product layout 2</a></li>
						  <li><a href="#">Layout Sticky 2</a></li>
						  <li><a href="#">Layout Scroll</a></li>
						</ul>
					  </div>
					</div>
				  </div>
				</li>
				<li>
				  <a href="" class="desktop-item">KHUYẾN MÃI <span><i class="fas fa-chevron-down"></i></span></a>
				  <input type="checkbox" id="showdrop1" />
				  <label for="showdrop1" class="mobile-item">KHUYẾN MÃI <span><i class="fas fa-chevron-down"></i></span></label>
				  <ul class="drop-menu1">
					<li><a href="">Vendor Store listings</a></li>
					<li><a href="">Store Details</a></li>
				  </ul>
				</li>
		
				<li>
				  <a href="" class="desktop-item">HÀNG MỚI</a>
				  <input type="checkbox" id="showdrop2" />
				  <label for="showdrop2" class="mobile-item">HÀNG MỚI <span><i class="fas fa-chevron-down"></i></span></label>
				  <ul class="drop-menu2">
					<li><a href="">About</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="">Faq</a></li>
					<li><a href="">Page 404</a></li>
				  </ul>
				</li>
				<li>
					<a href="{{URL::to('/contac-us')}}" class="desktop-item">LIÊN HỆ</a>
				</li>
				<!-- icons -->
				<li class="icons">
					<span>
						<?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                        ?>
						 <a href="{{URL::to('/logout-checkout')}}">
						<img src="public/fontend/images/home/useranh.png" alt="" />
						</a>
						<?php
                            }else{
                        ?>
						<a href="{{URL::to('/login-checkout')}}">
							<img src="public/fontend/images/home/user.png" alt="" /></a>
						
						<?php 
                            }
                        ?>
					</span>
				  	<span>
						<a href="{{URL::to('/show-cart')}}"><img src="public/fontend/images/shoppingBag.svg" alt="" />
						<small class="count d-flex">
						<?php
							$content = Cart::content();
							Cart::count();
							echo $content->count();
						?>
						</small>
						</a>
				  	</span>
				  <span><button onclick="openForm()" class="btn-search"><img src="public/fontend/images/search.svg" alt="" /></button></span>
				  
				</li>
			  </ul>
			  <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
			</div>
		</nav>
		<section class="section form-popup" id="myForm">
			<div class="container">
			 
			  <h3 class="search-keyfream">Search  <button type="button" class="btn-close-search" onclick="closeForm()"><i class="fas fa-times-circle"></i></button></h3>
			  <p class="secondary-font search-note">
				Hit enter to search or ESC to close
			  </p>
			  <form action="{{URL::to('/seach')}}" method="post">
				{{ csrf_field() }}
				<input type="search" name="search" autocomplete="off" class="pix-search-input" placeholder="Search ">
				<button type="submit" class="btn btn-info" style="display:none;"></button>
			  </form>
			</div>
		  </section>
		
	
	
	
	
	<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your Plugin chat code -->
      <div class="fb-customerchat"
        attribution="biz_inbox"
        page_id="100921678849822">
      </div>
	<!--end Messenger Plugin chat Code -->
	@yield('noidung')
		<footer id="footer" class="section footer">
			<div class="container">
			  <div class="footer-container">
				<div class="footer-center">
				  <h3>ĐẶT HÀNG SLL</h3>
				  <a href="#">Đặt đồng phục</a>
				  <a href="#">Đặt khẩu trang xuất khẩu</a>
				  <a href="#">Đặt đồ bảo hộ xuất khẩu</a>
				  <a href="#">Lịch sử đặt hàng</a>
				  <a href="#">Giỏ hàng</a>
				</div>
				<div class="footer-center">
				  <h3>CHÍNH SÁCH HỖ TRỢ</h3>
				  <a href="#">Chính sách đổi hàng & Vận chuyển</a>
				  <a href="#">Chính sách khách hàng thân thiết</a>
				  <a href="#">Chính sách bảo mật thông tin</a>
				  <a href="#">Hướng dẫn chọn kích cỡ</a>
				  <a href="#">Hướng dẫn thanh toán</a>
				</div>
				<div class="footer-center">
				  <h3>THƯƠNG HIỆU</h3>
				  <a href="#">Giới thiệu</a>
				  <a href="#">Blog</a>
				  <a href="#">Tuyển dụng</a>
				  <a href="#">Hệ thống cửa hàng</a>
				  <a href="#">Liên hệ</a>
				</div>
				<div class="footer-center">
				  <h3>CÔNG TY CP ĐẦU TƯ & THƯƠNG MẠI TNG</h3>
				  <div>
					<span>
					  <i class="fas fa-map-marker-alt"></i>
					</span>
					434/1 Đường Bắc Kạn, TP Thái Nguyên
				  </div>
				  <div>
					<span>
					  <i class="far fa-envelope"></i>
					</span>
					sale@tngfashion.vn
				  </div>
				  <div>
					<span>
					  <i class="fas fa-phone"></i>
					</span>
					02083 755 755
				  </div>
				  <div class="payment-methods">
					<img src="public/fontend/images/payment.png" alt="">
				  </div>
				</div>
			  </div>
			</div>
			</div>
		  </footer>
		  <!-- End Footer -->

		
		<script>
			let thumbnail=document.getElementsByClassName('thumbnailImg');
			let activeImages=document.getElementsByClassName('active');
			for(var i=0;i<thumbnail.length;i++){
				thumbnail[i].addEventListener('mouseover',function(){
				if(activeImages.length>0){
					activeImages[0].classList.remove('active');
				}
				this.classList.add('active');
				document.getElementById('featured').src=this.src
				});
			}
		</script>
		  <!-- Glidejs -->
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
		  <script src="public/fontend/js/showmore.js"></script>
		  <!-- Custom Scripts -->
		  <script src="public/fontend/js/products.js"></script>
		  <script src="public/fontend/js/jquery.nice-number.js"></script>
		  <script src="public/fontend/js/slider.js"></script>
		  <script src="public/fontend/js/index.js"></script>
		  <script>
			function openForm() {
			  document.getElementById("myForm").style.display = "block";
			}
			
			function closeForm() {
			  document.getElementById("myForm").style.display = "none";
			}
			</script>
		<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
		<!--  note-->
		<script type="text/javascript">
			$.validate({
				
			});
		</script>
		<script>
			$(function(){
	  
			  $('input[type="number"]').niceNumber();
	  
			  });
		</script>
</body>
</html>