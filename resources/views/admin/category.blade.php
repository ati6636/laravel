@extends('layouts.admin')

@section('title','Category')

@section('content')

  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">

      <div class="page-content">
          <div class="container-fluid">

              <!-- start page title -->
              <div class="row">
                  <div class="col-12">
                      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                          <h4 class="mb-sm-0">Category List</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                  <li class="breadcrumb-item active">Starter page</li>
                              </ol>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end page title -->

              <div class="row">
                  <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Category List</h4>

                              <div class="table-responsive">
                                  <table class="table table-editable table-nowrap align-middle table-edits">

                                      <thead>
                                          <tr>
                                              <th>Image</th>
                                              <th>Title</th>
                                              <th>Keywords</th>
                                              <th>Description</th>
                                              <th>Status</th>
                                              <th>Created_At</th>
                                              <th>Edit</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($categories as $category)
                                          <tr>
                                              <th data-field="">{{$category->image}}</th>
                                              <td data-field="title">{{$category->title}}</td>
                                              <td data-field="keywords">{{$category->keywords}}</td>
                                              <td data-field="description">{{$category->description}}</td>
                                              <td data-field="status">{{$category->status}}</td>
                                              <td data-field="created_at">{{$category->created_at}}</td>
                                              <td style="width: 100px">
                                                  <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                      <i class="fas fa-pencil-alt"></i>
                                                  </a>
                                              </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <!-- end row -->

          </div> <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

  </div>
  <!-- end main content-->

@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{asset('back/')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('back/')}}/assets/libs/datatables.net-autoFill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('back/')}}/assets/libs/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
  <!-- Table Editable plugin -->
  <script src="{{asset('back/')}}/assets/libs/table-edits/build/table-edits.min.js"></script>

  <script src="{{asset('back/')}}/assets/js/pages/table-editable.init.js"></script>
@endsection
