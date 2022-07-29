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
                                    <h4 class="mb-sm-0 font-size-18">Data Location</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Data Location</li>
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
                                            @canany(['isAdmin', 'isSuperAdmin'])
                                            <div class="col-sm-8">
                                                <div class="text-sm">
                                                    <a class="btn btn-sm btn-success btn-rounded waves-effect waves-light mb-2 me-2" href="{{ route('location.create') }}" role="button"><i class="mdi mdi-plus me-1"></i> Add Location</a>
                                                </div>
                                            </div>
                                            @endcanany
                                            <div class="col-sm-4">
                                                
                                            </div>
                                            <!-- end col-->
                                        </div>
                                        
                                        
                                      
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Locations Name</th>
                                                <th>Locations Code</th> 
                                                <th>Address</th>
                                                <th>Phone</th>
                                                @canany(['isAdmin', 'isSuperAdmin'])
                                                <th> </th>
                                                @endcanany
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @forelse ($locations as $key => $location)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $location->location_name }}</td>
                                                <td>{{ $location->location_code }}</td>
                                                <td>{!! $location->address !!}</td>
                                                <td>{{ $location->phone }}</td>
                                                @canany(['isAdmin', 'isSuperAdmin'])
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('location.destroy', $location->id) }}" method="POST">
                                                        <a href="{{ route('location.edit', $location->id) }}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"><i class="bx bx-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light"><i class="bx bx-trash"></i></button>
                                                    </form>
                                                </td>
                                                @endcanany
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
