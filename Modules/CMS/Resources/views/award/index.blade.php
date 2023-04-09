@extends('MA.layouts.main')
@section('title', trans('cms::cms.awards'))

@section('content')
    @include('cms::award.index-content')
@endsection

@push('footer-scripts')
    @include('cms::award.index-scripts')
@endpush