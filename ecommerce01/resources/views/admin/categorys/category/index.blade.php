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
            <button type="button" id="createCategory" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add+</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromRoute">
          @csrf
            <input type="hidden" name="id" id="categoryId">
          <div class="form-group">
            <input type="text" class="form-control" id="categoryName" name="category">
          </div>
          <div class="modal-footer">
            <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary save">Save</a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Here all Categorys</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Acton</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->category_name}}</td>
                    <td>{{$value->category_slug}}</td>
                    <td>
                        <a href="{{route('category.delete', $value->id)}}" class="btn btn-danger">Delete</a>
                        <a id="updateCategory" data-url="{{route('category.updateView', $value->id)}}" class="btn btn-primary" id="updateCategory" data-toggle="modal" data-target="#addCategory">Update</a>
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