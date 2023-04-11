@extends('front.layouts.main')

@section('content')
    <nav aria-label="breadcrumb">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('main.home_title') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('auth.login') }}</li>
            </ol>
        </div>
    </nav>
    <div id="notification" style="display: none;">
        <span class="dismiss"><a title="{{ trans('main.dismiss_notification') }}">x</a></span>
        <span class="messages"></span>
    </div>
    <main class="main-content">

        <section class="loginform-page py-5">
            <div class="container">
                <div class="logpage">
                    @include('front.partials.login.login')
                </div>
            </div>
        </section>
    </main>
@endsection
