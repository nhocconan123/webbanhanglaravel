@extends('admin_layout')
@section('admin_container')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ADD Brand Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        tesjhd
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Product Name</label>
                            <input type="text" name="brand_product_name" class="form-control"  onkeyup="ChangeToSlug();" id="slug" placeholder="category Product Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">brand slug Product Name</label>
                            <input type="text" name="brand_slug" class="form-control"  id="convert_slug" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand description</label>
                            <textarea style="rezise:none" rows="5" name="brand_desc"  class="form-control" id="exampleInputPassword1" placeholder="description" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình Anh</label>
                            {{-- <input id="img" type="file" name="brand_logo" class='form-control hidden'
                                onchange="changeImgProduct(this)"> --}}
                            <input id="img" type='file' name='brand_logo' class='form-control hidden' onchange='changeImg(this)'>
                            <img id='avatar' class='thumbnail' width='100%' height='350px' src="public/backend/images/img.png">
                        </div>
                        <div class="form-group">
                            <label for="">display</label>
                            <select name="brand_status" id="" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển Thị</option>
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="addBrandProduct">ADD Category Product</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
    
@endsection