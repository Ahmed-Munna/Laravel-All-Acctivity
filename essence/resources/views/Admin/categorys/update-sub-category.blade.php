@extends('Admin.layouts.template')
@section('page-title')
Update Sub-Category - Essence
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Sub-Category</h4>
        <!-- Basic Layout -->
        <div class="row">
        <div class="col-8">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Sub-Category</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('update-sub-category') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Sub-Category Name</label>
                    <input type="text" class="form-control" id="basic-default-fullname" placeholder="@example" value="{{ $data->subcategory_name }}" name="SubCategoryName" />
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
                <button type="submit" class="btn btn-primary">Add sub-category</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection