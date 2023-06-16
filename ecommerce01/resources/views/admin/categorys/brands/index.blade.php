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
            <button type="button" id="create" class="btn btn-primary" data-toggle="modal" data-target="#addbrand">Add+</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="addbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add brand </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('brand.create')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="file" name="brandLogo" id="brandLogo">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="brandName" name="brand">
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
<div class="modal fade" id="editbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Brand </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('brand.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="brandId" data-url="" value="" name="brandId">
          <div class="form-group">
            <input type="file" name="editbrandLogo" id="editbrandLogo">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" value="" id="editbrand" name="editbrand">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Here brand</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped brandtable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Brand Name</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Acton</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
        </section>
</div>
<!-- Modal -->

@endsection