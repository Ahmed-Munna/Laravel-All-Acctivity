@extends('Admin.layouts.template')
@section('page-title')
All Category - Essence
@endsection
@section('content')
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Category</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Category</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Sub-Category Count</th>
                        <th>Product Count</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($categoryes as $key=>$value)
                      <tr>
                        <td>{{ ++$key }}</td>
                        
                        <td><span class="badge bg-label-primary me-1">{{ $value->category_name }}</span></td>
                        <td>{{ $value->subcategory_count }}</td>
                        <td>{{ $value->product_count }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('edit-category', $value->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="{{ route('delete-category', $value->id) }}"
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