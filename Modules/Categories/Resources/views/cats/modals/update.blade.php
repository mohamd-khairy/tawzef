@extends('dashboard.layouts.basic')

@section('content')
    <!--begin::Form-->
    <form action="{{ route('categories.update') }}" method="POST" id="update_cat_form"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="updatecatCallback" data-parsley-validate enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $cat->id }}" />
        <div class="m-portlet__body">
{{--            <div class="form-group row">--}}
{{--                <div class="fancy-checkbox col-2">--}}
{{--                    <label for="is_featured">{{ __('categories::category.is_featured') }}</label>--}}
{{--                    <input name="is_featured" id="is_featured" type="checkbox"--}}
{{--                        @if ($cat->is_featured == 1) checked=checked @endif class="">--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="form-group row">
                {{-- <div class="col-6">
                    <label  for="parent_id">{{ trans('categories::category.category') }}</label>
                    <select class="form-control form-select form-select-lg mb-3 {{ $errors->has('parent') ? 'is-invalid' : '' }}" name="parent_id" id="parent_id" >
                        @foreach($parents as $id => $parent)
                            <option value="{{ $id }}" {{ ($cat->parent ? $cat->parent->id : old('parent_id')) == $id ? 'selected' : '' }}>{{ $parent }}</option>
                        @endforeach
                    </select>

                </div> --}}
                <div class="col-6">
                    <label for="title_en">{{ __('categories::category.title') }}</label>
                    <input name="title_en" id="title_en" type="text" class="form-control"
                        placeholder="{{ __('categories::category.please_enter_the_cat') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('categories::category.please_enter_the_cat') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150" value="{{$cat->title_en}}"
                        data-parsley-maxlength-message="{{ __('categories::category.title_max_is_150_characters_long') }}">
                </div>
                <div class="col-6">
                    <label for="title_ar">{{ __('categories::category.title_ar') }}</label>
                    <input name="title_ar" id="title_ar" type="text" class="form-control"
                        placeholder="{{ __('categories::category.title_ar') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('categories::category.title_ar') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150" value="{{$cat->title_ar}}"
                        data-parsley-maxlength-message="{{ __('categories::category.title_ar') }} 150">
                </div>
                <div class="col-6">
                    <label for="description">{{ __('categories::category.description') }}</label>
                    <textarea name="description" id="description" type="text" class="form-control"
                        placeholder="{{ __('categories::category.description') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('categories::category.description') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150" value="{{$cat->description}}"
                              data-parsley-maxlength-message="{{ __('categories::category.description') }} ">{{$cat->description}}</textarea>
                </div>

            </div>


            </div>
        </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit"
                            class="btn btn-success btn-brand">{{ trans('categories::category.update_cat') }}</button>
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
    function updatecatCallback() {
        // Close modal
        $('#vcxl_modal').modal('toggle');
        // Reload datatable
        $('#cats_table').DataTable().ajax.reload(null, false);
    }
</script>
