@extends('template.app')


@section('title', 'ASSET | Add User')

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
                                    <h4 class="mb-sm-0 font-size-18">Add User</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                            <li class="breadcrumb-item active">Add User</li>
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
        
                                        <h4 class="card-title">Form Create User</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Full Name</label>
                                                            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Please insert name">
                                                            @error('name')
                                                              <div class="alert alert-danger mt-2">
                                                                  {{ $message }}
                                                              </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Please insert email">
                                                            @error('email')
                                                              <div class="alert alert-danger mt-2">
                                                                  {{ $message }}
                                                              </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="departement" class="form-label">Departement</label>
                                                            <input id="departement" class="form-control @error('departement') is-invalid @enderror" name="departement" placeholder="Please insert departement">
                                                            @error('departement')
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
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                            @error('password')
                                                              <div class="alert alert-danger mt-2">
                                                                  {{ $message }}
                                                              </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="password-confirm" class="form-label">Password Confirm</label>
                                                            <input id="password-confirm"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="formrow-inputCity" class="form-label">Location</label>
                                                            <select id="location_id" class="form-select @error('location_id') is-invalid @enderror" name="location_id">
                                                                <option selected="">Select Location</option>
                                                                @foreach ($locations as $location)
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
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="nik" class="form-label">N I K</label>
                                                            <input id="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="Please insert nik">
                                                            @error('nik')
                                                                <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="mobile" class="form-label">Phone Number</label>
                                                            <input id="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Please insert mobile">
                                                            @error('mobile')
                                                              <div class="alert alert-danger mt-2">
                                                                  {{ $message }}
                                                              </div>
                                                            @enderror
                                                        </div>      
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="role_id" class="form-label">Role Id</label>
                                                            <select id="role_id" class="form-select @error('role_id') is-invalid @enderror" name="role_id">
                                                                    <option value="">Select Role ID</option>
                                                                    <option value="1" @if (old('role_id') == "1") {{ 'selected' }} @endif>Super Admin</option>
                                                                    <option value="2" @if (old('role_id') == "2") {{ 'selected' }} @endif>Admin</option>
                                                                    <option value="3" @if (old('role_id') == "3") {{ 'selected' }} @endif>Employee</option>
                                                                </select>
                                                            </select>
                                                            @error('role_id')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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