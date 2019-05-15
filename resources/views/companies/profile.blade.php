@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <load-user></load-user>
        <div class="col-md-3">
            <company-profile></company-profile>
        </div>
        <div class="col-md-6">
            <company-browse></company-browse>
            <company-posts></company-posts>
            <company-jobs></company-jobs>
        </div>
        <div class="col-md-3">
            <job-ads></job-ads>
            <ads></ads>
        </div>
    </div>
@endsection