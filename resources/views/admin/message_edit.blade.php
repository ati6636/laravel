@extends('layouts.admin')

@section('title','Message Edit')

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
                          <h4 class="mb-sm-0">Message Edit</h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active"><a href="{{route('admin_message')}}">Message List</a></li>
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Message Edit</a></li>
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
                              <form action="{{route('admin_message_update' $messages->id}}" method="post">
                                  @csrf

                                  <div class="row mb-3">
                                      <label for="id" class="col-sm-2 col-form-label">ID</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="number" name="id" id="id" value="{{$messages->id}}">
                                      </div>
                                  </div>
                                  <!-- end row -->
                                  <div class="row mb-3">
                                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="name" id="name" value="{{$messages->name}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="email" name="email" id="email" value="{{$messages->email}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="number" name="phone" id="phone" value="{{$messages->phone}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="subject" id="subject" value="{{$messages->subject}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="message" class="col-sm-2 col-form-label">Message</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="text" name="message" id="message" value="{{$messages->message}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label for="note" class="col-sm-2 col-form-label">Admin Note</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" type="number" name="note" id="note" value="{{$messages->note}}">
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="row mb-3">
                                      <label class="col-sm-2 col-form-label">Status</label>
                                      <div class="col-sm-10">
                                          <select class="form-select" name="status" aria-label="Default select example">
                                              <option value="True" @if ($messages->status == 'True') selected="selected" @endif>True</option>
                                              <option value="False" @if ($messages->status == 'False') selected="selected" @endif>False</option>
                                          </select>
                                      </div>
                                  </div>
                                  <!-- end row -->

                                  <div class="card-body">
                                          <div class="d-grid mb-3">
                                              <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Edit Message</button>
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

@section('js')
  <!--tinymce js-->
  <script src="{{asset('back/')}}/assets/libs/tinymce/tinymce.min.js"></script>
  <!-- init js -->
  <script src="{{asset('back/')}}/assets/js/pages/form-editor.init.js"></script>
  <script src="{{asset('back/')}}/assets/js/app.js"></script>
@endsection
