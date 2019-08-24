@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <create-job></create-job>
        </div>
        <div class="col-md-9">
            <new-job-details></new-job-details>
            <new-job-requirements></new-job-requirements>
            <new-job-responsibilities></new-job-responsibilities>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jobs/new.js') }}"></script>
@endpush