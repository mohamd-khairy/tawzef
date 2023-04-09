@extends('dashboard.layouts.basic')


@section('content')
    <style>
        .fade:not(.show) {
            opacity: 1
        }

    </style>
    <!--begin::Form-->
    <form action="{{ route('socials_content.store') }}" method="POST" id="create_socials_form" enctype="multipart/form-data"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="createAboutCallback" data-parsley-validate>
        @csrf
        <div class="m-portlet__body">
            <div class="form-group row">
                <input type="hidden" name="type" value="social">
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
                                        data-parsley-maxlength-message="{{ __('cms::cms.socials_max_is_150_characters_long') }}">
                                </div>
                                <div class="col-md-2 col-sm-2 mt-auto">
                                    {{-- <label class="control-label">&nbsp;</label> --}}
                                    <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;" data-repeater-create id="repeater_btn" class="btn">
                            <i class="fa fa-plus"></i> {{ trans('cms::cms.add_translation') }}
                        </a>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="attachments">{{__('informations::information.attachments')}} <small class="text-muted"> - {{__('informations::information.optional')}} {{trans('informations::information.only_one_image')}}</small></label>
                        <input type="file" name="image" class="form-control" id="attachments" data-multiple-caption="{count} {{trans('informations::information.files_selected')}}" />
                        <strong>Image dimensions :  225 x 225 </strong>
                    </div>
                    <div class="col-lg-6">
                        <label for="link">{{__('cms::cms.link')}} <small class="text-muted"> - {{__('informations::information.optional')}} {{trans('informations::information.only_one_image')}}</small></label>
                        <input type="text" name="link" class="form-control" id="link" data-multiple-caption="{count} {{trans('informations::information.files_selected')}}" />
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success">{{ __('main.submit') }}</button>
                            <button type="reset" class="btn btn-secondary">{{ __('main.reset') }}</button>
                            {{-- <a href="{{route('socials_content.create')}}" data-load class="btn btn-brand btn-icon-sm">
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
            socials_table.ajax.reload(null, false);
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
                                    'imageSize25'
                                ]],
                                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                                ['remove', ['removeMedia']],
                                ['custom', ['imageAttributes']],
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
                popover: {
                    image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageAttributes']],
                    ],
                },
                height: 150, //set editable area's height
                toolbar: [
                    // [groupName, [list of button]]
                    // ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['style', ['bold', 'underline']],

                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'hr']],
                    ['misc', ['fullscreen', 'codeview', 'undo', 'redo']]
                ]
            });
        });
    </script>
    <script>
        $('.icon-font').iconpicker();
    </script>
@endpush
