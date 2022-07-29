@extends('template.app')

@section('title', 'ASSET | Dashboard')
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
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Management Asset Trans Entertainment</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('assets/images/data.svg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="avatar-lg profile-user-wid ">
                                    <img class="rounded-circle avatar-lg" src="{{ Storage::url('public/img/avatar/').Auth::user()->image }}" data-holder-rendered="true">
                                </div>
                                <div class="p-2 mt-4">
                                    <h5><a href="javascript: void(0);" class="text-dark">{{ Auth::user()->name }}</a></h5>
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

                            <div class="col-sm-6">
                                <div class="pt-4">

                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="font-size-15">{{ Auth::user()->location->location_name }}</h5>
                                            <p class="font-size-10 text-muted mb-0">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ url('/profile') }}" class="btn btn-primary bg-gradient waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div>
                        <div class="row">
                            <div class="col-lg-9 col-sm-8">
                                <div  class="p-4">
                                    <h5 class="text-primary">Enjoy your work !</h5>
                                    <p>Management Asset Dashboard</p>

                                    <div class="text-muted">
                                        <h4 class="card-title"><?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            echo date('l, d F Y ');; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 align-self-center">
                                <div>
                                    <img src="assets/images/crypto/features-img/img-1.png" alt="" class="img-fluid d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Employees</p>
                                        <h4 class="mb-0">{{ App\Models\User::userCount() }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-user-circle font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Location</p>
                                        <h4 class="mb-0">{{ App\Models\Location::locationCount() }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center ">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-buildings font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Procurement</p>
                                        <h4 class="mb-0">{{ App\Models\Procurement::procurementCount() }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
        <!-- end row -->
        <div class="card-body bodycontainer">
            <h5 class="card-title">Procurement <span>| Today</span></h5>

            <table class="table datatable table-scrollable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employees</th>
                    <th scope="col">Departement</th>
                    <th scope="col">Asset Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"><a href="#">1</a></th>
                    <td>Ahmad Munadi</td>
                    <td>IT Departement</td>
                    <td><a href="#" class="text-primary">Switch Cisco catalyst 2960</a></td>
                    <td>Rp. 19.400.000,-</td>
                    <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                    <th scope="row"><a href="#">2</a></th>
                    <td>Zubair Alfarabi</td>
                    <td>Design Communcation</td>
                    <td><a href="#" class="text-primary">Monitor LED Dell S2419H 24" IPS</a></td>
                    <td>Rp. 3.419.000,-</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                </tr>
                <tr>
                    <th scope="row"><a href="#">3</a></th>
                    <td>Sri Herlina</td>
                    <td>Finance</td>
                    <td><a href="#" class="text-primary">Epson L3110</a></td>
                    <td>Rp. 2.600.000,-</td>
                    <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                    <th scope="row"><a href="#">4</a></th>
                    <td>Burhannudin</td>
                    <td>IT Departement</td>
                    <td><a href="#" class="text-primary">Hardisk External 2TB</a></td>
                    <td>Rp. 1.000.000,-</td>
                    <td><span class="badge bg-primary">Progress</span></td>
                </tr>
                <tr>
                    <th scope="row"><a href="#">5</a></th>
                    <td>Abdurahman</td>
                    <td>Human Resource</td>
                    <td><a href="#" class="text-primary">Webcam Logitech 1080P</a></td>
                    <td>Rp. 560.000,-</td>
                    <td><span class="badge bg-danger">Reject</span></td>
                </tr>
                </tbody>
            </table>

            </div>
            <!-- subscribeModal -->
            <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <div class="avatar-md mx-auto mb-4">
                                    <div class="avatar-title bg-light rounded-circle text-primary h1">
                                        <i class="bx bx-happy-beaming"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <h4 class="text-primary">Welcome Management Asset !  </h4>
                                        <p class="text-muted font-size-14 mb-4">Enjoy your work and happy !</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
@include('template.footer')
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
@endsection
