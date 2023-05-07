@extends('Admin.layouts.template')
@section('page-title')
Update Category - Essence
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Update Category</h4>
        <!-- Basic Layout -->
        <div class="row">
        <div class="col-8">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Category</h5>
            </div>
            <div class="card-body">
                <form action=" {{ route('update-category') }} " method="POST">
                @csrf
                <input type="hidden" name="ctgid" value="{{ $data->id }}">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Update Category Name</label>
                    <input type="text" class="form-control" value="{{ $data->category_name }}" id="basic-default-fullname" name="CategoryName"/>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <span>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </span>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Update Cetegory</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection