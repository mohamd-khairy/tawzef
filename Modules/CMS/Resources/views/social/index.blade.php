@extends('MA.layouts.main')
@section('title', trans('cms::cms.socials'))

@section('content')
    @include('cms::social.index-content')
@endsection

@push('footer-scripts')
    @include('cms::social.index-scripts')
@endpush