@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <profile></profile>
            <about-me></about-me>
            <ideal-role></ideal-role>
        </div>
        <div class="col-md-5">
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