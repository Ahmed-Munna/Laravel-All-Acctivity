@extends('layouts.admin')
@section('admin_content')
<div class="content-wrapper">
    <section class="content-header">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" id="createCoupon" class="btn btn-primary" data-toggle="modal" data-target="#addCoupon">Add+</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="addCoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('coupon.create')}}" method="POST">
          @csrf
          
          <div class="form-group">
            <label for="couponCode">Coupon Code</label>
            <input type="text" class="form-control" id="couponCode" name="coupon_code">
          </div>
          <div class="form-group">
            <label for="couponAmount">Coupon Amoutn</label>
            <input type="text" class="form-control" id="couponAmount" name="coupon_amount">
          </div>
          <div class="form-group">
            <label for="validDate">Valid Date</label>
            <input type="date" class="form-control" id="validDate" name="valid_date">
          </div>
          <div class="form-group">
            <label for="couponType">Coupon Type</label>
            <select class="custom-select" id="couponType" name="coupon_type">
                <option value="1">Fixed</option>
                <option value="2">Parcentage</option>
            </select>
          </div>
          <div class="form-group">
            <label for="couponType">Coupon Status</label>
            <select class="custom-select" id="couponStatus" name="coupon_status">
                <option value="0">Active</option>
                <option value="1">Pause</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary save">Save</a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateCoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('coupon.update')}}" method="POST">
          @csrf
          
          <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="couponCode">Coupon Code</label>
            <input type="text" class="form-control" id="updateCouponCode" name="coupon_code">
          </div>
          <div class="form-group">
            <label for="couponAmount">Coupon Amoutn</label>
            <input type="text" class="form-control" id="updateCouponAmount" name="coupon_amount">
          </div>
          <div class="form-group">
            <label for="validDate">Valid Date</label>
            <input type="hidden" name="oldDate" id="oldDate">
            <input type="date" class="form-control" id="updatevalidDate" name="valid_date">
          </div>
          <div class="form-group">
            <label for="couponType">Coupon Type</label>
            <select class="custom-select" id="updateCouponType" name="coupon_type">
                <option value="1" id="ctOne">Fixed</option>
                <option value="2" id="ctTwo">Parcentage</option>
            </select>
          </div>
          <div class="form-group">
            <label for="couponType">Coupon Status</label>
            <select class="custom-select" id="updateCouponStatus" name="coupon_status">
                <option value="0" id="Active">Active</option>
                <option value="1" id="Pause">Pause</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary save">Update</a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Here Coupon List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped cuponTable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Coupon Code</th>
                    <th>Coupon Amount</th>
                    <th>Coupon Date</th>
                    <th>Coupon Type</th>
                    <th>Coupon Status</th>
                    <th>Acton</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->coupon_code}}</td>
                    <td>{{$value->coupon_amount}}</td>
                    <td>{{$value->valid_date}}</td>
                    <td>

                      @if($value->coupon_type == 1) 
                      <small class="py-1 px-4 rounded bg-primary text-white">Fixed</small>
                      @else
                      <small class="py-1 px-4 rounded bg-secondary text-white">Parcentage</small>
                      @endif
                    </td>
                    <td>
                      @if($value->status == 0) 
                      <small class="py-1 px-4 rounded bg-success text-white">Active</small>
                      @else
                      <small class="py-1 px-4 rounded bg-warning">Pause</small>
                      @endif
                    </td>
                    <td>
                        <a href="{{route('coupon.delete', $value->id)}}" class="btn btn-danger">Delete</a>
                        <a id="updateCouponBtn" data-url="{{route('coupon.updateView', $value->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#updateCoupon">Update</a>
                    </td>
                  </tr>
                @endforeach
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
        </section>
</div>
<!-- Modal -->

@endsection