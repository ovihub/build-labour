@extends('layouts.auth')

@section('content')
    <login></login>
@endsection

@push('scripts')
    <script src="{{ asset('js/auth/login.js') }}"></script>
@endpush