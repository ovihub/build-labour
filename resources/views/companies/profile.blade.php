@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <load-company company-id="{{ $company_id }}"></load-company>
        <div class="col-md-3">
            <company-profile company-id="{{ $company_id }}"></company-profile>
        </div>
        <div class="col-md-6">
            <company-browse></company-browse>
            <company-posts company-id="{{ $company_id }}"></company-posts>
            <company-people company-id="{{ $company_id }}"></company-people>
            <company-jobs company-id="{{ $company_id }}"></company-jobs>
        </div>
        <div class="col-md-3">
            <company-most-recent-applicants company-id="{{ $company_id }}"></company-most-recent-applicants>
            <ads></ads>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/companies/profile.js') }}"></script>
@endpush
