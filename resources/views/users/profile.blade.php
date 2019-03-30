@extends('layouts.app')

@section('content')
    <div class="content-section">
        <div class="container">
            <div class="row">
                
                <profile></profile>

                <employment></employment>

                <div class="col-md-3">
                    <div class="profile-item-3">
                        <div class="profile-thumb">
                            <img src="/img/featured/1.jpg" alt="">
                        </div>
                        <div class="profile-content">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">

                                </div>
                                <div class="col-md-9 col-sm-9">
                                    CBus Super
                                    <div class="profile-label">
                                        Come and chat with one of
                                        our experts on how you can
                                        build for your retirement.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <about-me></about-me>

                <education></education>
            </div>

            <div class="row">
                <ideal-role></ideal-role>

                <tickets></tickets>
            </div>
        </div>
    </div>
@endsection