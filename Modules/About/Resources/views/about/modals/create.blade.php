@extends('MA.layouts.main')


@section('content')
    <style>
        .fade:not(.show) {
            opacity: 1
        }
    </style>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title" data-loadtitle>{{ __('about::about.create_about') }}</h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('home') }}" class="kt-subheader__breadcrumbs-home"><i class="fa fa-home"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>

                    @if (auth()->user()->hasPermission('index-about'))
                        <a href="{{ route('about.index') }}" data-load
                            class="kt-subheader__breadcrumbs-link">{{ __('about::about.about') }}</a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    @else
                        <a href="#" class="kt-subheader__breadcrumbs-link">{{ __('about::about.about') }}</a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    @endif

                    <span
                        class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">{{ __('about::about.create_about') }}</span>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">{{ __('about::about.create_about') }}</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="{{ url()->previous() }}" data-load class="btn btn-clean kt-margin-r-10">
                                    <i class="la la-arrow-left"></i>
                                    <span class="kt-hidden-mobile">{{ __('main.back') }}</span>
                                </a>
                            </div>
                        </div>


                        <div class="kt-portlet__body">
                            <!--begin::Form-->
                            <form action="{{ route('about.store') }}" method="POST" id="create_about_form"
                                enctype="multipart/form-data"
                                class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
                                data-callback="createAboutCallback" data-parsley-validate>
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="fancy-checkbox">
                                        <input name="is_featured" id="is_featured" type="checkbox">
                                        <label for="is_featured">{{ __('blog::blog.is_featured') }}</label>
                                    </div>
                                    <div class="form-group row">

                                        <div class="form-group row col-12">

                                            <div class="col-12 repeater">
                                                <div data-repeater-list="translations">
                                                    <div data-repeater-item class="row">
                                                        <div class="col-6 mt-5">
                                                            <label
                                                                for="language_id">{{ __('about::about.language') }}</label>
                                                            <select class="form-control" id="language_id" name="language_id"
                                                                required data-parsley-required
                                                                data-parsley-required-message="{{ __('about::about.please_select_the_language') }}"
                                                                data-parsley-trigger="change focusout">
                                                                <option value="" selected disabled>
                                                                    {{ __('about::about.language') }}</option>
                                                                @foreach ($languages as $language)
                                                                    <option value="{{ $language->id }}"
                                                                        @if ($language->id == 1) selected @endif>
                                                                        {{ $language->code }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-6 mt-5">
                                                            <label for="title">{{ __('about::about.title') }}</label>
                                                            <input name="title" id="title" type="text"
                                                                class="form-control"
                                                                placeholder="{{ __('about::about.title') }}"
                                                                data-parsley-maxlength="150"
                                                                data-parsley-maxlength-message="{{ __('about::about.about_max_is_150_characters_long') }}">
                                                        </div>

                                                        <div class="col-12 mt-5">
                                                            <label
                                                                for="description">{{ __('about::about.description') }}</label>
                                                            <textarea name="description" id="description-0" class="form-control description"
                                                                placeholder="{{ __('about::about.please_enter_the_about') }}" required data-parsley-required
                                                                data-parsley-required-message="{{ __('about::about.description') }}" data-parsley-trigger="change focusout"
                                                                cols="30" rows="10"></textarea>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 mt-auto">
                                                            {{-- <label class="control-label">&nbsp;</label> --}}
                                                            <a href="javascript:;" data-repeater-delete
                                                                class="btn btn-brand data-repeater-delete">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="javascript:;" data-repeater-create id="repeater_btn"
                                                    class="btn">
                                                    <i class="fa fa-plus"></i> {{ trans('about::about.add_translation') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">{{ __('about::about.image') }} </label>
                                            <input type="file" name="image" class="form-control" id="image">
                                            <strong>Image dimensions :  570 x 370 </strong>
                                        </div>

                                    </div>
                                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                        <div class="m-form__actions m-form__actions--solid">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button type="submit"
                                                        class="btn btn-success">{{ __('main.submit') }}</button>
                                                    <button type="reset"
                                                        class="btn btn-secondary">{{ __('main.reset') }}</button>
                                                    {{-- <a href="{{route('about.about.create')}}" data-load class="btn btn-brand btn-icon-sm">
                        <i class="flaticon2-plus"></i> {{trans('about::about.create_new')}}
                        </a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
    </div>
@endsection

<!--end::Form-->
@push('footer-scripts')
    <!-- Callback function -->
    <script>
        function createAboutCallback() {
            // Close modal
            // $('#vcxl_modal').modal('toggle');
            // Reload datatable
            about_table.ajax.reload(null, false);
        }
    </script>

    <script src="{{ asset('MA/assets/js/repeater.js') }}" type="text/javascript"></script>
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
                }],
                show: function() {
                    // Get items count
                    var items_count = $('.repeater').repeaterVal().translations.length;
                    var current_index = items_count - 1;

                    /* Summernote */
                    // Update the textarea id
                    $(this).find('.note-editor').remove(); // Remove repeated summernote
                    $(this).find('.description').attr('id', 'description-' + current_index);

                    $('#description-' + current_index).summernote({
                        imageTitle: {
                            specificAltField: true,
                        },
                        popover: {
                            image: [
                                ['imagesize', ['imageSize100', 'imageSize50',
                                    'imageSize25']],
                                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                                ['remove', ['removeMedia']],
                                ['custom', ['imageTitle']],
                            ],
                        },
                        height: '300px',
                    });

                    // Showing the item
                    $(this).show();
                }
            });
            $('#description-' + '0').summernote({
                imageTitle: {
                    specificAltField: true,
                },
                height: 150, //set editable area's height

            });
        });
    </script>
    <script>
        $('.icon-font').iconpicker();
    </script>
@endpush
