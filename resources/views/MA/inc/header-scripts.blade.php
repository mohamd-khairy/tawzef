<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{URL::asset('MA/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->

<!--begin:: Global Mandatory Vendors -->
<link href="{{URL::asset('MA/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
{{-- <link href="{{URL::asset('MA/assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" /> --}}
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/general/jquery.MA-editable/css/jquery.MA-editable.css')}}" rel="stylesheet" type="text/css" />
<!--end:: Global Optional Vendors -->

<link href="{{URL::asset('MA/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

<!--begin::MA Styles(used by all pages) -->
<link rel="stylesheet" href="{{URL::asset('MA/assets/css/parsley.css')}}" />
<link rel="stylesheet" href="{{URL::asset('MA/assets/css/MA.css?ver='.env('FILES_VER'))}}" />
<link rel="stylesheet" href="{{URL::asset('MA/assets/css/jstree.min.css')}}" />
<link rel="stylesheet" href="{{URL::asset('MA/assets/css/animate.min.css')}}" />
<!--end::MA Styles(used by all pages)-->

<link rel="stylesheet" href="{{URL::asset('MA/assets/css/bootstrap-tagsinput.css')}}" />
<link rel="stylesheet" href="{{URL::asset('MA/assets/packages/bootstrapValidator/css/bootstrapValidator.css')}}" />
<link rel="stylesheet" href="{{URL::asset('MA/assets/css/upload_button.css')}}" />
<link rel="stylesheet" href="{{URL::asset('MA/assets/css/html5lightbox.css')}}" />

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

<style>
    .bootstrap-tagsinput {
        width: 100% !important;
    }
</style>

<!--begin::Global Theme Styles(used by all pages) -->
<link href="{{URL::asset('MA/assets/demo/demo2/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles -->

@if(LaravelLocalization::getCurrentLocale() == 'ar')
<!--begin::Global RTL) -->
<link href="{{URL::asset('MA/assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/css/MA-rtl.css?ver='.env('FILES_VER'))}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('MA/assets/vendors/custom/datatables/datatables.bundle.rtl.min.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global RTL) -->
@endif
{{-- <link href="{{URL::asset('MA/assets/css/additions.css')}}" rel="stylesheet" type="text/css" /> --}}

<!--begin::Layout Skins(used by all pages) -->

<!--end::Layout Skins -->

<!-- Favicon -->
<link rel="shortcut icon" href="{{URL::asset('front/assets/img/fav.png')}}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="icon" type="image/png" sizes="192x192" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('/front/assets/img/fav.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/front/assets/img/fav.png')}}">

<link rel="manifest" href="{{URL::asset('MA/assets/img/manifest.json')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{URL::asset('/front/assets/img/fav.png')}}">
<meta name="theme-color" content="#ffffff">

<!-- TOKEN -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.min.css">

<script>
    var globalForceGet = false;
    var app_name = "{!! env('APP_NAME') !!}";
</script>


<meta name="csrf-token" content="{{ csrf_token() }}" />
@include('MA.inc.js-trans')
@include('MA.inc.js-objects')
<style>
    .alert[data-notify] {
        z-index: 9999 !important;
    }

    div.dataTables_wrapper div.dataTables_processing {
        z-index: 1;
    }
</style>
