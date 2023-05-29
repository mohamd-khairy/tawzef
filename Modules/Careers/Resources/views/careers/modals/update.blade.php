@extends('dashboard.layouts.basic')

@section('content')
    <!--begin::Form-->
    <form action="{{ route('careers.update') }}" method="POST" id="update_career_form"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="updateCareerCallback" data-parsley-validate enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $career->id }}" />
        <div class="m-portlet__body">
            <div class="fancy-checkbox">
                <input name="is_featured" id="is_featured" type="checkbox">
                <label for="is_featured">{{ __('careers::career.is_featured') }}</label>
            </div>
            <div class="col-4">
                <label for="category_id">{{ __('categories::category.category') }}</label>
                <select class="form-control form-select form-select-lg mb-3 " name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $career->id ? 'selected' : '' }}>
                            {{ $category->title }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="title_en">{{ __('careers::career.title_en') }}</label>
                    <input name="title_en" id="title_en" type="text" class="form-control"
                        placeholder="{{ __('careers::career.please_enter_the_career') }}" required data-parsley-required
                        value="{{ $career->title_en }}"
                        data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('careers::career.title_max_is_150_characters_long') }}">
                </div>
                <div class="col-6">
                    <label for="title_ar">{{ __('careers::career.title_ar') }}</label>
                    <input name="title_ar" id="title_ar" type="text" class="form-control"
                        placeholder="{{ __('careers::career.please_enter_the_career') }}" required data-parsley-required
                        value="{{ $career->title_ar }}"
                        data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"
                        data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                        data-parsley-maxlength-message="{{ __('careers::career.title_max_is_150_characters_long') }}">
                </div>
                <div class="col-lg-12">
                    <label for="description_en">{{ __('careers::career.description_en') }} <small class="text-muted"> -
                            {{ __('careers::career.optional') }}</small></label>
                    <textarea rows="6" name="description_en" id="description_en" class="form-control description_en"
                        placeholder="{{ __('careers::career.enter_description') }}" data-parsley-trigger="change focusout"
                        data-parsley-maxlength="4294967295"
                        data-parsley-maxlength-message="{{ __('careers::career.description_max_is_4294967295_characters_long') }}" required
                        data-parsley-required data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}">{{ $career->description_en }}</textarea>
                </div>
                <div class="col-lg-12">
                    <label for="description_ar">{{ __('careers::career.description_ar') }} <small class="text-muted"> -
                            {{ __('careers::career.optional') }}</small></label>
                    <textarea rows="6" name="description_ar" id="description_ar" class="form-control description_ar"
                        placeholder="{{ __('careers::career.enter_description') }}" data-parsley-trigger="change focusout"
                        data-parsley-maxlength="4294967295"
                        data-parsley-maxlength-message="{{ __('careers::career.description_max_is_4294967295_characters_long') }}" required
                        data-parsley-required data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}">{{ $career->description_ar }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4">
                    <label>{{ trans('careers::career.number') }}</label>
                    <input name="number_of_available_vacancies" class="form-control" type="number"
                        placeholder="{{ trans('careers::career.number') }}" data-parsley-trigger="change focusout" required
                        data-parsley-required value="{{ $career->number_of_available_vacancies }}"
                        data-parsley-required-message="{{ __('careers::career.please_enter_the_number_of_available_vacancies') }}" />
                </div>
                <div class="col-4">
                    <label>{{ trans('main.phone') }}</label>
                    <input name="location" class="form-control" value="{{ $career->location }}" type="text"
                        placeholder="{{ trans('main.location') }}" data-parsley-trigger="change focusout" required
                        data-parsley-required data-parsley-required-message="{{ trans('main.location') }}" />
                </div>
                <div class="col-4">
                    <label>{{ trans('type') }}</label>
                    <input name="type" class="form-control" value="{{ $career->type }}" type="text"
                        placeholder="{{ trans('type') }}" data-parsley-trigger="change focusout"
                        data-parsley-required-message="{{ trans('type') }}" />
                </div>
                <div class="col-6">
                    <label>Gender</label>
                    <input name="gender" class="form-control" type="text" placeholder="gender"
                        value="{{ $career->gender }}" data-parsley-trigger="change focusout"
                        data-parsley-required-message="gender" />
                </div>
                <div class="col-6">
                    <label>Years of experience</label>
                    <input name="years_of_experience" class="form-control" type="text"
                        value="{{ $career->years_of_experience }}" placeholder="years_of_experience"
                        data-parsley-trigger="change focusout" data-parsley-required-message="years_of_experience" />
                </div>

                <div class="col-6">
                    <label>Salary</label>
                    <input name="salary" class="form-control" type="text" placeholder="Salary"
                        value="{{ $career->salary }}" data-parsley-trigger="change focusout"
                        data-parsley-required-message="Salary" />
                </div>
                <div class="col-6">
                    <label>Age</label>
                    <input name="age" class="form-control" type="text" placeholder="age"
                        value="{{ $career->age }}" data-parsley-trigger="change focusout"
                        data-parsley-required-message="age" />
                </div>
                <div class="col-6">
                    <label>Marital status</label>
                    <input name="marital_status" class="form-control" type="text" placeholder="marital_status"
                        value="{{ $career->martial_status }}" data-parsley-trigger="change focusout"
                        data-parsley-required-message="marital_status" />
                </div>

                <div class="col-12">
                    <label>Qualification</label>
                    <textarea name="services" class="form-control" type="text" placeholder="Qualification"
                        data-parsley-trigger="change focusout" value=""
                        data-parsley-required-message="Qualification" >{{ $career->services }}</textarea>
                </div>
                <div class="col-12">
                    <label>About the company</label>
                    <textarea name="message" class="form-control" type="text" placeholder="message"
                         data-parsley-trigger="change focusout"
                        data-parsley-required-message="message">{{ $career->message }} </textarea>
                </div>
                <div class="col-6">
                    <label>Branches</label>
                    <input name="branches" class="form-control" type="text" placeholder="branches"
                        value="{{ $career->branches }}" data-parsley-trigger="change focusout"
                        data-parsley-required-message="branches" />
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit"
                            class="btn btn-success btn-brand">{{ trans('careers::career.update_career') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

<!--end::Form-->
<script>
    $('.m_selectpicker').selectpicker();
</script>
<!-- Callback function -->
<script>
    function updateCareerCallback() {
        // Close modal
        $('#fast_modal').modal('toggle');
        // Reload datatable
        $('#careers_table').DataTable().ajax.reload(null, false);
    }
</script>

@push('scripts')
    <script src="{{ URL::asset('MA/assets/js/repeater.js') }}" type="text/javascript"></script>
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


                    // Showing the item
                    $(this).show();
                }
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
