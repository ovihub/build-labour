@extends('layouts.errors')

@section('content')
    <div class="container">
        <div class="bl-label-48">
            Oops, Something went wrong!
        </div>
        <div class="bl-label-15 ta-center">
            An internal error occurred. Please contact administrator.
        </div>
        <div class="bl-label-17-center">
            <a href="/user/profile">Return to your feed by clicking here</a>
        </div>
        <div class="row justify-content-center">
            <img src="/img/undraw-warning-cyit.png"
                srcset="/img/undraw-warning-cyit@2x.png 2x, /img/undraw-warning-cyit@3x.png 3x">
        </div>
    </div>
@endsection