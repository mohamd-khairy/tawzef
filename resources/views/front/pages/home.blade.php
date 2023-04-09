@extends('front.layouts.main')
@section('content')
    @include('front.partials.home.slider')

    @include('front.partials.home.search')

    @include('front.partials.home.categories')

    @include('front.partials.home.jobs')
@endsection
@push('scripts')
@endpush
