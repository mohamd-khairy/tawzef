@extends('MA.layouts.main')
@section('title', trans('ads::ad.create_ad'))

@section('content')
    @include('ads::ads.create-content')
@endsection

@push('footer-scripts')
    @include('ads::ads.create-scripts')
@endpush