@extends('MA.layouts.main')
@section('title', trans('cms::cms.reports'))

@section('content')
    @include('cms::report.index-content')
@endsection

@push('footer-scripts')
    @include('cms::report.index-scripts')
@endpush