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
            <button type="button" id="createPicup" class="btn btn-primary" data-toggle="modal" data-target="#addPicup">Add+</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="addPicup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Picup Point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('picup.point.create')}}" method="POST">
          @csrf
          
          <div class="form-group">
            <label for="picupPointName">Picup Point Name</label>
            <input type="text" class="form-control"  name="picup_point_name">
          </div>
          <div class="form-group">
            <label for="picupPointAddress">Picup Address</label>
            <input type="text" class="form-control"  name="picup_point_address">
          </div>
          <div class="form-group">
            <label for="picupPointPhone">Picup Phone</label>
            <input type="text" class="form-control" name="picup_point_phone">
          </div>
          <div class="form-group">
            <label for="picupPointaPhone">Picup Phone Two</label>
            <input type="text" class="form-control" name="picup_point_aphone">
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
<div class="modal fade" id="updatePicup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Picup Point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('picup.point.update')}}" method="POST">
          @csrf
          
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="picupPointName">Picup Point Name</label>
            <input type="text" class="form-control" id="picupPointName" name="picup_point_name">
          </div>
          <div class="form-group">
            <label for="picupPointAddress">Picup Address</label>
            <input type="text" class="form-control" id="picupPointAddress" name="picup_point_address">
          </div>
          <div class="form-group">
            <label for="picupPointPhone">Picup Phone</label>
            <input type="text" class="form-control" id="picupPointPhone" name="picup_point_phone">
          </div>
          <div class="form-group">
            <label for="picupPointaPhone">Picup Phone Two</label>
            <input type="text" class="form-control" id="picupPointaPhone" name="picup_point_aphone">
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
                <h3 class="card-title">Here Picup Point List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped" id="picupTable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Picup Point Name</th>
                    <th>Picup Point Address</th>
                    <th>Picup Phone</th>
                    <th>Picup Another Phone</th>
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