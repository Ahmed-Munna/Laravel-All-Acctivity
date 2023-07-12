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
            <div class="col">
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
                        <div class="col-md-8">
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
                                  <label for="product_name">Tags</label>
                                  <input type="text" class="form-control" value="" name="product_name" id="tags" data-role="tagsinput">
                                </div>

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="product_price">Product price</label>
                                <input type="text" class="form-control" value="{{0}}" name="product_price" id="product_price">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="product_price">Selling Price</label>
                                <input type="text" class="form-control" value="{{0}}" name="product_price" id="product_price">
                              </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_discount">Product Discount</label>
                                <input type="text" class="form-control" value="{{0}}" name="product_discount" id="product_discount">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="warehouse">Warehouse</label>
                                <select type="text" class="form-control" name="warehouse" id="warehouse">
                                    <option>Select Brand</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="product_stock">Stock</label>
                                <input type="text" class="form-control" value="{{0}}" name="product_stock" id="product_stock">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="product_colour">Colour</label>
                                  <input type="text" class="form-control" value="" name="product_colour" id="colour" data-role="tagsinput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="product_size">Size</label>
                                  <input type="text" class="form-control" value="" name="product_size" id="size" data-role="tagsinput">
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                              <label>Product Details</label>
                              <textarea class="form-control product_details" rows="3"></textarea>
                            </div>
                            </div>
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


<!-- jQuery -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"></script>
<script> -->
<!-- $('#product_details').trumbowyg({
    btns: [['strong', 'em',], ['insertImage']],
    autogrow: true
});
</script> -->
@endsection
