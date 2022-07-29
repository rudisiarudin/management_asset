@extends('template.app')


@section('title', 'ASSET | Profile')
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
                                    <h4 class="mb-sm-0 font-size-18">Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">My Profile</h4>
                                                <div class="p-2">
                                                    <div class="text-center">
                                                                <img class="rounded-circle avatar-xl" alt="200x200" src="{{ Storage::url('public/img/avatar/').Auth::user()->image }}" data-holder-rendered="true">
                                                        <div class="p-2 mt-4">
                                                            <h4><a href="javascript: void(0);" class="text-dark">{{ Auth::user()->name }}</a></h4>
                                                            <p>{{ Auth::user()->departement }}</p>
                                                            <p class="text-muted">
                                                                @if(Auth::user()->role_id == 1)
                                                                Super Admin
                                                                @elseif(Auth::user()->role_id == 2)
                                                                Admin
                                                                @elseif(Auth::user()->role_id == 3)
                                                                Employeess
                                                                @endif   </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        <div class="text-center">
                                        
                                        <div>
                                        </div>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1"></a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1"></a>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20">
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-pie-chart-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="javascript: void(0);"><i class="bx bx-user-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>      
                            
                            <div class="col-xl-8">

                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Personal Information</h4>

                                       
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name </th>
                                                        <td> : {{ Auth::user()->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">NIK</th>
                                                        <td> :  {{ Auth::user()->nik }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Phone Number </th>
                                                        <td> : {{ Auth::user()->mobile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail </th>
                                                        <td> : {{ Auth::user()->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location </th>
                                                        <td> : {{ Auth::user()->location->location_name }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="mt-4">
                                                <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-danger bg-gradient btn-sm">Edit Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                        </div>
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

        </div>
        <!-- END layout-wrapper -->

 @endsection