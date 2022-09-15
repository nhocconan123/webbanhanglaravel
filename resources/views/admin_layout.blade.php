<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="{{asset('')}}">
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="public/backend/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="public/backend/css/style.css" rel='stylesheet' type='text/css' />
<link href="public/backend/css/style-responsive.css" rel="stylesheet"/>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<!-- font CSS -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<!-- font-awesome icons -->
<link rel="stylesheet" href="public/backend/css/font.css" type="text/css"/>
<link href="public/backend/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="public/backend/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="public/backend/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

<script src="public/backend/js/jquery.js"></script>
<script src="public/backend/js/image.js"></script>

{{-- lỗi ở đây --}}

{{-- <script src="public/backend/js/jquery2.0.3.min.js"></script>
<script src="public/backend/js/raphael-min.js"></script>
<script src="public/backend/js/morris.js"></script> --}}

{{-- lỗi ở đây --}}
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
			<?php
				echo'<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<img alt="" src="public/backend/images/2.png">
					<span class="username">';
						
							$name=Session::get('admin_name');
							if($name)
							{
								echo $name;
							}
						
				echo'</span>
					<b class="caret"></b>
				</a>';
			?>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Quản Lý Đơn Hàng</a></li>
						
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Mục Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">ADD Category Product</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">List Category Product</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương Hiệu Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">ADD Product Band</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">List Product Band</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>kích thước Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-size-product')}}">ADD Product Size</a></li>
						<li><a href="{{URL::to('/all-size-product')}}">List Product Size</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">ADD Product</a></li>
						<li><a href="{{URL::to('/all-product')}}">List Product</a></li>
                    </ul>
                </li>
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-user')}}">List User</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		
		@yield('admin_container')
		
    </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p> All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="public/backend/js/bootstrap.js"></script>
<script src="public/backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/backend/js/scripts.js"></script>
<script src="public/backend/js/jquery.slimscroll.js"></script>
<script src="public/backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="public/backend/js/jquery.scrollTo.js"></script>
<script src="public/backend/ckeditor/ckeditor.js"></script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
<!--  note-->
<script type="text/javascript">
 
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
         

   
   
</script>



<script type="text/javascript">
	$.validate({
		
	});
</script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	 CKEDITOR.replace('exampleInputPassword1');
	 CKEDITOR.replace('ckeditor1');
	 CKEDITOR.replace('ckeditor2');
	 CKEDITOR.replace('ckeditor3');
	 CKEDITOR.replace('id4');
</script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="public/backend/js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->

	<script>
		function changeImg(input){
			   //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
			   if(input.files){
				   var reader = new FileReader();
				   //Sự kiện file đã được load vào website
				   reader.onload = function(e){
					   //Thay đổi đường dẫn ảnh
					   $('#avatar').attr('src',e.target.result);
				   }
				   reader.readAsDataURL(input.files[0]);
			   }
		   }
		   $(document).ready(function() {
			   $('#avatar').click(function(){
				   $('#img').click();
			   });
		   });
   
	   </script>
	<script>
		function changeImgProduct(input){
			   //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
			   if(input.files){
				   var reader = new FileReader();
				   //Sự kiện file đã được load vào website
				   reader.onload = function(e){
					   //Thay đổi đường dẫn ảnh
					   $('#imgProduct').attr('src',e.target.result);
				   }
				   reader.readAsDataURL(input.files[0]);
			   }
		   }
		   $(document).ready(function() {
			   $('#imgProduct').click(function(){
				   $('#imgProductto').click();
			   });
		   });
   
	   </script>
	   <script>

		setTimeout(function(){ window.location.reload(); }, 300000);
	  
	  </script>
	  <script>
		$(document).ready(function(){
		 var count = 1;
		 $('#add').click(function(){
		  count = count + 1;
		  var html_code = "<tr id='row"+count+"'>";
		   html_code += "<td contenteditable='true' class='item_name'><input type='text' name='color[]'' class='form-control' placeholder='nhập màu sắc'></td>";
		   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
		   html_code += "</tr>";  
		   $('#crud_table').append(html_code);
		 });
		 
		 $(document).on('click', '.remove', function(){
		  var delete_row = $(this).data("row");
		  alert(delete_row);
		  $('#' + delete_row).remove();
		 });
		 
		 
		  $.ajax({
		   url:"insert.php",
		   method:"POST",
		   data:{item_name:item_name, item_code:item_code, item_desc:item_desc, item_price:item_price},
		   success:function(data){
			alert(data);
			$("td[contentEditable='true']").text("");
			for(var i=2; i<= count; i++)
			{
			 $('tr#'+i+'').remove();
			}
			fetch_item_data();
		   }
		  });
		 });
		 
		//  function fetch_item_data()
		//  {
		//   $.ajax({
		//    url:"fetch.php",
		//    method:"POST",
		//    success:function(data)
		//    {
		//     $('#inserted_item_data').html(data);
		//    }
		//   })
		//  }
		//  fetch_item_data();
		 
		
		</script>


<script>
	$(document).ready(function(){
	 var count = 1;
	 $('#addsize').click(function(){
	  count = count + 1;
	  var html_code = "<tr id='row"+count+"'>";
	   html_code += "<td contenteditable='true' class='item_name'><input type='text' name='show_size[]'' class='form-control' placeholder='nhập kích thước sản phẩm'></td>";
	   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
	   html_code += "</tr>";  
	   $('#crud_size').append(html_code);
	 });
	 
	 $(document).on('click', '.remove', function(){
	  var delete_row = $(this).data("row");
	  alert(delete_row);
	  $('#' + delete_row).remove();
	 });
	 
	 
	  $.ajax({
	   url:"insert.php",
	   method:"POST",
	   data:{item_name:item_name, item_code:item_code, item_desc:item_desc, item_price:item_price},
	   success:function(data){
		alert(data);
		$("td[contentEditable='true']").text("");
		for(var i=2; i<= count; i++)
		{
		 $('tr#'+i+'').remove();
		}
		fetch_item_data();
	   }
	  });
	 });
	 
	 
	
	</script>
</body>
</html>
