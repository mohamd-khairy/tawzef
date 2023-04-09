@extends('MA.layouts.main')
@section('title', trans('blog::blog.blogs'))

@section('content')
    @include('blog::blogs.index-content')
@endsection

@push('footer-scripts')
    @include('blog::blogs.index-scripts')
@endpush