@extends('admin_layout')
@section('admin_container')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ADD Category Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-category-product')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Product Name</label>
                            <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="category Product Name" data-validation-length="min3" data-validation-error-msg="Làm ơn nhập vào tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="slug_category_product" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_product_keywords" id="exampleInputPassword" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label>logo danh mục sản phẩm</label>
                            <input id="img" type='file' name='category_image' class='form-control hidden' onchange='changeImg(this)'>
                            <img id='avatar' class='thumbnail' width='100%' height='350px' src="public/backend/images/img.png">
                        </div>
                        <div class="form-group">
                            <label for="">display</label>
                            <select name="category_status" id="" class="form-control input-sm m-bot15">
                                <option value="0">hidden</option>
                                <option value="1">display</option>
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="addCategoryProduct">ADD Category Product</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>

@endsection
