@extends('template.app')


@section('title', 'ASSET | User')
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
                                                    <a class="btn btn-sm btn-success btn-rounded waves-effect waves-light mb-2 me-2" href="{{ route('user.create') }}" role="button"><i class="mdi mdi-plus me-1"></i> Add User</a>
                                                </div>
                                            </div>
                                
                                            
                                            <div class="col-sm-4">
                                                
                                            </div>
                                            <!-- end col-->
                                        </div>
        
                                      
                                            
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead class="table-light">
                                            <tr>
                                                
                                                <th> </th>
                                                <th>Name & Departement</th>
                                                <th>Email & Location</th>
                                                <th>Verified</th>
                                                <th>Level </th>
                                                <th> </th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @forelse ($user as $item)
                                            <tr>
                                                
                                                <td>
                                                    <div>
                                                        <img class="rounded-circle avatar-xs" src="{{ Storage::url('public/img/avatar/').$item->image }}" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">{{ $item->name }}</a></h5>
                                                    <p class="text-muted mb-0">{{ $item->departement }}</p>
                                                </td>
                                                
                                                <td>
                                                    <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">{{ $item->email }}</a></h5>
                                                    <p class="text-muted mb-0">{{ $item->location->location_name }}</p>
                                                </td>
                                           
                                                <td>
                                                    @if ($item->email_verified_at == null)
                                                    <span class="badge bg-danger "> Not Verified</span>
                                                    @elseif($item->email_verified_at == true )
                                                    <span class="badge bg-primary "> Verified</span>
                                                    @endif
                                                </td>
                                                
                                                
                                                <td>
                                                    @if($item->role_id == 1)
                                                    Manager
                                                    @elseif($item->role_id == 2)
                                                    Admin
                                                    @elseif($item->role_id == 3)
                                                    Employeess
                                                    @endif    
                                                </td>
                                              
                                                <td>
                                                    <form id="sa-warning" action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light" id="sa-warning"><i class="bx bx-trash"></i></button>
                                                        
                                                    </form>
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