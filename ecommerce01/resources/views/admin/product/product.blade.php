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


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
            <div class="card">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.create')}}" method="POST" enctype="multipart/form-cat">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                          <label for="product_name">Product Name</label>
                          <input type="text" class="form-control" value="{{0}}" name="product_name" id="product_name">
                        </div>

                        <div class="form-group">
                          <label for="product_category">Product Category</label>
                          <select type="text" class="form-control" name="product_category" id="product_category">
                              <option>Select Category</option>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="brand">Brand</label>
                          <select type="text" class="form-control" name="brand" id="brand">
                              <option>Select Brand</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="unit">Unit</label>
                          <select type="text" class="form-control" name="unit" id="unit">
                              <option>Select Unit</option>
                          </select>
                        </div>

                       
                    </div>
                    <div class="col-6">

                        <div class="form-group">
                          <label for="product_code">Product Code</label>
                          <input type="text" class="form-control" value="{{0}}" name="product_code" id="product_code">
                        </div>

                        <div class="form-group">
                          <label for="product_childCategory">ChildCategory</label>
                          <select type="text" class="form-control" name="childCategory" id="product_childCategory">
                              <option>ChildCategory</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="picup_point">Picup Point</label>
                          <select type="text" class="form-control" name="childCategory" id="picup_point">
                              <option>Picup Point</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="product_name">Product Name</label>
                          <input type="text" class="form-control" value="{{0}}" name="product_name" id="product_name" data-role="tagsinput">
                        </div>

                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
            </div>
          </div>
        </div>
    </section>
</div>
<!-- Modal -->

@endsection