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
            <button type="button" id="createCategory" class="btn btn-primary" data-toggle="modal" data-target="#addChildCategory">Add+</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="addChildCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Child Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('childcategory.create')}}" method="POST">
          @csrf
          <div class="form-group">
            <select class="custom-select" id="inputGroupSelect01" name="subcategoryId">
                <option selected>Select category/subcategory</option>
                @foreach($category as $ctg)
                <option value="{{$ctg->id}}" disabled>{{$ctg->category_name}}</option>
                    @foreach($subcategory as $sctg)
                    @if($ctg->id == $sctg->category_id)
                      <option value="{{$sctg->id}}"> --{{$sctg->subcategory_name}}</option>    
                    @endif            
                    @endforeach         
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="childCategoryName" name="childCategory">
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
<div class="modal fade" id="editChildCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form id="fromsRoute" action="{{route('childcategory.update')}}" method="POST">
          @csrf
          <input type="hidden" id="childCategoryId" value="" name="editchildCategoryId">
          <div class="form-group">
            <input type="text" class="form-control" value="" id="editchildCategory" name="editchildCategory">
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
                <h3 class="card-title">Here Child Categorys</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Child Category</th>
                    <th>Slug</th>
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