@extends('Admin.layouts.template')
@section('page-title')
Update Product - Essence
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Update Product</h4>
        <!-- Basic Layout -->
        <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Update Product</h5>
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <span>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </span>
                    </div>
                @endif
                      <form action="{{ route('update-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="productID" value="{{$data->id}}">
                        <input type="hidden" name="oldImg" value="{{$data->product_img}}">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="ProductName" value="{{$data->prouct_name}}"/>
                          </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                            <input class="form-control" type="number" id="html5-number-input" name="ProductPrice" value="{{$data->price}}" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Product Quantity</label>
                            <div class="col-md-10">
                            <input class="form-control" type="number" name="ProductQuantity" id="html5-number-input" value="{{$data->quantity}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Product Short Discription</label>
                          <div class="col-sm-10">
                            <textarea
                              id="basic-default-message"
                              class="form-control"
                              placeholder="Short Description for your product"
                              name="ShortDiscription"
                            >{{$data->product_short_dis}}</textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Product Long Discription</label>
                            <div class="col-sm-10">
                                <textarea
                                id="basic-default-message"
                                class="form-control"
                                placeholder="Write about you product"
                                name="LongDiscription"
                                rows="8"
                                >{{$data->product_long_dis}}</textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Product IMG</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="file" name="ProductImg" id="formFile" />
                            </div>
                          </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
    </div>
@endsection