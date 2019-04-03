@extends('layouts.app')

@section('content')
    <div class="row">
        <load-user></load-user>
        <div class="col-md-3">
            <user-profile></user-profile>
            <about-me></about-me>
            <ideal-role></ideal-role>
        </div>
        <div class="col-md-6">
            <employment></employment>
            <industry-skills></industry-skills>
            <education></education>
            <tickets></tickets>
        </div>
        <div class="col-md-3">
            <job-ads></job-ads>
            <ads></ads>
        </div>
    </div>
@endsection