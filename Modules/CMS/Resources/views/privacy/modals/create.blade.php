@extends('dashboard.layouts.basic')


@section('content')
    <style>
        .fade:not(.show) {
            opacity: 1
        }

    </style>
    <!--begin::Form-->
    <form action="{{ route('privacies.store') }}" method="POST" id="create_privacies_form" enctype="multipart/form-data"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="createAboutCallback" data-parsley-validate>
        @csrf
        <div class="m-portlet__body">
            <div class="form-group row">
                <input type="hidden" name="type" value="privacy_policy">
                <div class="form-group row col-12">
                    <div class="col-12 repeater">
                        <div data-repeater-list="translations">
                            <div data-repeater-item class="row">
                                <div class="col-6 mt-5">
                                    <label for="language_id">{{ __('cms::cms.language') }}</label>
                                    <select class="form-control" id="language_id" name="language_id" required
                                        data-parsley-required
                                        data-parsley-required-message="{{ __('cms::cms.please_select_the_language') }}"
                                        data-parsley-trigger="change focusout">
                                        <option value="" selected disabled>{{ __('cms::cms.language') }}</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}"
                                                @if ($language->id == 1) selected @endif>{{ $language->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 mt-5">
                                    <label for="title">{{ __('cms::cms.title') }}</label>
                                    <input name="title" id="title" type="text" class="form-control"
                                        placeholder="{{ __('cms::cms.title') }}" data-parsley-maxlength="150"
                                        data-parsley-maxlength-message="{{ __('cms::cms.privacies_max_is_150_characters_long') }}">
                                </div>

                                <div class="col-12 mt-5">
                                    <label for="description">{{ __('cms::cms.description') }}</label>
                                    <textarea name="description" id="description-0" class="form-control description"
                                        placeholder="{{ __('cms::cms.please_enter_the_privacies') }}" required
                                        data-parsley-required
                                        data-parsley-required-message="{{ __('cms::cms.description') }}"
                                        data-parsley-trigger="change focusout" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-md-2 col-sm-2 mt-auto">
                                    {{-- <label class="control-label">&nbsp;</label> --}}
                                    <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;" data-repeater-create id="repeater_btn" class="btn btn btn-primary">
                            <i class="fa fa-plus"></i> {{ trans('cms::cms.add_translation') }}
                        </a>
                    </div>
                </div>

            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success">{{ __('main.submit') }}</button>
                            <button type="reset" class="btn btn-secondary">{{ __('main.reset') }}</button>
                            {{-- <a href="{{route('privacies.create')}}" data-load class="btn btn-brand btn-icon-sm">
                        <i class="flaticon2-plus"></i> {{trans('cms::cms.create_new')}}
                        </a> --}}
                        </div>
                    </div>
                </div>
            </div>
    </form>
@endsection

<!--end::Form-->
@push('scripts')
    <!-- Callback function -->
    <script>
        function createAboutCallback() {
            // Close modal
            $('#vcxl_modal').modal('toggle');
            // Reload datatable
            privacies_table.ajax.reload(null, false);
        }
    </script>

    <script src="{{ asset('MA/assets/js/repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('MA/assets/js/summernote-image-attributes.js') }}"></script>

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

                    // Showing the item
                    $(this).show();
                }
            });

        });
    </script>
    <script>
        $('.icon-font').iconpicker();
    </script>
@endpush
