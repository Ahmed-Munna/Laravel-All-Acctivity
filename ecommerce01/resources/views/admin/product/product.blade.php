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


        <div class="card">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Website Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="metaTitle">Currency</label>
                    <select class="custom-select" id="Currency" name="currency">
                        <option> Select </option>
                        <option value="$" {{ ($data->currency == '$') ? 'selected' : '' }}>USD</option>
                        <option value="৳" {{ ($data->currency == '৳') ? 'selected' : '' }}>BTD</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="phone_one">Phone Number</label>
                    <input type="text" class="form-control" value="{{$data->phone_one}}" name="phone_one" id="phone_one">
                  </div>
                  <div class="form-group">
                    <label for="phone_two">Another Phone Number</label>
                    <input type="text" class="form-control" value="{{$data->phone_two}}" name="phone_two" id="phone_two">
                  </div>
                  <div class="form-group">
                    <label for="main_email">Main Email</label>
                    <input type="email" class="form-control" value="{{$data->main_email}}" name="main_email" id="main_email">
                  </div>
                  <div class="form-group">
                    <label for="support_email">Support Email</label>
                    <input type="email" class="form-control" value="{{$data->support_email}}" name="support_email" id="support_email">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{$data->address}}">
                  </div>
                  <div class="form-group">
                    <label for="logo">Logo</label><br>
                    <input type="file" name="logo" id="logo">
                    <input type="hidden" value="{{$data->logo}}" name="oldlogo">
                  </div>
                  <div class="form-group">
                    <label for="address">Favicon</label><br>
                    <input type="file" class="" name="favicon" id="favicon">
                    <input type="hidden" class="form-control" value="{{$data->favicon}}" name="oldfavicon">
                  </div>
                  <div class="form-group">
                    <label for="twitter_link">Twitter Link</label>
                    <input type="text" class="form-control" name="twitter_link" id="twitter_link" value="{{$data->twitter_link}}">
                  </div>
                  <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{$data->linkedin}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->

@endsection