@section('title', trans('settings::settings.mainsliders'))

@include('dashboard.components.fast_modal')
@include('dashboard.styles.custom')

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Content -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand fa fa-list"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            <span data-loadtitle>{{trans('settings::settings.mainsliders')}}</span>
                            <small>{{trans('settings::settings.list')}}</small>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            {{--
                            <!-- Full creation form -->
                            <a href="{{route('settings.main_sliders.create')}}" data-load class="btn btn-brand btn-icon-sm">
                            <i class="flaticon2-plus"></i> {{trans('settings::settings.create_new')}}
                            </a>
                            --}}
                            @if (auth()->user()->hasPermission('create-settings-main-slider'))
                            <a href="{{route('settings.main_sliders.create')}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fast_modal" data-path="{{route('settings.main_sliders.modals.create')}}" data-title="{{trans('settings::settings.create_mainsliders')}}" data-modal-load>
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>{{trans('settings::settings.create_main_slider')}}</span>
                                </span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable datatable" id="main_sliders_table">
                        <thead>
                            <tr>
                                <th>{{__('settings::settings.id')}}</th>
                                <th>{{__('settings::settings.title')}}</th>
                                {{-- <th>{{__('settings::settings.link')}}</th> --}}
                                <th>{{__('settings::settings.image')}}</th>
                                <th>{{__('settings::settings.created_at')}}</th>
                                <th>{{__('settings::settings.last_updated_at')}}</th>
                                <th>{{__('settings::settings.actions')}}</th>
                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
    <!-- end:: Content -->
</div>
