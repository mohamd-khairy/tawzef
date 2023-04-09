@extends('MA.layouts.main')
@section('title', trans('contactus::contact_us.create_contact'))

@section('content')
    @include('contactus::requests.create-content')
@endsection

@push('footer-scripts')
    @include('contactus::requests.create-scripts')
@endpush