<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} | {{ trans('auth.login') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    @if (App::getLocale() == 'ar')
        <!--RTL version:-->
        <link href="URL::asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    @else
        <!--begin::Global Theme Styles -->
        <link href="{{ URL::asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif


    @if (App::getLocale() == 'ar')
        <!--RTL version:-->
        <link href="{{ URL::asset('assets/demo/default/base/style.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link href="{{ URL::asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{ asset('front/assets/img/fav.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('front/assets/img/fav.png') }}')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('front/assets/img/fav.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/assets/img/fav.png') }}">
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 8px
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #000
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background: #000;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #a7a5a5;
        }

        .m-login.m-login--2 .m-login__wrapper .m-login__container {
            width: auto !important;
            /* margin-top: 20% ; */
            background: rgb(0, 112, 149);
            padding: 16px;
            box-shadow: 1px 1px 1px 1px grey;
            padding: 22px;
            border-radius: 10%;
        }

        .m-login.m-login--2 .m-login__wrapper .m-login__container .m-login__form .m-login__form-action .m-login__btn {
            background-color: #7358A5 !important;
            color: white !important;
        }
    </style>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="{{ asset('MA/assets/img/favicon.ico') }}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{ asset('MA/assets/img/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('MA/assets/img/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('MA/assets/img/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('MA/assets/img/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('MA/assets/img/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('MA/assets/img/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('MA/assets/img/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('MA/assets/img/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('MA/assets/img/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('MA/assets/img/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('MA/assets/img/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('MA/assets/img/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('MA/assets/img/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('MA/assets/img/favicon-16x16.png') }}"> -->
    <!-- <link rel="manifest" href="{{ asset('MA/assets/img/manifest.json') }}"> -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <!-- <meta name="msapplication-TileImage" content="{{ asset('MA/assets/img/ms-icon-144x144.png') }}"> -->
    <meta name="theme-color" content="#ffffff">
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
    class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <section class="h-100" style="background-color: #c9c9c9;">
        <div class="container py-5 h-100">


            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="w-100 p-5 text-center">
                            {{-- <img src="{{ asset('front/assets/img/logo-sport.png') }}" class="mt-5 w-75" > --}}
                        </div>
                        <div class="card-body p-5 text-center">

                            <form method="POST" id="login_form" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg"
                                        value="{{ old('email') }}" placeholder="{{ trans('auth.email') }}"
                                        name="email" autocomplete="off" id="email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                                        type="password" placeholder="{{ trans('auth.password') }}" name="password"
                                        id="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <button class="btn btn-primary btn-lg btn-block" id="m_login_signin_submit"
                                    type="submit"style="background-color: #DFE26D !important; te:#000;">{{ trans('auth.sign_in') }}</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: Page -->

    <!--begin::Global Theme Bundle -->
    <script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    <!--begin::Page Scripts -->
    <script src="{{ URL::asset('assets/snippets/custom/pages/user/login.js') }}" type="text/javascript"></script>
    @if (Request::routeIs('password.request'))
        <script>
            var login = $('#m_login');
            var displayForgetPasswordForm = function() {
                login.removeClass('m-login--signin');
                login.removeClass('m-login--signup');

                login.addClass('m-login--forget-password');
                //login.find('.m-login__forget-password').animateClass('flipInX animated');
                mUtil.animateClass(login.find('.m-login__forget-password')[0], 'flipInX animated');

            }
            $(document).ready(function() {
                displayForgetPasswordForm();
            });
        </script>
    @endif
    <!--end::Page Scripts -->

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <script>
        window.Laravel = {
            !!json_encode([
                'csrfToken' => csrf_token(),
            ]) !!
        };
    </script>
    <script src="{{ asset('MA/assets/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('MA/assets/vendors/general/moment/min/moment-timezone.min.js') }}" type="text/javascript">
    </script>
    <script>
        $('#timezone').val(moment.tz.guess());
    </script>
</body>

<!-- end::Body -->

</html>
