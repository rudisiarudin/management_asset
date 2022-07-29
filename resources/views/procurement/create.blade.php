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
                                    <h4 class="mb-sm-0 font-size-18">Add Procurement </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Procurement</a></li>
                                            <li class="breadcrumb-item active">Add Procurement</li>
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
        
                                        <h4 class="card-title">Form Procurement</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form action="{{ route('procurement.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="request_name">Request Name<code>*</code></label>
                                                        <input id="request_name" class="form-control @error('request_name') is-invalid @enderror" name="request_name" placeholder="Please insert Request Name">
                                                        @error('request_name')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="Quantity">Quantity<code>*</code></label>
                                                        <input id="qty" type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" placeholder="Please insert QTY">
                                                        @error('qty')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="user_id">Location<code>*</code></label>
                                                        <select id="location_id" class="form-select @error('location_id') is-invalid @enderror" name="location_id">
                                                            <option selected="">Select Location</option>
                                                                @foreach($locations as $location)
                                                            <option value="{{ $location['id'] }}">{{ $location['location_name'] }}</option>
                                                                @endforeach
                                                        </select>
                                                    @error('location_id')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </div>
                                                </div>
                                                    
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
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