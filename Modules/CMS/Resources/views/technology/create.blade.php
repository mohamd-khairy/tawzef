@extends('MA.layouts.main')
@section('title', trans('cms::cms.create_technology'))

@section('content')
    @include('cms::technology.create-content')
@endsection

@push('footer-scripts')
    @include('cms::technology.create-scripts')
@endpush