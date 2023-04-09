@extends('dashboard.layouts.basic')

@section('content')
<style>
    .fade:not(.show) {
        opacity: 1
    }
</style>
<!--begin::Form-->
<form action="{{route('settings.top_agents.update')}}" method="POST" id="update_top_agent_form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="updateTopAgentCallback" data-parsley-validate enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$top_agent->id}}" />
    <div class="m-portlet__body">
        <div class="form-group row">
            <div class="col-12">
                <label class="col-12 control-label" for="image">{{__('settings::settings.image')}}</label>
                <div class="col-12">
                    <input type="file" id="image" name="image"  data-parsley-required-message="{{__('settings::settings.image')}}" data-parsley-trigger="change focusout" class="form-control" data-role="tagsinput"/>
                    <div class="col-2 my-3">
                        <img src="{{asset('storage/'.$top_agent->image)}}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-brand">{{trans('settings::settings.update_top_agent')}}</button>
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
        function updateTopAgentCallback() {
            // Close modal
            $('#vcxl_modal').modal('toggle');
            // Reload datatable
            var top_agents_table = $('#top_agents_table').DataTable();
            top_agents_table.ajax.reload(null, false);
        }
    </script>

@endpush