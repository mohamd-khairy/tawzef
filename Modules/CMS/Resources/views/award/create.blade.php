@extends('MA.layouts.main')
@section('title', trans('cms::cms.create_award'))

@section('content')
    @include('cms::award.create-content')
@endsection

@push('footer-scripts')
    @include('cms::award.create-scripts')
@endpush