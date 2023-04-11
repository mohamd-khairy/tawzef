@extends('front.layouts.main')

@section('content')

    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->

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
