@extends('template.app')


@section('title', 'ASSET | Lokasi Data')
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
                                    <h4 class="mb-sm-0 font-size-18">Data Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Data Tables</li>
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
                                        <div class="row mb-2">
                                            
                                            <div class="col-sm-8">
                                                <div class="text-sm">
                                                    <a class="btn btn-sm btn-success btn-rounded waves-effect waves-light mb-2 me-2" href="{{ route('procurement.create') }}" role="button"><i class="mdi mdi-plus me-1"></i> Add Procurement</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                
                                            </div>
                                            <!-- end col-->
                                        </div>
                                        
                                        
        
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Request Name</th>
                                                <th>QTY</th>
                                                <th>Employees</th>
                                                <th>Locations Name</th>
                                                <th>Departement</th>
                                                <th>Status</th>
                                                <th> </th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @forelse ($procurement as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->request_name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->users->name }}</td>
                                                <td>{{ $item->location->location_name }}</td>
                                                <td>{{ $item->users->departement }}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                        <span class="badge badge-pill badge-soft-primary font-size-11">
                                                        Pending</span>
                                                    @elseif($item->status == 2)
                                                        <span class="badge badge-pill badge-soft-success font-size-11">
                                                        Approve
                                                    </span>
                                                    @elseif($item->status == 3)
                                                        <span class="badge badge-pill badge-soft-danger font-size-11">
                                                        Reject
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @canany(['isAdmin', 'isSuperAdmin'])
                                                    @if ($item->status == 1)
                                                    <form onsubmit="return confirm('Are you sure ?');" action="{{ route('procurement.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light" name="approve" value="1"><i class="bx bx-check"></i> </button>
                                                        <button type="submit" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" name="reject" value="1"><i class="bx bx-x"></i> </button>
                                                    </form>
                                                    @endif
                                                    @endcanany
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

            @include('template.footer')
            </div>
            <!-- end main content-->

        </div>
<!-- END layout-wrapper -->

@endsection