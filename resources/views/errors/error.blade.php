@extends('layout.app')

@section('head-links-scripts')
@endsection

@section('title')
@lang("Error 404")
@endsection

@section('page-wrapper')
error-page-wrapper
@endsection

@section('content')
<div class="main-container messaging-page">
    <div class="container">
        <div class="error-404-message messaging-page-content flex-column">
            <h1 class="icon-emo-unhappy">@yield('title')</h1>
            <p>@yield('message')</p>
            <a href="{{ route('home') }}" class="btn-continue btn-inline btn-with-arrow">@lang("Back to store")</a>
        </div>
    </div>
</div>
@endsection
