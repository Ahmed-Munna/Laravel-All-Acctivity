@extends('Admin.layouts.template')
@section('page-title')
All Sub-Category - Essence
@endsection
@section('content')
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Sub-Category</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Sub-Category</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product Count</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($subCategorys as $key=>$value)
                      <tr>
                        <td>{{ ++$key }}</td>
                        
                        <td><span class="badge bg-label-primary me-1">

                          @foreach($categorys as $cat=>$catvalu)
                            @if($catvalu->id == $value->category_id)
                                {{$catvalu->category_name}}
                            @endif
                          @endforeach

                        </span></td>
                        <td>{{ $value->subcategory_name }}</td>
                        <td>{{ $value->product_count }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('edit-sub-category',$value->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="{{ route('delete-sub-category', $value->id) }}"
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