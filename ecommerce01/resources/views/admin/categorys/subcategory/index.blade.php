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
            <button type="button" id="createCategory" class="btn btn-primary" data-toggle="modal" data-target="#addSubCategory">Add+</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="addSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('subcategory.create')}}" method="POST">
          @csrf
          <div class="form-group">
            <select class="custom-select" id="inputGroupSelect01" name="categoryId">
                <option selected>Select category</option>
                @foreach ($category as $value)  
                <option value="{{$value->id}}">{{$value->category_name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="SubCategoryName" name="subCategory">
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
<div class="modal fade" id="editSubCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('subcategory.update')}}" method="POST">
          @csrf
          <input type="hidden" id="subCategoryId" value="" name="editSubCategoryId">
          <div class="form-group">
            <input type="text" class="form-control" value="" id="editsubCategory" name="editsubCategory">
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
                <h3 class="card-title">Here all Sub-Categorys</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Slug</th>
                    <th>Acton</th>
                  </tr>
                  </thead>
                  <tbody>
                
                @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->category_name}}</td>
                    <td>{{$value->subcategory_name}}</td>
                    <td>{{$value->subcategory_slug}}</td>
                    <td>
                        <a href="{{route('subcategory.delete', $value->id)}}" class="btn btn-danger">Delete</a>
                        <a data-url="{{route('subcategory.updateView', $value->id)}}" class="btn btn-primary" id="updateCategory" data-toggle="modal" data-target="#editSubCategory">Update</a>
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