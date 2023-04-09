@extends('dashboard.layouts.basic')


@section('content')
    <style>
        .fade:not(.show) {
            opacity: 1
        }
    </style>
    <!--begin::Form-->
    <form action="{{ route('settings.branches.store') }}" method="POST" id="create_branch_form" enctype="multipart/form-data"
        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
        data-callback="createBranchCallback" data-parsley-validate>
        @csrf
        <div class="m-portlet__body">
            <div class="form-group row">
                <div class="form-group row col-12">
                    <div class="col-6 mt-5">
                        <label for="branch">{{ __('settings::settings.branch') }} </label>
                        <input name="branch" id="branch" type="text" class="form-control"
                            placeholder="{{ __('settings::settings.branch') }}" data-parsley-trigger="change focusout"
                            data-parsley-maxlength="150"
                            data-parsley-maxlength-message="{{ __('settings::settings.branch_max_is_150_characters_long') }}">
                    </div>
                    <div class="col-6 mt-5">
                        <label for="branch_ar">{{ __('settings::settings.branch_ar') }} </label>
                        <input name="branch_ar" id="branch_ar" type="text" class="form-control"
                            placeholder="{{ __('settings::settings.branch_ar') }}" data-parsley-trigger="change focusout"
                            data-parsley-maxlength="150"
                            data-parsley-maxlength-message="{{ __('settings::settings.branch_ar_max_is_150_characters_long') }}">
                    </div>
                    <div class="col-6 mt-5">
                        <label for="phone">{{ __('settings::settings.phone') }} </label>
                        <input name="phone" id="phone" type="text" class="form-control"
                            placeholder="{{ __('settings::settings.phone') }}" data-parsley-trigger="change focusout"
                            data-parsley-maxlength="150"
                            data-parsley-maxlength-message="{{ __('settings::settings.phone_max_is_150_characters_long') }}">
                    </div>
                    <div class="col-6 mt-5">
                        <label for="email">{{ __('settings::settings.email') }} </label>
                        <input name="email" id="email" type="text" class="form-control"
                            placeholder="{{ __('settings::settings.email') }}" data-parsley-trigger="change focusout"
                            data-parsley-maxlength="150"
                            data-parsley-maxlength-message="{{ __('settings::settings.email_max_is_150_characters_long') }}">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="address_en">{{ __('settings::settings.address_en') }}</label>
                    <textarea name="address_en" id="address_en" class="form-control"
                        placeholder="{{ __('settings::settings.address_en') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('settings::settings.address_en') }}" data-parsley-trigger="change focusout"
                        rows="2"></textarea>
                </div>
                <div class="col-6">
                    <label for="address_ar">{{ __('settings::settings.address_ar') }}</label>
                    <textarea name="address_ar" id="address_ar" class="form-control"
                        placeholder="{{ __('settings::settings.address_ar') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('settings::settings.address_ar') }}" data-parsley-trigger="change focusout"
                        rows="2"></textarea>
                </div>
            </div>
            <div class="form-group row">
              
                <div class="col-6 mt-5">
                    <label for="map">{{ __('settings::settings.map') }}</label>
                    <textarea name="map" id="map" class="form-control"
                        placeholder="{{ __('settings::settings.map') }}" required data-parsley-required
                        data-parsley-required-message="{{ __('settings::settings.map') }}"
                        data-parsley-trigger="change focusout" rows="2"></textarea>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success">{{ __('main.submit') }}</button>
                            <button type="reset" class="btn btn-secondary">{{ __('main.reset') }}</button>
                            {{-- <a href="{{route('settings.branches.create')}}" data-load class="btn btn-brand btn-icon-sm">
                        <i class="flaticon2-plus"></i> {{trans('settings::settings.create_new')}}
                        </a> --}}
                        </div>
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
        function createBranchCallback() {
            // Reload datatable
            $('#vcxl_modal').modal('toggle');
            var branches_table = $('#branches_table').DataTable();
            branches_table.ajax.reload(null, false);
        }
    </script>
    @include('settings::branches.create-scripts')
@endpush
