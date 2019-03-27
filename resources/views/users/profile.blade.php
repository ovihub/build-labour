@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
        
            @include('layouts.sidebar')
    
            <main role="main" class="col-md-12 pl-sm-5 col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">My Profile</h1>
                    
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Share</button>
                            <button class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button> -->
                    </div>
                </div>

                <div class="panel-body">
                    <upload-photo></upload-photo>
                    <!-- <show-form></show-form> -->
                    <profile></profile>
                </div>

            </main>
            
        </div>
    </div>

@endsection
