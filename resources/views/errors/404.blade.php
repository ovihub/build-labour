@extends('layouts.errors')

@section('content')
    <div class="container">
        <div class="bl-label-48">
            404 - Oops, couldn't find that page!
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