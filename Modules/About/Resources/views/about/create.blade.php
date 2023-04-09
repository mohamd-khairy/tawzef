@extends('MA.layouts.main')
@section('title', trans('about::about.create_about'))

@section('content')
    @include('about::about.create-content')
@endsection

@push('footer-scripts')
    @include('about::about.create-scripts')
@endpush