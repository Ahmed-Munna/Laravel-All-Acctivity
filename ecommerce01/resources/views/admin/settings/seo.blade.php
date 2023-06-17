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
                <h3 class="card-title">On-page Seo Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('seo.update')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="metaTitle">Meta Title</label>
                    <input type="text" class="form-control" value="{{$data->meta_author}}" name="title" id="metaTitle">
                  </div>
                  <div class="form-group">
                    <label for="metaAuthor">Meta Author</label>
                    <input type="text" class="form-control" value="{{$data->meta_tag}}" name="metaAuthor" id="metaAuthor">
                  </div>
                  <div class="form-group">
                    <label for="metaTag">Meta Tag</label>
                    <input type="text" class="form-control" value="{{$data->meta_tag}}" name="tag" id="metaTag">
                  </div>
                  <div class="form-group">
                    <label for="metaKeyword">Meta Keyword</label>
                    <input type="text" class="form-control" value="{{$data->meta_keyword}}" name="keyword" id="metaKeyword">
                  </div>
                  <div class="form-group">
                    <label for="metaDiscription">Meta Discription</label>
                    <textarea class="form-control" name="discription" id="metaDiscription" > {{$data->meta_discription}}</textarea>
                  </div>

                  <br><strong class="text-center" style="font-size:20px"> __More option__  </strong> <br><br>

                  <div class="form-group">
                    <label for="gverification">Google Varification</label>
                    <input type="text" class="form-control" name="gverification" id="gverification" value="{{$data->google_varification}}">
                  </div>
                  <div class="form-group">
                    <label for="ganalytics">Google Analytics</label>
                    <input type="text" class="form-control" name="ganalytics" id="ganalytics" value="{{$data->google_analytics}}">
                  </div>
                  <div class="form-group">
                    <label for="gadsence">Google Adsence</label>
                    <input type="text" class="form-control" name="gadsence" id="gadsence" value="{{$data->google_adsence}}">
                  </div>

                  <div class="form-group">
                    <label for="avarification">Alaxa varification</label>
                    <input type="text" class="form-control" name="avarification" id="avarification" value="{{$data->alexa_vatification}}">
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