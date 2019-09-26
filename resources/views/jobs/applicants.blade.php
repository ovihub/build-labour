@extends('layouts.app')

@section('content')

    <div class="row justify-content-center applicants">

        <div class="col-lg-10 col-md-12 pb-0">
            <job-applicants-top></job-applicants-top>
        </div>

        @if($hasCompareParam)
            <job-applicants-compare></job-applicants-compare>
        @else
            <div class="col-lg-10 col-md-12 pt-0">
                <job-applicants></job-applicants>
            </div>
        @endif

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jobs/applicants.js') }}"></script>
@endpush