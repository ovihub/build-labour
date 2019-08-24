@extends('layouts.auth')

@section('content')
    <reset-password></reset-password>
@endsection

@push('scripts')
    <script src="{{ asset('js/auth/reset_password.js') }}"></script>
@endpush