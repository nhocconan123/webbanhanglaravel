@extends('admin_layout')
@section('admin_container')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Brand Product
                </header>
                <div class="panel-body">
                    @foreach ($edit_Catogory as $item)

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category-product/'.$item->category_id)}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Product Name</label>
                            <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="brand Product Name" value="{{$item->category_name}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand description</label>
                            <textarea style="rezise:none" rows="5" name="category_desc"  class="form-control" id="exampleInputPassword1" placeholder="description">{{$item->category_desc}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info" name="updateBrandProduct">Update Brand Product</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
    
@endsection