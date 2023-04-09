@extends('MA.layouts.main')
@section('title', trans('ads::ad.ads'))

@section('content')
    @include('ads::ads.index-content')
@endsection

@push('footer-scripts')
    @include('ads::ads.index-scripts')
@endpush