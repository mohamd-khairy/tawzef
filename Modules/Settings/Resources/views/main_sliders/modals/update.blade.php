@extends('dashboard.layouts.basic')

@section('content')
<style>
    .fade:not(.show) {
        opacity: 1
    }
</style>
<!--begin::Form-->
<form action="{{route('settings.main_sliders.update')}}" method="POST" id="update_main_slider_form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="updatemainSliderCallback" data-parsley-validate enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$main_slider->id}}" />
    <div class="m-portlet__body">
        <div class="col-12">
            <div class="form-group row">
                <div class="col-12">
                    <label for="title_en">{{__('settings::settings.title_en')}}</label>
                    <input name="title_en" value="{{$main_slider->title_en}}" id="title_en" type="text" class="form-control" placeholder="{{__('settings::settings.please_enter_the_title')}}" required data-parsley-required data-parsley-required-message="{{__('settings::settings.please_enter_the_title')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('settings::settings.title_max_is_150_characters_long')}}">
                </div>
                <div class="col-12">
                    <label for="title_ar">{{__('settings::settings.title_ar')}}</label>
                    <input name="title_ar" value="{{$main_slider->title_ar}}" id="title_ar" type="text" class="form-control" placeholder="{{__('settings::settings.please_enter_the_title')}}" required data-parsley-required data-parsley-required-message="{{__('settings::settings.please_enter_the_title')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('settings::settings.title_max_is_150_characters_long')}}">
                </div>
            </div>
            <div class="form-group col-12 position-relative">
                <div class="col-12 mt-5">
                    <label for="image">{{__('settings::settings.image')}}</label>
                    <input name="image" id="image" type="file" placeholder="" data-parsley-trigger="change focusout">
                    <strong>Image dimensions : 1400 x 420</strong>

                    <br>
                    <a href="{{asset('storage/'.$main_slider->image)}}" target="_blank">{{__('settings::settings.attachments')}}</a>
                </div>
                {{-- <div class="col-12 mt-5 position-relative">
                    <label for="link">{{__('settings::settings.link')}}</label>
                    <input name="link" id="link" value="{{$main_slider->link}}" type="link" class="form-control" placeholder="{{__('settings::settings.please_enter_the_link')}}" data-parsley-required-message="{{__('settings::settings.please_enter_the_link')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('settings::settings.link_max_is_150_characters_long')}}">
                </div> --}}

            </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-brand">{{trans('settings::settings.update_mainslider')}}</button>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection
<!--end::Form-->
<!-- Callback function -->
<script>
    function updatemainSliderCallback() {
        // Close modal
        // Reload datatable
        $('#fast_modal').modal('toggle');
        var main_sliders_table = $('#main_sliders_table').DataTable();
        main_sliders_table.ajax.reload(null, false);
    }
    $('.icon-font').iconpicker();
</script>

@push('scripts')
    <script src="{{asset('MA/assets/js/repeater.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({
                // (Required if there is a nested repeater)
                // Specify the configuration of the nested repeaters.
                // Nested configuration follows the same format as the base configuration,
                // supporting options "defaultValues", "show", "hide", etc.
                // Nested repeaters additionally require a "selector" field.
                repeaters: [{
                    // (Required)
                    // Specify the jQuery selector for this nested repeater
                    selector: '.inner-repeater'
                }]
            });
        });
    </script>
    <script>
        // Initialize select picker for repeated items
        $("#repeater_btn").click(function() {
            setTimeout(function() {
                // $(".selectpicker").selectpicker('refresh');
            }, 100);
        });
    </script>
@endpush
