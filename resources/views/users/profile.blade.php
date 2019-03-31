@extends('layouts.app')

@section('content')
    <div class="content-section">
        <div class="container">
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
                    <ads></ads>
                    <ads></ads>
                </div>
            </div>
        </div>
    </div>
@endsection