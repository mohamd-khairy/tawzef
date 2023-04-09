@extends('MA.layouts.main')
@section('title', trans('contactus::contact_us.ad_requests'))

@section('content')
    @include('contactus::ad_requests.index-content')
@endsection

@push('footer-scripts')
    @include('contactus::ad_requests.index-scripts')
@endpush