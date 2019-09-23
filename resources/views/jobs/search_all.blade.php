@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="filter-header">Filter Options</div>
            <job-search-filters></job-search-filters>
        </div>
        <div class="col-md-6">
            <div class="filter-header">Search Results</div>
            <search-results></search-results>
        </div>
        <div class="col-md-3">
            <div class="mb-5"></div>
            <ads></ads>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jobs/search_all.js') }}"></script>
@endpush