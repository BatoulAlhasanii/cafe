@extends('layout.app')

@section('head-links-scripts')
@endsection

@section('title')
@lang("Payment Failure")
@endsection

@section('header')
  @include('layout.simple-header')
@endsection

@section('footer')
  @include('layout.simple-footer')
@endsection

@section('page-wrapper')
payment-failure-page-wrapper
@endsection

@section('content')
<div class="main-container messaging-page">
    <div class="container">
        <div class="error-404-message messaging-page-content flex-column">
            <h1 class="icon-emo-unhappy">@lang("Payment Failed")</h1>
            <p>@lang("We are sorry to tell you that your payment has been failed.")</p>
            <a href="{{ route('home') }}" class="btn-continue btn-inline btn-with-arrow">@lang("Back to store")</a>
        </div>
    </div>
</div>
@endsection
