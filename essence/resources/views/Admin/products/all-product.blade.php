@extends('Admin.layouts.template')
@section('page-title')
All Product - Essence
@endsection
@section('content')
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Product</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Available All Product Information</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                  @if (session()->has('massege'))
                    <div class="alert alert-success">
                        <span>
                            {{ session()->get('massege');}}
                        </span>
                    </div>
                  @endif
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>IMG</th>
                        <th>Price</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($products as $key=>$value)
                      <tr>
                        <td>{{ ++$key }}</td>
                        
                        <td><span class="badge bg-label-primary me-1">{{ $value->prouct_name }}</span></td>
                        <td><img src="{{asset($value->product_img)}}" hight="100" width="100" alt=""></td>
                        <td>{{ $value->price }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('edit-product',$value->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="{{route('delete-product',$value->id)}}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
              <!--/ Basic Bootstrap Table -->
@endsection