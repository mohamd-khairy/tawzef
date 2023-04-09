@extends('MA.layouts.main')
@section('title', trans('socials::social.create_logo'))

@section('content')
    @include('socials::socials.create-content')
@endsection

@push('footer-scripts')
    @include('socials::socials.create-scripts')
@endpush