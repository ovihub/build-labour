@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <load-job></load-job>
        <div class="col-md-3">
            <company-summary role="{{ $role }}"></company-summary>
            
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

@push('scripts')
    <script src="{{ asset('js/jobs/view.js') }}"></script>
@endpush