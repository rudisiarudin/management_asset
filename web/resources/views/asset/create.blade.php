@extends('template.app')


@section('title', 'ASSET | Add Asset')

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
                                    <h4 class="mb-sm-0 font-size-18">Add Asset</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/asset') }}">Asset</a></li>
                                            <li class="breadcrumb-item active">Add Asset</li>
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
        
                                        <h4 class="card-title">Form Asset</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                            @csrf
                                            <div class="col-md-12">
                                              <label class="form-label">Image</label>
                                              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                        
                                              <!-- error message untuk title -->
                                              @error('image')
                                                  <div class="alert alert-danger mt-2">
                                                      {{ $message }}
                                                  </div>
                                              @enderror
                                          </div>
                                            <div class="col-md-6">
                                              <label class="form-label">Asset Name</label>
                                              <input type="text" class="form-control @error('asset_name') is-invalid @enderror" name="asset_name">
                                                @error('asset_name')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                              <label for="user_id" class="form-label">Users</label>
                                              <select id="user_id" class="form-select @error('user_id') is-invalid @enderror" name="user_id">
                                                <option selected="">Select One</option>
                                                @foreach($user as $user)
                                                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                                @endforeach
                                              </select>
                                              @error('user_id')
                                              <div class="alert alert-danger mt-2">
                                                  {{ $message }}
                                              </div>
                                          @enderror
                                            </div>
                                            <div class="col-md-6">
                                              <label class="form-label">Asset Code</label>
                                              <input type="text" class="form-control @error('asset_code') is-invalid @enderror" name="asset_code">
                                              @error('asset_code')
                                              <div class="alert alert-danger mt-2">
                                                  {{ $message }}
                                              </div>
                                          @enderror
                                            </div>
                                           
                                            <div class="col-6">
                                              <label for="location_id" class="form-label">Location</label>
                                              <select id="location_id" class="form-select @error('location_id') is-invalid @enderror" name="location_id">
                                                <option selected="">Select One</option>
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
                            
                                            <div class="col-6">
                                                <label for="categories_id" class="form-label">Categories</label>
                                                <select id="categories_id" class="form-select @error('categories_id') is-invalid @enderror" name="categories_id">
                                                  <option selected="">Select One</option>
                                                  @foreach($categories as $categories)
                                                  <option value="{{ $categories['id'] }}">{{ $categories['name'] }}</option>
                                                  @endforeach
                                                </select>
                                                @error('categories_id')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                              </div>
                            
                                              <div class="col-md-6">
                                                <label class="form-label">Brand</label>
                                                <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand">
                                                @error('brand')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                              </div>
                            
                                              <div class="col-md-6">
                                                <label class="form-label">Serial Number</label>
                                                <input type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number">
                                                @error('serial_number')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                              </div>
                            
                                              <div class="col-md-6">
                                                <label class="form-label">Tag Number</label>
                                                <input type="text" class="form-control @error('tag_number') is-invalid @enderror" name="tag_number">
                                                @error('tag_number')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                              </div>
                            
                                              <div class="col-md-6">
                                                <label class="form-label">Warranty</label>
                                                <input type="date" class="form-control @error('warranty') is-invalid @enderror" name="warranty">
                                                @error('warranty')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                              </div>
                                              <div class="col-md-6">
                                                <label  class="form-label">Asset Value</label>
                                                <div class="input-group">
                                                  <span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
                                                  <input type="text" class="form-control  @error('asset_value') is-invalid @enderror" name="asset_value">
                                                  @error('asset_value')
                                                  <div class="alert alert-danger mt-2">
                                                      {{ $message }}
                                                  </div>
                                              @enderror
                                                </div>
                                              </div>
                                              <script type="text/javascript">
                                                $(document).ready(function(){
                                            
                                                    // Format mata uang.
                                                    $( '.uang' ).mask('000.000.000', {reverse: true});
                                            
                                                })
                                            </script>
                                            <div class="text-center">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                              <button type="reset" class="btn btn-secondary">Reset</button>
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

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
@endsection