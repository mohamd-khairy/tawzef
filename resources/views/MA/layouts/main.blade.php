<!DOCTYPE html>

@if(LaravelLocalization::getCurrentLocale() == 'ar')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" direction="rtl" dir="rtl" style="direction: rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>@yield('title') | {{env('APP_NAME')}}</title>
	<meta name="description" content="@yield('page_description')">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	@include('MA.inc.header-scripts')
    <link href="{{asset('dashboard/css/sb-admin-2.css')}}" rel="stylesheet">

	@stack('header-scripts')
</head>
<!-- end::Head -->


<!-- begin::Body -->

<body class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed-off kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

	<!-- begin::Page loader -->

	<!-- end::Page Loader -->

	<!-- begin:: Page -->

	<!-- begin:: Header Mobile -->
	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="{{route('home')}}">
				<img alt="Logo" src="{{ asset('front/assets/img/logo-sport.png') }}" />
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			{{-- <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_header_mobile_toggler"><span></span></button> --}}
			<button class="kt-header-mobile__toolbar-toggler" id="kt_aside_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
		</div>
	</div>

	<!-- end:: Header Mobile -->
	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            @include('MA.inc.header-left-bar')

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed" data-ktheader-minimize="on">
					<div class="kt-header__top">
						<div class="kt-container">

							<!-- begin:: Brand -->
							<div class="kt-header__brand kt-grid__item" id="kt_header_brand">
								@include('MA.inc.header-brand-menu')
								{{-- @include('MA.inc.header-menu') --}}
							</div>
							<!-- end:: Brand -->

							<!-- begin:: Header Topbar -->
							<div class="kt-header__topbar">
								@stack('header-user-actions-first')
								@include('MA.inc.header-search')
								@include('MA.inc.header-quick-actions')
								@stack('header-user-actions-last')
								<div id="app" class="kt-margin-r-5">
									@include('MA.inc.header-notifications')
								</div>
								@include('MA.inc.header-duplicate')
								@include('MA.inc.header-settings-link')

								@include('MA.inc.header-language-switcher')
								{{--
										@include('MA.inc.header-mobile-search')
										@include('MA.inc.header-quick-panel')
									--}}
								@include('MA.inc.header-user-bar')
							</div>

							<!-- end:: Header Topbar -->
						</div>
					</div>
				</div>

				<!-- end:: Header -->

				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">

					<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
						@yield('content')
					</div>
				</div>

				@include('MA.inc.footer')
			</div>
		</div>
	</div>
	<!-- end:: Page -->
	@include('MA.inc.quick-panel')

	<!-- begin::Scrolltop -->
	<div id="kt_scrolltop" class="kt-scrolltop"><i class="fa fa-arrow-up"></i></div>
	<!-- end::Scrolltop -->

	<!-- begin::Demo Panel -->
	<div id="kt_demo_panel" class="kt-demo-panel">
		<div class="kt-demo-panel__head">
			<h3 class="kt-demo-panel__title">
				Select A Demo

				<!--<small>5</small>-->
			</h3>
			<a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
		</div>

	</div>
	<!-- end::Demo Panel -->

	@include('MA.inc.footer-scripts')
	@include('MA.inc.global-modals')
	@stack('footer-scripts')

	<script src="{{ asset('js/app.js?ver='.env('FILES_VER')) }}" defer></script>
</body>

<!-- end::Body -->

</html>
