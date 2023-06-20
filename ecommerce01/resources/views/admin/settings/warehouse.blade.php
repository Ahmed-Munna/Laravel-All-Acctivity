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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


        <div class="card">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Warehouse Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('warehouse.update')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Warehouse Name</label>
                    <input type="text" class="form-control" value="{{$data->warehouse_name}}" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="address">Warehouse Address</label>
                    <input type="text" class="form-control" value="{{$data->warehouse_address}}" name="address" id="address">
                  </div>
                  <div class="form-group">
                    <label for="Phone">Warehouse Phone</label>
                    <input type="text" class="form-control" value="{{$data->warehouse_phone}}" name="phone" id="Phone">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->

@endsection