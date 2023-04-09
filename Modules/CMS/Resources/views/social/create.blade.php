@extends('MA.layouts.main')
@section('title', trans('cms::cms.create_social'))

@section('content')
    @include('cms::social.create-content')
@endsection

@push('footer-scripts')
    @include('cms::social.create-scripts')
@endpush