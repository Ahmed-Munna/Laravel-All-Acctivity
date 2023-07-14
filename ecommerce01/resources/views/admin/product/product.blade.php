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
                                <label for="product_category">Product Category/Subcategory</label>
                                <select type="text" class="form-control" name="product_category" id="category">
                                    <option></option>
                                    @foreach ($cat as $value)
                                      <option disabled class="text-warning">{{$value->category_name}}</option>
                                      @foreach ($subCat as $subVal)
                                        @if($value->id == $subVal->category_id)
                                          <option value="{{$subVal->id}}">{{$subVal->subcategory_name}}</option>
                                        @endif
                                      @endforeach
                                    @endforeach
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="brand">Brand</label>
                                <select type="text" class="form-control" name="brand" id="brand">
                                    <option>Select Brand</option>

                                    @foreach ($brand as $value)
                                      <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                    @endforeach
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
                                      @foreach ($picup as $value)
                                      <option value="{{$value->id}}">{{$value->picup_point_name}}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="product_price">Product price</label>
                                  <input type="text" class="form-control" name="product_price" id="product_price">
                                </div>

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="product_price">Selling Price</label>
                                <input type="text" class="form-control" name="product_price" id="product_price">
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_discount">Product Discount</label>
                                <input type="text" class="form-control" value="{{0}}" name="product_discount" id="product_discount">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="product_name">Tags</label>
                                  <input type="text" class="form-control" value="" name="product_name" id="tags" data-role="tagsinput">
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
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="customFile">Main Thumbnail</label>

                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                        
                          <div class="form-group">
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1">
                              <label class="custom-control-label" for="customSwitch1">Featured Product</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch2">
                              <label class="custom-control-label" for="customSwitch2">Today Deal</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch3">
                              <label class="custom-control-label" for="customSwitch3">Status</label>
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


<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $("#category").change(function() {
      $let subcat = $(this).children("option:selected").val();
      console.log(subcat);
    });
    console.log('lsadk')
  })
</script>
@endsection
