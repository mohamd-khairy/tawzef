@extends('dashboard.layouts.basic')


@section('content')
    <!--begin::Form-->
    <form action="{{ route('categories.store') }}" method="POST" id="create_cat_form" enctype="multipart/form-data"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="createCatCallback" data-parsley-validate>
        @csrf
        <div class="m-portlet__body">
{{--            <div class="form-group row">--}}
{{--             <div class="fancy-checkbox col-2">--}}
{{--                 <label for="is_featured">{{ __('ads::ad.is_featured') }}</label>--}}
{{--                <input name="is_featured" id="is_featured" type="checkbox" class="">--}}
{{--            </div>--}}
{{--            </div>--}}
            <div class="form-group row">
                {{-- <div class="col-6">
                    <label  for="parent_id">{{  __('categories::category.category') }}</label>
                    <select class="form-control form-select form-select-lg mb-3 {{ $errors->has('parent') ? 'is-invalid' : '' }}" name="parent_id" id="parent_id" >
                        @foreach($parents as $id => $par)
                            <option value="{{ $id }}" {{ old('parent_id') == $id ? 'selected' : '' }}>{{ $par }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="col-6">
                    <label for="title_en">{{ __('categories::category.title') }}</label>
                    <input name="title_en" id="title_en" type="text" class="form-control"
                        placeholder="{{ __('categories::category.please_enter_the_cat') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('categories::category.please_enter_the_cat') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('categories::category.title_max_is_150_characters_long') }}">
                </div>
                <div class="col-6">
                    <label for="title_ar">{{ __('categories::category.title_ar') }}</label>
                    <input name="title_ar" id="title_ar" type="text" class="form-control"
                        placeholder="{{ __('categories::category.title_ar') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('categories::category.title_ar') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('categories::category.title_ar') }} 150">
                </div>
                <div class="col-6">
                    <label for="description">{{ __('categories::category.description') }}</label>
                    <textarea name="description" id="description" type="text" class="form-control"
                              placeholder="{{ __('categories::category.description') }}" required data-parsley-required
                              data-parsley-required-message="{{ __('categories::category.description') }}"
                              data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                              data-parsley-maxlength-message="{{ __('categories::category.description') }} 150">

                    </textarea>

                </div>

            </div>
            <div class="form-group row">


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
{{--    <script>--}}
{{--        $('.datetimepicker-init').datetimepicker({--}}
{{--        todayHighlight: true,--}}
{{--        autoclose: true,--}}
{{--        format: 'yyyy-mm-dd hh:ii',--}}
{{--        showMeridian: true,--}}
{{--        templates: {--}}
{{--            leftArrow: '<i class="la la-angle-left"></i>',--}}
{{--            rightArrow: '<i class="la la-angle-right"></i>',--}}
{{--        },--}}
{{--    });--}}
{{--    </script>--}}
    <script>
        function createCatCallback() {
            // Reload datatable
            $('#cats_table').DataTable().ajax.reload(null, false);
            $('#vcxl_modal').modal('toggle');

        }
    </script>

