@extends('template.app')


@section('title', 'ASSET | Edit User')

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
                                    <h4 class="mb-sm-0 font-size-18">Edit User</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                            <li class="breadcrumb-item active">Edit User</li>
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
        
                                        <h4 class="card-title">User Edit</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="name"> Name</label>
                                                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="location_name">
                                                        @error('name')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="email"> Email</label>
                                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Metatitle">
                                                        @error('email')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nik">NIK</label>
                                                        <input id="nik"  type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik', $user->nik) }}" placeholder="Please Insert your NIK">
                                                        @error('nik')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="departement">Departement</label>
                                                        <input id="departement"  type="text" class="form-control @error('departement') is-invalid @enderror" name="departement" value="{{ old('departement', $user->departement) }}" placeholder="Please Insert your Departement">
                                                        @error('departement')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="mobile"> Mobile Phone</label>
                                                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="Please Insert Number Phone">
                                                        @error('mobile')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="location_id" class="form-label">Location</label>
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
                                                    <div class="mb-3">
                                                        <label for="role_id" class="form-label">Role ID</label>
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
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                <button type="reset" class="btn btn-secondary waves-effect waves-light">Reset</button>
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