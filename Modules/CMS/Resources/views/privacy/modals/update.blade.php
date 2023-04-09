@extends('MA.layouts.main')

@section('content')
    <style>
        .fade:not(.show) {
            opacity: 1
        }
    </style>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Subheader -->
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title" data-loadtitle>{{ __('cms::cms.create_privacy') }}</h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route('home') }}" class="kt-subheader__breadcrumbs-home"><i class="fa fa-home"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>

                    @if (auth()->user()->hasPermission('index-privacies'))
                        <a href="{{ route('privacies.index') }}" data-load
                            class="kt-subheader__breadcrumbs-link">{{ __('cms::cms.privacy') }}</a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    @else
                        <a href="#" class="kt-subheader__breadcrumbs-link">{{ __('cms::cms.privacy') }}</a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    @endif

                    <span
                        class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">{{ __('cms::cms.create_privacy') }}</span>
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
                                <h3 class="kt-portlet__head-title">{{ __('cms::cms.create_privacy') }}</h3>
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
                            <form action="{{ route('privacies.update') }}" method="POST" id="update_privacy_form"
                                class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
                                data-callback="updateAboutCallback" data-parsley-validate enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $privacy->id }}" />
                                <input type="hidden" name="type" value="privacy_policy">
                                <div class="m-portlet__body">
                                    <div class="form-group row col-12">
                                        <div class="col-6 mt-5">
                                            <label for="title_en">{{ __('cms::cms.title_en') }}</label>
                                            <input name="title_en" id="title_en" type="text"
                                                value="{{ $privacy->title_en }}" class="form-control"
                                                placeholder="{{ __('cms::cms.title_en') }}" data-parsley-maxlength="150"
                                                data-parsley-maxlength-message="{{ __('cms::cms.privacy_max_is_150_characters_long') }}">
                                        </div>
                                        <div class="col-6 mt-5">
                                            <label for="title_ar">{{ __('cms::cms.title_ar') }}</label>
                                            <input name="title_ar" id="title_ar" type="text"
                                                value="{{ $privacy->title_ar }}" class="form-control"
                                                placeholder="{{ __('cms::cms.title_ar') }}" data-parsley-maxlength="150"
                                                data-parsley-maxlength-message="{{ __('cms::cms.privacy_max_is_150_characters_long') }}">
                                        </div>
                                        <div class="col-12 mt-5">
                                            <label for="description_en">{{ __('cms::cms.description_en') }}</label>
                                            <textarea name="description_en" id="description_en" class="form-control description_en"
                                                placeholder="{{ __('cms::cms.please_enter_the_privacy') }}" required data-parsley-required
                                                data-parsley-required-message="{{ __('cms::cms.description_en') }}" data-parsley-trigger="change focusout"
                                                cols="30" rows="10">{{ $privacy->description_en }}</textarea>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <label for="description_ar">{{ __('cms::cms.description_ar') }}</label>
                                            <textarea name="description_ar" id="description_ar" class="form-control description_ar"
                                                placeholder="{{ __('cms::cms.please_enter_the_privacy') }}" required data-parsley-required
                                                data-parsley-required-message="{{ __('cms::cms.description_ar') }}" data-parsley-trigger="change focusout"
                                                cols="30" rows="10">{{ $privacy->description_ar }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="submit"
                                                    class="btn btn-success btn-brand">{{ trans('cms::cms.update_privacy') }}</button>
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
@endsection

