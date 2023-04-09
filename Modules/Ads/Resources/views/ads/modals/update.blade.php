@extends('dashboard.layouts.basic')

@section('content')
    <!--begin::Form-->
    <form action="{{ route('ads.update') }}" method="POST" id="update_ad_form"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="updateadCallback" data-parsley-validate enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $ad->id }}" />
        <div class="m-portlet__body">
            <div class="form-group row">
                <div class="fancy-checkbox col-2">
                    <label for="is_featured">{{ __('ads::ad.is_featured') }}</label>
                    <input name="is_featured" id="is_featured" type="checkbox"
                        @if ($ad->is_featured == 1) checked=checked @endif class="">
                </div>
            </div>
            <div class="form-group row">

                <div class="col-6">
                    <label for="title">{{ __('ads::ad.title') }}</label>
                    <input name="title" id="title" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.please_enter_the_ad') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_ad') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150" value="{{$ad->title}}"
                        data-parsley-maxlength-message="{{ __('ads::ad.title_max_is_150_characters_long') }}">
                </div>
                <div class="col-6">
                    <label for="title_ar">{{ __('ads::ad.title_ar') }}</label>
                    <input name="title_ar" id="title_ar" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.title_ar') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.title_ar') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150" value="{{$ad->title_ar}}"
                        data-parsley-maxlength-message="{{ __('ads::ad.title_ar') }} 150">
                </div>
                <div class="col-6">
                    <label for="sub_title_en">{{ __('ads::ad.sub_title_en') }}</label>
                    <input name="sub_title_en" id="sub_title_en" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.sub_title_en') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.sub_title_en') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150" value="{{$ad->sub_title_en}}"
                        data-parsley-maxlength-message="{{ __('ads::ad.sub_title_en') }} 150">
                </div>
                <div class="col-6">
                    <label for="sub_title_ar">{{ __('ads::ad.sub_title_ar') }}</label>
                    <input name="sub_title_ar" id="sub_title_ar" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.sub_title_ar') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.sub_title_ar') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150" value="{{$ad->sub_title_ar}}"
                        data-parsley-maxlength-message="{{ __('ads::ad.sub_title_ar') }} 150">
                </div>
                <div class="col-6">
                    <label for="link">{{ __('ads::ad.link') }}</label>
                    <input name="link" id="link" type="text" class="form-control"
                        placeholder="{{ __('ads::ad.please_enter_the_ad') }}"
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_ad') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('ads::ad.link_max_is_150_characters_long') }}"
                        value="{{ $ad->link}}">
                </div>
            </div>
            {{-- <div class="form-group row">
                <div class="col-4">
                    <label>{{ trans('ads::ad.start_date') }}</label>
                    <input name="start_date" autocomplete="off" class="form-control datetimepicker-init" required
                        data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_ad') }}"
                        data-parsley-trigger="change focusout" value="{{ $ad->start_date }}"
                        placeholder="{{ trans('ads::ad.select_start_date') }}"
                        data-parsley-trigger="change focusout" />
                </div>
                <div class="col-4">
                    <label>{{ trans('ads::ad.end_date') }}<small class="text-muted"> -
                            {{ __('ads::ad.optional') }}</small></label>
                    <input name="end_date" autocomplete="off" class="form-control datetimepicker-init"
                        value="{{ $ad->end_date }}" placeholder="{{ trans('ads::ad.select_end_date') }}"
                        data-parsley-trigger="change focusout" />
                </div> --}}
                <div class="col-4">
                    <label>{{ trans('ads::ad.image') }}</label>
                    <input name="image" autocomplete="off" type="file" class="form-control" required
                        data-parsley-required
                        data-parsley-required-message="{{ __('ads::ad.please_enter_the_image') }}"
                        data-parsley-trigger="change focusout" placeholder="{{ trans('ads::ad.select_image') }}"
                        data-parsley-trigger="change focusout" />
                    @switch($ad->id)
                        @case(1)
                            <strong>Image dimensions : 1400 x 100</strong>
                            @break
                        @case(2)
                            <strong>Image dimensions :  400 x 200</strong>
                            @break
                        @case(3)
                            <strong>Image dimensions : 400 x 200</strong>
                            @break
                        @default

                    @endswitch
                        <img src="{{ asset('storage/'.$ad->image) }}" class="w-100" alt="">
                </div>
            </div>
        </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit"
                            class="btn btn-success btn-brand">{{ trans('ads::ad.update_ad') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
<!--end::Form-->
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
    $('.m_selectpicker').selectpicker();
</script>
<!-- Callback function -->
<script>
    function updateadCallback() {
        // Close modal
        $('#vcxl_modal').modal('toggle');
        // Reload datatable
        $('#ads_table').DataTable().ajax.reload(null, false);
    }
</script>
