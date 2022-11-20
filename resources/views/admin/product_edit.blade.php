@extends('layouts.admin')

@section('title','Product Edit')

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
                          <h4 class="mb-sm-0">Product Edit</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active"><a href="{{route('admin_products')}}">Product List</a></li>
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Product Edit</a></li>
                              </ol>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end page title -->

              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              <form action="{{route('admin_product_update', $products->id)}}" method="post">
                                  @csrf

                                  <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label">Parent</label>
                                      <div class="col-sm-10">
                                          <select class="form-select" name="category_id" aria-label="Default select example">
                                              @foreach($categories as $category)
                                                  <option value="{{$category->id}}" @if ($category->id == $products->id) selected="selected" @endif>{{$category->title}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="title" class="col-sm-2 col-form-label">Title</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="title" id="title" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="keywords" id="keywords" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="description" class="col-sm-2 col-form-label">Description</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="description" id="description" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="price" class="col-sm-2 col-form-label">Price</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="number" name="price" id="price" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="quantitiy" class="col-sm-2 col-form-label">Quantitiy</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="number" name="quantitiy" id="quantitiy" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="minquantity" class="col-sm-2 col-form-label">Minimum Quantitiy</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="number" name="minquantity" id="minquantity" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="tax" class="col-sm-2 col-form-label">Tax</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="number" name="tax" id="tax" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="detail" id="detail" value="{{$products->title}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label">Status</label>
                                      <div class="col-sm-10">
                                          <select class="form-select" name="status" aria-label="Default select example">
                                              <option value="True" @if ($products->status == 'True') selected="selected" @endif>True</option>
                                              <option value="False" @if ($products->status == 'False') selected="selected" @endif>False</option>
                                          </select>
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="example-file-input" class="col-sm-2 col-form-label">Image</label>
                                      <div class="col-sm-10">
                                          <input type="file" class="form-control form-control-color w-100" id="example-file-input">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="card-body">
                                          <div class="d-grid mb-3">
                                              <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Edit Product</button>
                                          </div>
                                      </div>
                              </form>

                          </div>
                  </div> <!-- end col -->
              </div>



          </div> <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

  </div>
  <!-- end main content-->

@endsection
