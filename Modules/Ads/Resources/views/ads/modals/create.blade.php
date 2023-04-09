@extends('dashboard.layouts.basic')


@section('content')
    <!--begin::Form-->
    <form action="{{ route('ads.store') }}" method="POST" id="create_ad_form" enctype="multipart/form-data"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="createAdCallback" data-parsley-validate>
        @csrf
        <div class="m-portlet__body">
            <div class="form-group row">
             <div class="fancy-checkbox col-2">
                 <label for="is_featured">{{ __('ads::ad.is_featured') }}</label>
                <input name="is_featured" id="is_featured" type="checkbox" class="">
            </div>
            </div>
            <div class="form-group row">

                <div class="col-6">
                    <label for="title">{{ __('ads::ad.title') }}</label>
                    <input name="title" id="title" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.please_enter_the_ad') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_ad') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('ads::ad.title_max_is_150_characters_long') }}">
                </div>
                <div class="col-6">
                    <label for="title_ar">{{ __('ads::ad.title_ar') }}</label>
                    <input name="title_ar" id="title_ar" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.title_ar') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.title_ar') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('ads::ad.title_ar') }} 150">
                </div>
                <div class="col-6">
                    <label for="sub_title_en">{{ __('ads::ad.sub_title_en') }}</label>
                    <input name="sub_title_en" id="sub_title_en" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.sub_title_en') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.sub_title_en') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('ads::ad.sub_title_en') }} 150">
                </div>
                <div class="col-6">
                    <label for="sub_title_ar">{{ __('ads::ad.sub_title_ar') }}</label>
                    <input name="sub_title_ar" id="sub_title_ar" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.sub_title_ar') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.sub_title_ar') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('ads::ad.sub_title_ar') }} 150">
                </div>
                <div class="col-6">
                    <label for="link">{{ __('ads::ad.link') }}</label>
                    <input name="link" id="link" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.please_enter_the_ad') }}"
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_ad') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('ads::ad.link_max_is_150_characters_long') }}">
                </div>
            </div>
            <div class="form-group row">
                {{-- <div class="col-4">
                    <label>{{ trans('ads::ad.start_date') }}</label>
                    <input name="start_date" autocomplete="off" class="form-control datetimepicker-init" required
                        data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_starting_date') }}"
                        data-parsley-trigger="change focusout" placeholder="{{ trans('ads::ad.select_start_date') }}"
                        data-parsley-trigger="change focusout" />
                </div>
                <div class="col-4">
                    <label>{{ trans('ads::ad.end_date') }}</label>
                    <input name="end_date" autocomplete="off" class="form-control datetimepicker-init"
                        placeholder="{{ trans('ads::ad.select_end_date') }}" data-parsley-trigger="change focusout" />
                </div> --}}
                <div class="col-4">
                    <label>{{ trans('ads::ad.image') }}</label>
                    <input name="image" autocomplete="off" type="file" class="form-control" required
                        data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_image') }}"
                        data-parsley-trigger="change focusout" placeholder="{{ trans('ads::ad.select_image') }}"
                        data-parsley-trigger="change focusout" />
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success">{{ __('main.submit') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('main.reset') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

    <!-- Callback function -->
    <script>
        $('.datetimepicker-init').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy-mm-dd hh:ii',
        showMeridian: true,
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>',
        },
    });
    </script>
    <script>
        function createAdCallback() {
            // Reload datatable
            $('#ads_table').DataTable().ajax.reload(null, false);
            $('#vcxl_modal').modal('toggle');

        }
    </script>

