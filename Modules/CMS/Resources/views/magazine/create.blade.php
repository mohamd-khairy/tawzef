@extends('MA.layouts.main')
@section('title', trans('cms::cms.create_magazine'))

@section('content')
    @include('cms::magazine.create-content')
@endsection

@push('footer-scripts')
    @include('cms::magazine.create-scripts')
@endpush