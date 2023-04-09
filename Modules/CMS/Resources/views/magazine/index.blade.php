@extends('MA.layouts.main')
@section('title', trans('cms::cms.magazines'))

@section('content')
    @include('cms::magazine.index-content')
@endsection

@push('footer-scripts')
    @include('cms::magazine.index-scripts')
@endpush