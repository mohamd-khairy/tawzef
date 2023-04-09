@extends('MA.layouts.main')
@section('title', trans('cms::cms.technologies'))

@section('content')
    @include('cms::technology.index-content')
@endsection

@push('footer-scripts')
    @include('cms::technology.index-scripts')
@endpush