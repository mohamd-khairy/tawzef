@extends('MA.layouts.main')
@section('title', trans('careers::career.careers'))

@section('content')
    @include('careers::careers.index-content')
@endsection

@push('footer-scripts')
    @include('careers::careers.index-scripts')
@endpush