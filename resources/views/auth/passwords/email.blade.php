@extends('layouts.auth')

@section('content')
    <request-link></request-link>
@endsection

@push('scripts')
    <script src="{{ asset('js/auth/request_link.js') }}"></script>
@endpush