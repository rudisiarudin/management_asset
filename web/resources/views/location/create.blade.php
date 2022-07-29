@extends('template.app')


@section('title', 'ASSET | Add Location ')

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
                                    <h4 class="mb-sm-0 font-size-18">Add Location</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('location') }}">Table Location</a></li>
                                            <li class="breadcrumb-item active">Add Location</li>
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
                                       

                                        <a href="{{ url('location') }}" class="btn btn-danger btn-sm waves-effect waves-light"><i class="bx bx-list-ol"></i> List</a>
                                        
                                        <p class="card-title-desc"> </p>
        
                                        <form action="{{ route('location.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="location_name">Location Name</label>
                                                        <input id="location_name" class="form-control @error('location_name') is-invalid @enderror" name="location_name" placeholder="Please insert Location Name">
                                                        @error('location_name')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="location_code">Location Code</label>
                                                        <input id="location_code" type="text" class="form-control @error('location_code') is-invalid @enderror" name="location_code" placeholder="Please insert Location Code">
                                                        @error('location_code')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="phone">Phone</label>
                                                        <input id="phone"  type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Please insert Number Phone">
                                                        @error('phone')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="address">Address</label>
                                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address"  rows="5" placeholder="Please insert Address"></textarea>
                                                    @error('address')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                <button type="reset" class="btn btn-secondary waves-effect waves-light">Clear</button>
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