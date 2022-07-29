@extends('template.app')


@section('title', 'ASSET | Add Categories')

@section('content')
<body data-sidebar="dark">

    <!-- Begin page -->
   <div id="layout-wrapper">
   @include('template.navbar')
   @include('template.sidebar')
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
                                    <h4 class="mb-sm-0 font-size-18">Add Categories</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('categories') }}">Data Categories</a></li>
                                            <li class="breadcrumb-item active">Add Categories</li>
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
        
                                        <a href="{{ url('categories') }}" class="btn btn-danger btn-sm waves-effect waves-light"><i class="bx bx-list-ol"></i> List</a>
                                        
                                        <p class="card-title-desc"> </p>
        
                                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="name">Categories Name</label>
                                                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Please insert Name Categories">
                                                        @error('name')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="group">Group Categories</label>
                                                        <input id="group" type="text" class="form-control @error('group') is-invalid @enderror" name="group" placeholder="Please insert Group Categories">
                                                        @error('group')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                    
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                @include('template.footer')
            </div>
            <!-- end main content-->
@endsection