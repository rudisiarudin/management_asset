@extends('template.app')

@section('title', 'ASSET | Coming Soon Page')
@section('content')
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
            @include('animation.comingsoon')
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h2 class="fw-semibold display-4 mb-0">Website Page</h2>
                    <h4 class="text-uppercase">Coming Soon</h4>
                    <div>
                        <div class="spinner-grow text-primary m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-secondary m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-success m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-info m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-warning m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-danger m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-dark m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <a class="btn btn-primary waves-effect waves-light" href="{{ route('home') }}">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="mt-5 text-center">                     
    <div>
        <p>© <script>document.write(new Date().getFullYear())</script>Trans Entertainment | Management Asset <i class="mdi mdi-heart text-danger"></i> by Rudi Si'arudin</p>
    </div>
</div>
@endsection