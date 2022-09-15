@extends('admin_layout')
@section('admin_container')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        ALL User
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>User name</th>
              <th>User Email</th>
              <th>Phone number</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_user as $cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>
                  {{$cate_pro->customer_name}}
                </td>
              <td>
                  {{$cate_pro->customer_email}}
                </td>
              <td>
                  {{$cate_pro->customer_phone}}
                </td>
              <td>
                {{-- <a href="" class="active" ui-toggle-class="">
                  <i class="fas fa-wrench"></i>
                </a> --}}
                <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{URL::to('/detete-user/'.$cate_pro->customer_id)}}" class="active" ui-toggle-class="">
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
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection