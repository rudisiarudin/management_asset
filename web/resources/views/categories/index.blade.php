@extends('template.app')


@section('title', 'ASSET | Categories')
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
                                    <h4 class="mb-sm-0 font-size-18">Data Categories</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Data Categories</li>
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
                                                    <a class="btn btn-sm btn-success btn-rounded waves-effect waves-light mb-2 me-2" href="{{ route('categories.create') }}" role="button"><i class="mdi mdi-plus me-1"></i> Add Categories</a>
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
                                                <th>Categories Name</th>
                                                <th>Group</th>
                                                <th> </th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @forelse ($categories as $key => $categories)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $categories->name }}</td>
                                                <td>{{ $categories->group }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('categories.destroy', $categories->id) }}" method="POST">
                                                        <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"><i class="bx bx-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light"><i class="bx bx-trash"></i></button>
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