@extends('template.app')


@section('title', 'ASSET | Edit Profile')

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
                                    <h4 class="mb-sm-0 font-size-18">Edit Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Proflie</a></li>
                                            <li class="breadcrumb-item active">Edit Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Form Edit Profile</h4>

                                        <form action="{{ route('profile.update', Auth::user()->id ) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                                                        @error('name')
                                                            <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                                        @error('password')
                                                          <div class="alert alert-danger mt-2">
                                                              {{ $message }}
                                                          </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nik" class="form-label">NIK <code>*</code></label>
                                                        <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik', $user->nik) }}" >
                                                        @error('nik')
                                                            <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="departement" class="form-label">Departement</label>
                                                        <input type="text" class="form-control @error('departement') is-invalid @enderror" name="departement" value="{{ old('departement', $user->departement) }}">
                                                        @error('departement')
                                                          <div class="alert alert-danger mt-2">
                                                              {{ $message }}
                                                          </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="formrow-inputCity" class="form-label">Location <code>*</code></label>
                                                            <select id="location_id" class="form-select @error('location_id') is-invalid @enderror" name="location_id">
                                                                <option selected="">Select Location</option>
                                                                @foreach ($locations as $location)
                                                                <option value="{{ $location['id'] }}" {{ $location['id'] == $user->location_id ? 'selected' : '' }}>{{ $location['location_name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('location_id')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-inputState" class="form-label">Avatar <code>*</code></label>
                                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $user->image) }}">
                                                        @error('image')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="mobile" class="form-label">Phone Number <code>*</code></label>
                                                        <input type="phone" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $user->mobile) }}">
                                                        @error('mobile')
                                                          <div class="alert alert-danger mt-2">
                                                              {{ $message }}
                                                          </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>

                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                @include('template.footer')
            </div>
            <!-- end main content-->
@endsection