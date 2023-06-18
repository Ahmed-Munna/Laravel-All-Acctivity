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
            <button type="button" id="createCategory" class="btn btn-primary" data-toggle="modal" data-target="#create_page">Create page</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="create_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('page.create')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="inputGroupSelect01">Page Position</label>
            <select class="custom-select" id="inputGroupSelect01" name="page_position">
                <option> Position </option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
          </div>
          <div class="form-group">
            <label for="page_name">Page Name</label>
            <input type="text" class="form-control" id="page_name" name="page_name">
          </div>
          <div class="form-group">
            <label for="page_title">Page Title</label>
            <input type="text" class="form-control" id="page_title" name="page_title">
          </div>
          <div class="form-group">
            <label for="page_discription">Page Discription</label>
            <textarea type="text" class="form-control" id="page_discription" name="page_discription">

            </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary Create">Create</a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="update_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('page.update')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="inputGroupSelect01">Page Position</label>
            <select class="custom-select" id="update_page_position" name="update_page_position">
                <option> Position </option>
                <option id="one" value="1">One</option>
                <option id="two" value="2">Two</option>
                <option id="three" value="3">Three</option>
            </select>
          </div>
          <div class="form-group">
            <label for="page_name">Page Name</label>
            <input type="text" class="form-control" id="update_page_name" name="update_page_name" value="">
          </div>
          <div class="form-group">
            <label for="page_title">Page Title</label>
            <input type="text" class="form-control" id="update_page_title" name="update_page_title">
          </div>
          <div class="form-group">
            <label for="page_title">Page Discription</label>
            <textarea type="text" class="form-control" id="update_page_discription" name="update_page_discription">

            </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary update_page">Update</a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Here All Pages</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped allpagetable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Page Name</th>
                    <th>Page Title</th>
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