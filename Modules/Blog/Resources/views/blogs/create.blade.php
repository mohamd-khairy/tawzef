@extends('MA.layouts.main')
@section('title', trans('blog::blog.create_blog'))

@section('content')
    @include('blog::blogs.create-content')
@endsection

@push('footer-scripts')
    @include('blog::blogs.create-scripts')
@endpush