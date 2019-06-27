@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <load-job></load-job>
        <div class="col-md-4">
            <job-templates></job-templates>
        </div>
        <div class="col-md-6">
            <job-details></job-details>
            <job-requirements></job-requirements>
            <job-responsibilities></job-responsibilities>
        </div>
        <!-- <div class="col-md-2">
            <job-ads></job-ads>
            <ads></ads>
        </div> -->
    </div>
@endsection