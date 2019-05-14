@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <load-user></load-user>
        <div class="col-md-3">
            <company-profile></company-profile>
        </div>
        <div class="col-md-6">
            <job-details></job-details>
            <job-requirements></job-requirements>
            <job-responsibilities></job-responsibilities>
        </div>
        <div class="col-md-3">
            <job-ads></job-ads>
            <ads></ads>
        </div>
    </div>
@endsection