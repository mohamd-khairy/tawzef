@extends('MA.layouts.main')
@section('title', trans('users.my_profile'))

@section('content')
    @include('MA.pages.users.my-profile-content')
@endsection

@push('footer-scripts')
    @include('MA.pages.users.my-profile-scripts')
@endpush