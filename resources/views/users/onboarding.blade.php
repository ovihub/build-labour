@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <!-- <div class="col-md-6"> -->
            <!-- <user-profile></user-profile>
            <about-me></about-me>
            <ideal-role></ideal-role>
            <employment></employment>
            <industry-skills></industry-skills>
            <education></education>
            <tickets></tickets> -->
            <onboarding most-recent-role="{{ $most_recent_role }}"></onboarding>
        <!-- </div> -->
    </div>
@endsection