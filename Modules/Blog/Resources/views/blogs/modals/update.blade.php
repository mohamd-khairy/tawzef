@extends('dashboard.layouts.basic')

@section('content')
<!--begin::Form-->
<form action="{{route('blogs.update')}}" method="POST" id="update_blog_form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="updateBlogCallback" data-parsley-validate enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$blog->id}}" />
    <div class="m-portlet__body">

        <div class="form-group row">
            <div class="fancy-checkbox col-12 mb-2">
                <input name="is_featured" id="is_featured" type="checkbox" @if($blog->is_featured == 1) checked=checked @endif>
                <label for="is_featured">{{__('blog::blog.is_featured')}}</label>
            </div>
            <div class="col-6 pr-0 form-group">
                <select class="form-control" id="category_id" name="category_id" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_select_the_blog_category')}}" data-parsley-trigger="change focusout">
                    <option value="" selected disabled>{{__('blog::blog.blog_category')}}</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == $blog->category_id) selected @endif>{{$category->value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 repeater">
                <div data-repeater-list="translations">
                    @foreach ($blog->translations as $index => $translation )
                    <div data-repeater-item class="row">
                        <div class="col-6">
                            {{-- <label for="language_id">{{__('blog::blog.language')}}</label> --}}
                            <select class="form-control" id="language_id" name="language_id" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_select_the_language')}}" data-parsley-trigger="change focusout">
                                <option value="" disabled>{{__('blog::blog.language')}}</option>
                                @foreach ($languages as $language)
                                <option value="{{$language->id}}" @if ($translation->language_id == $language->id) selected @endif>{{$language->code}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            {{-- <label for="blog">{{__('blog::blog.blog')}}</label> --}}
                            <input name="title" id="title" type="text" class="form-control" placeholder="{{__('blog::blog.please_enter_the_blog')}}" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_enter_the_blog')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('blog::blog.blog_max_is_150_characters_long')}}" value="{{$translation->title}}">
                        </div>
                        <div class="col-lg-12">
                            <label for="description">{{__('blog::blog.description')}} <small class="text-muted"> - {{__('blog::blog.optional')}}</small></label>
                            <textarea rows="6" name="description" id="description-{{$index}}" class="form-control description" placeholder="{{__('blog::blog.enter_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('blog::blog.description_max_is_4294967295_characters_long')}}" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_enter_the_blog')}}">{{$translation->description}}</textarea>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="meta_title">{{__('blog::blog.meta_title')}}</label>
                            <input name="meta_title" id="meta_title" type="text" class="form-control" value="{{$translation->meta_title}}" placeholder="{{__('blog::blog.meta_title')}}"  data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('blog::blog.title_max_is_150_characters_long')}}">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="meta_description">{{__('blog::blog.meta_description')}} <small class="text-muted"> - {{__('blog::blog.optional')}}</small></label>
                            <textarea rows="6" name="meta_description" id="meta_description" class="form-control" placeholder="{{__('blog::blog.meta_description')}}" >{{$translation->meta_description}}</textarea>
                        </div>
                        <div class="col-md-2 col-sm-2 mt-2">
                            {{-- <label class="control-label">&nbsp;</label> --}}
                            <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @if (!$blog->translations->count())
                    <div data-repeater-item class="row">
                        <div class="col-6">
                            {{-- <label for="language_id">{{__('blog::blog.language')}}</label> --}}
                            <select class="form-control" id="language_id" name="language_id" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_select_the_language')}}" data-parsley-trigger="change focusout">
                                <option value="" selected disabled>{{__('blog::blog.language')}}</option>
                                @foreach ($languages as $language)
                                <option value="{{$language->id}}" @if($language->id == 1) selected @endif>{{$language->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            {{-- <label for="blog">{{__('blog::blog.blog')}}</label> --}}
                            <input name="blog" id="blog" type="text" class="form-control" placeholder="{{__('blog::blog.please_enter_the_blog')}}" required data-parsley-required data-parsley-required-message="{{__('blog::blog.please_enter_the_blog')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('blog::blog.blog_max_is_150_characters_long')}}">
                        </div>
                        <div class="col-lg-12">
                            <label for="description">{{__('blog::blog.description')}} <small class="text-muted"> - {{__('blog::blog.optional')}}</small></label>
                            <textarea rows="6" name="description" id="description-0" class="form-control description" placeholder="{{__('blog::blog.enter_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('blog::blog.description_max_is_4294967295_characters_long')}}"></textarea>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="meta_title">{{__('blog::blog.meta_title')}}</label>
                            <input name="meta_title" id="meta_title" type="text" class="form-control" value="" placeholder="{{__('blog::blog.meta_title')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('blog::blog.title_max_is_150_characters_long')}}">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="meta_description">{{__('blog::blog.meta_description')}} <small class="text-muted"> - {{__('blog::blog.optional')}}</small></label>
                            <textarea rows="6" name="meta_description" id="meta_description" class="form-control" value="" placeholder="{{__('blog::blog.meta_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('blog::blog.description_max_is_4294967295_characters_long')}}"></textarea>
                        </div>
                        <div class="col-md-2 col-sm-2 mt-2">
                            {{-- <label class="control-label">&nbsp;</label> --}}
                            <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
                <a href="javascript:;" data-repeater-create id="repeater_btn" class="btn">
                    <i class="fa fa-plus"></i> {{trans('blog::blog.add_blog_translation')}}
                </a>
            </div>
            <div class="form-group">
                <div class="row col-lg-3">
                    <label for="attachments">{{__('informations::information.attachments')}} <small class="text-muted"> - {{__('informations::information.optional')}} {{trans('informations::information.only_one_image')}}</small></label>
                    <input type="file" name="image" class="form-control" id="attachments" data-multiple-caption="{count} {{trans('informations::information.files_selected')}}" />
                    <strong>Image dimensions : 350 x 200</strong>

                    <img src="{{ asset('storage/'.$blog->image) }}" class="w-100" alt="">
                </div>
            </div>
    </div>
    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-success btn-brand">{{trans('blog::blog.update_blog')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

<!--end::Form-->

<!-- Callback function -->
<script>
    function updateBlogCallback() {
        // Close modal
        $('#vcxl_modal').modal('toggle');
        // Reload datatable
        $('#blogs_table').DataTable().ajax.reload(null, false);
    }
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
            }],
            show: function () {
                // Get items count
                var items_count = $('.repeater').repeaterVal().translations.length;
                var current_index = items_count - 1;

                /* Summernote */
                // Update the textarea id
                $(this).find('.note-editor').remove(); // Remove repeated summernote
                $(this).find('.description').attr('id', 'description-'+current_index);

                $('#description-'+current_index).summernote({
                    imageTitle: {
                                specificAltField: true,
                            },
                    popover: {
                        image: [
                            ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
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
        @if($blog->translations->count())
        @foreach ($blog->translations as $index => $translation)
        // Summernote
        $('#description-'+'{{$index}}').summernote({
                    imageTitle: {
                                specificAltField: true,
                            },
                    popover: {
                        image: [
                            ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                            ['float', ['floatLeft', 'floatRight', 'floatNone']],
                            ['remove', ['removeMedia']],
                            ['custom', ['imageTitle']],
                        ],
                    },
                    height: '300px',
              });
        @endforeach
    @else
        // Summernote
        $('#description-'+'0').summernote({
                    imageTitle: {
                                specificAltField: true,
                            },
                    popover: {
                        image: [
                            ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                            ['float', ['floatLeft', 'floatRight', 'floatNone']],
                            ['remove', ['removeMedia']],
                            ['custom', ['imageTitle']],
                        ],
                    },
                    height: '300px',
              });
    @endif
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
<script>
    function deleteAttachment(id) {
        KTApp.blockPage({
            overlayColor: "#000000",
            type: "loader",
            state: "success",
            message: "{{trans('main.please_wait')}}"
        });
        $.ajax({
            url: "{{route('delete.media')}}",
            type: "POST",
            data: {
                id: id
            },
            success: function(response) {
                // UnblockUI
                KTApp.unblockPage();

                // Show notification
                if (response.status) {
                    // Remove attachment div
                    $('#card-' + id).remove();
                } else {
                    showNotification(response.message, "{{trans('main.error')}}", 'la la-warning', null, 'danger', true, true, true);
                }
            },
            error: function(xhr, error_text, statusText) {
                // UnblockUI
                KTApp.unblockPage();

                if (xhr.status == 401) {
                    // Unauthorized
                    if (xhr.responseJSON.error) {
                        setTimeout(function() {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            showMsg(form, 'danger', xhr.responseJSON.error, true);
                        }, 500);
                        showNotification(xhr.responseJSON.error, "{{trans('main.error')}}", 'la la-warning', null, 'danger', true, true, true);
                    } else {
                        setTimeout(function() {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            showMsg(form, 'danger', statusText, true);
                        }, 500);
                        showNotification(statusText, "{{trans('main.error')}}", 'la la-warning', null, 'danger', true, true, true);
                    }
                } else if (xhr.status == 422) {
                    // HTTP_UNPROCESSABLE_ENTITY
                    if (xhr.responseJSON.errors) {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                        $.each(xhr.responseJSON.errors, function(index, error) {
                            setTimeout(function() {
                                if (index === 0) {
                                    var remove_previous_alerts = true;
                                } else {
                                    var remove_previous_alerts = false;
                                }
                                showMsg(form, 'danger', error.message, remove_previous_alerts);
                            }, 500);
                            showNotification(error.message, "{{trans('main.error')}}", 'la la-warning', null, 'danger', true, true, true);
                        });
                    } else {
                        setTimeout(function() {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            showMsg(form, 'danger', statusText, true);
                        }, 500);
                        showNotification(statusText, "{{trans('main.error')}}", 'la la-warning', null, 'danger', true, true, true);
                    }
                } else if (xhr.status == 500) {
                    // Internal Server Error
                    var error = xhr.responseJSON.message;
                    if (xhr.responseJSON.error) {
                        setTimeout(function() {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            showMsg(form, 'danger', xhr.responseJSON.error, true);
                        }, 500);
                        showNotification(xhr.responseJSON.error, "{{trans('main.error')}}", 'la la-warning', null, 'danger', true, true, true);
                    } else {
                        setTimeout(function() {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            showMsg(form, 'danger', statusText, true);
                        }, 500);
                        showNotification(statusText, "{{trans('main.error')}}", 'la la-warning', null, 'danger', true, true, true);
                    }
                }
            }
        });
    }
</script>
@endpush