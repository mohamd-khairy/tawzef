@section('title', trans('categories::category.category'))

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
                            <span data-loadtitle>{{trans('categories::category.cats')}}</span>
                            <small>{{trans('categories::category.list')}}</small>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">

                            @if (auth()->user()->hasPermission('create-category'))
                            <a href="{{route('categories.modals.create')}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#vcxl_modal" data-path="{{route('categories.modals.create')}}" data-title="{{trans('categories::category.create_cat')}}" data-modal-load>
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>{{trans('categories::category.create_cat')}}</span>
                                </span>
                            </a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable datatable" id="cats_table">
                        <thead>
                            <tr>
                                <th>{{__('categories::category.id')}}</th>
                                <th>{{__('categories::category.titlee')}}</th>
                                <th>{{__('categories::category.description')}}</th>
                                <th>{{__('categories::category.created_at')}}</th>
                                <th>{{__('categories::category.actions')}}</th>
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
