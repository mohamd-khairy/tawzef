@extends('MA.layouts.main')
@section('title', trans('categories::category.cats'))

@section('content')
    @include('categories::cats.index-content')
@endsection

@push('footer-scripts')
    @include('categories::cats.index-scripts')
@endpush
