@extends('layouts.app')

@section('content')

    <div class="row justify-content-center applicants">

        <div class="col-lg-10 col-md-12 pb-0 bl-applicants-wrapper">
            <job-applicants-top></job-applicants-top>
        </div>

        @if($hasCompareParam)
            <div class="col-md-12">
                <job-applicants-compare></job-applicants-compare>
            </div>
        @else
            <div class="col-lg-10 col-md-12 pt-0 bl-applicants-wrapper">
                <job-applicants></job-applicants>
            </div>
        @endif

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jobs/applicants.js') }}"></script>
@endpush