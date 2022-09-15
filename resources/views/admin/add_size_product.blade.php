@extends('admin_layout')
@section('admin_container')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ADD Size Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-size-product')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Size Product</label>
                            <input type="text" name="size_product_name" class="form-control" id="exampleInputEmail1" placeholder="category Product Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">size description</label>
                            <textarea style="rezise:none" rows="5" name="size_product_description"  class="form-control" id="exampleInputPassword1" placeholder="description" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-info" name="addSizeProduct">ADD size Product</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
    
@endsection