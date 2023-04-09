@extends('MA.layouts.main')
@section('title', trans('cms::cms.create_report'))

@section('content')
    @include('cms::report.create-content')
@endsection

@push('footer-scripts')
    @include('cms::report.create-scripts')
@endpush