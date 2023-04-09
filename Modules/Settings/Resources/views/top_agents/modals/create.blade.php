@extends('dashboard.layouts.basic')
@section('content')
<style>
    .fade:not(.show) {
        opacity: 1
    }
</style>
<!--begin::Form-->
<form action="{{route('settings.top_agents.store')}}" method="POST" id="create_top_agent_form" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="createTopAgentCallback" data-parsley-validate>
    @csrf
    <div class="m-portlet__body">
        <div class="form-group row">
            <div class="col-12">
                <input type="file" id="image" name="image" required data-parsley-required data-parsley-required-message="{{__('settings::settings.image')}}" data-parsley-trigger="change focusout" class="form-control" data-role="tagsinput" />
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
                        <a href="{{route('settings.top_agents.create')}}" data-load class="btn btn-brand btn-icon-sm">
                    <i class="flaticon2-plus"></i> {{trans('settings::settings.create_new')}}
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
        function createTopAgentCallback() {
            // Reload datatable
            $('#vcxl_modal').modal('toggle');
            var top_agents_table = $('#top_agents_table').DataTable();
            top_agents_table.ajax.reload(null, false);
        }
    </script>

@endpush