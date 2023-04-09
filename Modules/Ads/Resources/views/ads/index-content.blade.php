@section('title', trans('ads::ad.ads'))

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
                            <span data-loadtitle>{{trans('ads::ad.ads')}}</span>
                            <small>{{trans('ads::ad.list')}}</small>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">

                            @if (auth()->user()->hasPermission('create-ad') && $ads_count < 3)
                            <a href="{{route('ads.modals.create')}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#vcxl_modal" data-path="{{route('ads.modals.create')}}" data-title="{{trans('ads::ad.create_ad')}}" data-modal-load>
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>{{trans('ads::ad.create_ad')}}</span>
                                </span>
                            </a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable datatable" id="ads_table">
                        <thead>
                            <tr>
                                <th>{{__('ads::ad.id')}}</th>
                                <th>{{__('ads::ad.ad')}}</th>
                                <th>{{__('ads::ad.created_at')}}</th>
                                <th>{{__('ads::ad.last_updated_at')}}</th>
                                <th>{{__('ads::ad.actions')}}</th>
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
