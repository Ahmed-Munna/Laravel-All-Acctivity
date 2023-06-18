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
                <h3 class="card-title">SMTP Mail Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('smtp.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="mailer">Mail Mailer</label>
                    <input type="text" class="form-control" value="{{$data->mailer}}" name="mailer" id="mailer">
                  </div>
                  <div class="form-group">
                    <label for="host">Mail Host</label>
                    <input type="text" class="form-control" value="{{$data->host}}" name="host" id="host">
                  </div>
                  <div class="form-group">
                    <label for="port">Mail Port</label>
                    <input type="text" class="form-control" value="{{$data->port}}" name="port" id="port">
                  </div>
                  <div class="form-group">
                    <label for="username">Mail User Name</label>
                    <input type="text" class="form-control" value="{{$data->user_name}}" name="username" id="username">
                  </div>
                  <div class="form-group">
                    <label for="password">Mail Password</label>
                    <input type="text" class="form-control" name="password" id="password" value="{{$data->password}}"> 
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