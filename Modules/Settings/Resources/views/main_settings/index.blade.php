@extends('MA.layouts.main')
@section('title', trans('settings::settings.main_settings'))

@section('content')
    @include('settings::main_settings.index-content')
@endsection

@push('footer-scripts')
    @include('settings::main_settings.index-scripts')
@endpush