@extends('dashboard.layouts.basic')


@section('content')
<!--begin::Form-->
<form action="{{route('careers.store')}}" method="POST" id="create_career_form" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="createCareerCallback" data-parsley-validate>
    @csrf
    <div class="m-portlet__body">
        <div class="fancy-checkbox">
            <input name="is_featured" id="is_featured" type="checkbox">
            <label for="is_featured">{{__('careers::career.is_featured')}}</label>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label>{{trans('careers::career.number')}}</label>
                <input name="number_of_available_vacancies" class="form-control" type="number" placeholder="{{trans('careers::career.number')}}" data-parsley-trigger="change focusout" required data-parsley-required data-parsley-required-message="{{__('careers::career.please_enter_the_number_of_available_vacancies')}}" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 repeater">
                <div data-repeater-list="translations">
                    <div data-repeater-item class="row">
                        <div class="col-5">
                            {{-- <label for="language_id">{{__('careers::career.language')}}</label> --}}
                            <select class="form-control" id="language_id" name="language_id" required data-parsley-required data-parsley-required-message="{{__('careers::career.please_select_the_language')}}" data-parsley-trigger="change focusout">
                                <option value="" selected disabled>{{__('careers::career.language')}}</option>
                                @foreach ($languages as $language)
                                <option value="{{$language->id}}" @if($language->id == 1) selected @endif>{{$language->code}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-5">
                            {{-- <label for="title">{{__('careers::career.title')}}</label> --}}
                            <input name="title" id="title" type="text" class="form-control" placeholder="{{__('careers::career.please_enter_the_career')}}" required data-parsley-required data-parsley-required-message="{{__('careers::career.please_enter_the_career')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('careers::career.title_max_is_150_characters_long')}}">
                        </div>
                        <div class="col-lg-8">
                            <label for="description">{{__('careers::career.description')}} <small class="text-muted"> - {{__('careers::career.optional')}}</small></label>
                            <textarea rows="6" name="description" id="description" class="form-control" placeholder="{{__('careers::career.enter_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('careers::career.description_max_is_4294967295_characters_long')}}" required data-parsley-required data-parsley-required-message="{{__('careers::career.please_enter_the_career')}}"></textarea>
                        </div>
                        <div class="col-5">
                            <label for="meta_title">{{__('careers::career.meta_title')}} <small class="text-muted"> - {{__('careers::career.optional')}}</small></label>
                            <input name="meta_title" id="meta_title" type="text" class="form-control" placeholder="{{__('careers::career.please_enter_the_career')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="150" data-parsley-maxlength-message="{{__('careers::career.title_max_is_150_characters_long')}}">
                        </div>
                        <div class="col-lg-8">
                            <label for="meta_description">{{__('careers::career.meta_description')}} <small class="text-muted"> - {{__('careers::career.optional')}}</small></label>
                            <textarea rows="6" name="meta_description" id="meta_description" class="form-control" placeholder="{{__('careers::career.enter_description')}}" data-parsley-trigger="change focusout" data-parsley-maxlength="4294967295" data-parsley-maxlength-message="{{__('careers::career.description_max_is_4294967295_characters_long')}}"></textarea>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            {{-- <label class="control-label">&nbsp;</label> --}}
                            <a href="javascript:;" data-repeater-delete class="btn btn-brand data-repeater-delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="javascript:;" data-repeater-create id="repeater_btn" class="btn">
                    <i class="fa fa-plus"></i> {{trans('careers::career.add_career_translation')}}
                </a>
            </div>
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success">{{__('main.submit')}}</button>
                    <button type="reset" class="btn btn-secondary">{{__('main.reset')}}</button>
                    {{--
                        <a href="{{route('careers.create')}}" data-load class="btn btn-brand btn-icon-sm">
                    <i class="flaticon2-plus"></i> {{trans('careers::career.create_new')}}
                    </a>
                    --}}
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
    function createCareerCallback() {
        // Reload datatable
        careers_table.ajax.reload(null, false);
    }
</script>

<script src="{{URL::asset('MA/assets/js/repeater.js')}}" type="text/javascript"></script>
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