@extends('template.app')


@section('title', 'ASSET | Data Asset')
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
                                    <h4 class="mb-sm-0 font-size-18">Data Tables Asset</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('asset') }}">Tables</a></li>
                                            <li class="breadcrumb-item active">Asset</li>
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
                                                    <a class="btn btn-sm btn-success btn-rounded waves-effect waves-light mb-2 me-2" href="{{ route('asset.create') }}" role="button"><i class="mdi mdi-plus me-1"></i> Add Asset</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                
                                            </div>
                                            <!-- end col-->
                                        </div>
                                        
                                        
                                        
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-200">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                
                                                <th>Asset Name</th>
                                                <th>Asset Code</th>
                                                <th>Employee</th>
                                                <th>Location</th>
                                                <th>Categories</th>
                                                <th>Brand</th>
                                                <th>Serial Number</th>
                                                <th>Tag Number</th>
                                                <th>Warranty</th>
                                                <th>Asset Value</th>
                                                <th> </th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @forelse ($assets as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    {{-- <td class="text-center">
                                                      <img src="{{ Storage::url('public/img/').$item->image }}" class="rounded" style="width: 100px">
                                                    </td> --}}
                                                    <td>{{ $item->asset_name }}</td>
                                                    <td>{{ $item->asset_code }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->location->location_name }}</td>
                                                    <td>{{ $item->categories->name }}</td>
                                                    <td>{{ $item->brand }}</td>
                                                    <td>{{ $item->serial_number }}</td>
                                                    <td>{{ $item->tag_number }}</td>
                                                    <td>{{ $item->warranty }}</td>
                                                    <td>@currency($item->asset_value) </td>
                                                    
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".asset-detailModal" data-url="{{ route('asset.show', $item->id) }}" data-storage-url="{{ Storage::url('public/img/') }}"><i class="bx bx-show"></i>
                                                            
                                                        </button>
                                                        
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('asset.destroy', $item->id) }}" method="POST">
                                                            <a href="{{ route('asset.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>
                                                 
                                                </tr>
                                                @empty
                                                <div class="alert alert-danger">
                                                    Data Lokasi belum Tersedia.
                                                </div>
                                                @endforelse
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
            <div class="modal fade asset-detailModal" id="asset-detailModal" tabindex="-1" role="dialog" aria-labelledby="asset-detailModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="asset-detailModal">Asset Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-4">
                                        <img class="card-img  rounded img-fluid" id="image_asset" alt="Card image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title" id="asset_name"></h5>
                                            <div class="table-responsive">
                                                <table class="table table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Location </th>
                                                            <td id="location_name"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Asset Code </th>
                                                            <td id="asset_code"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Categories </th>
                                                            <td id="categories_name"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Serial Number </th>
                                                            <td id="serial_number"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tag Number </th>
                                                            <td id="tag_number"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Warranty </th>
                                                            <td id="warranty"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Asset Value </th>
                                                            <td id="asset_value"></td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      
                    </div>
                </div>
            </div>
            <!-- end modal -->
        </div>
<!-- END layout-wrapper -->

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#asset-detailModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget) // Button that triggered the modal
            var url = button.data('url') // Extract info from data-* attributes
            var storage = button.data('storage-url') // Extract info from data-* attributes

            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    $('#asset-detailModal').modal('hide')
                },
                success: function (data) {
                    $('#asset_name').html(data.asset_name) 
                    $('#location_name').html(data.location.location_name) 
                    $('#categories_name').html(data.categories.name) 
                    $('#asset_code').html(data.asset_code) 
                    $('#serial_number').html(data.serial_number) 
                    $('#tag_number').html(data.tag_number)
                    $('#warranty').html(data.warranty)
                    $('#asset_value').html('Rp. ' + data.asset_value)
                    $('#image_asset').attr('src', storage + data.image)

                    $('#asset-detailModal').modal('show')
                }
            })
        })
    })
</script>
@endsection