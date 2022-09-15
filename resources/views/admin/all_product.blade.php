@extends('admin_layout')
@section('admin_container')
<div class="table-agile-info">
  
    <div class="panel panel-default">
      <div class="panel-heading">
        ALL Product
      </div>
      <?php
        $message = Session::get('message');
        if($message)
        {
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
        }?>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
           $message = Session::get('message');
            if($message){
              echo '<span class="text-alert">'.$message.'</span>';
               Session::put('message',null);
              }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Name Product</th>
              <th>IMAGE</th>
              <th>display</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($details_product as $cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$cate_pro->product_name}}</td>
              <td>
                @foreach ($cate_pro->img as $pr_img)
                <a href="{{URL::to('/edit-image-product/'.$pr_img->image_id)}}"><img src="public/uploads/product/{{$pr_img->product_image}}" style="width: 100px;height: 100px;" alt=""></a>
                @endforeach
              </td>
              <td class="text-ellipsis">
                <span class="text-ellipsis">
                  <?php 
                    if($cate_pro->product_status==0)
                    {
                  ?>
                      <a href="{{URL::to('/unactive-product/'.$cate_pro->product_id)}}">
                        <i class="fas fa-eye-slash"></i>
                      </a>
                  <?php  } 
                    else{
                  ?>
                      <a href="{{URL::to('/active-product/'.$cate_pro->product_id)}}">
                        <i class="fas fa-eye"></i>
                  <?php  } ?>
                  
                </span>
              </td>
              <td>
                <a href="{{URL::to('/edit-product/'.$cate_pro->product_id)}}" class="active" ui-toggle-class="">
                  <i class="fas fa-wrench"></i>
                </a>
                <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{URL::to('/detete-product/'.$cate_pro->product_id)}}" class="active" ui-toggle-class="">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">Tổng số trang {{$details_product->lastPage()}}</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
                <li>{{$details_product->links()}}</li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection