
@extends('MA.layouts.main')
@section('title', trans('careers::career.careers'))

@section('content')
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
                            <span data-loadtitle>{{trans('careers::career.careers')}}</span>
                            <small>{{trans('careers::career.list')}}</small>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            {{--
                            <!-- Full creation form -->
                            <a href="{{route('careers.create')}}" data-load class="btn btn-brand btn-icon-sm">
                                <i class="flaticon2-plus"></i> {{trans('careers::career.create_new')}}
                            </a>
                            --}}
                            @if (auth()->user()->hasPermission('create-career'))
                                <a href="{{route('careers.create')}}" class="btn btn-primary btn-sm"  data-path="{{route('careers.modals.create')}}" data-title="{{trans('careers::career.create_career')}}" data-modal-load>
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>{{trans('careers::career.create_career')}}</span>
                                    </span>
                                </a>
                            @endif
                            {{--
                            &nbsp;
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-brand btn-icon-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon2-list"></i> Options
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Choose an action:</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                <span class="kt-nav__link-text">Reservations</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                                <span class="kt-nav__link-text">Appointments</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-bell-alarm-symbol"></i>
                                                <span class="kt-nav__link-text">Reminders</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                <span class="kt-nav__link-text">Announcements</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-shopping-cart-1"></i>
                                                <span class="kt-nav__link-text">Orders</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__separator kt-nav__separator--fit">
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-rocket-1"></i>
                                                <span class="kt-nav__link-text">Projects</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-chat-1"></i>
                                                <span class="kt-nav__link-text">User Feedbacks</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">


                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable datatable" id="careers_table">
                        <thead>
                            <tr>
                                <th>{{__('careers::career.id')}}</th>
                                <th>{{__('users.full_name')}}</th>
                                <th>{{__('careers::career.created_at')}}</th>
                                <th>{{__('careers::career.last_updated_at')}}</th>
                                <th>{{__('careers::career.actions')}}</th>
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
@endsection

@push('footer-scripts')

<script>
    $('.m_selectpicker').selectpicker();
</script>
<script>
    $('body').addClass('kt-aside--enabled kt-aside--fixed');
</script>
<script>
    function initTable1(url) {
        var table = $('#careers_table');
        return table.DataTable({
            dom: '<"top"i>Bfrtip',
            buttons: [
                // {
                //     extend: 'pdf',
                //     footer: true,
                //     exportOptions: {
                //         columns: [0,1,2]
                //     }
                // },
                // {
                //     extend: 'csv',
                //     footer: true,
                //     exportOptions: {
                //         columns: [0,1,2]
                //     }
                // },
                // {
                //     extend: 'excel',
                //     footer: true,
                //     exportOptions: {
                //         columns: [0,1,2]
                //     }
                // }
            ],
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'POST',
                data: {
                    // Parameters
                    columnsDef: [
                        //
                    ],
                },
            },
            columns: [
                {data: 'id', orderable: true, searchable: true},
                {data: 'full_name', orderable: true, searchable: true},
                {data: 'created_at', orderable: true, searchable: true},
                {data: 'last_updated_at', orderable: true, searchable: true},
            ],
            columnDefs: [
                {
                    targets: 0,
                    title: '{{trans('careers::career.id')}}',
                    render: function(data, type, full, meta) {
                        return full.id;
                    },
                },
                {
                    targets: 1,
                    title: '{{trans('careers::career.title')}}',
                    render: function(data, type, full, meta) {
                        return full.full_name;
                    },
                },
                {
                    targets: 2,
                    title: '{{trans('careers::career.created_at')}}',
                    render: function(data, type, full, meta) {
                        return full.created_at;
                    },
                },
                {
                    targets: 3,
                    title: '{{trans('careers::career.last_updated_at')}}',
                    render: function(data, type, full, meta) {
                        return full.last_updated_at;
                    },
                },
                {
                    targets: 4,
                    title: '{{trans('careers::career.actions')}}',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var delete_url = '{{route("careers.delete", "id=:id")}}';
                        delete_url = delete_url.replace(':id', full.id);

                        @if (auth()->user()->hasPermission('update-career') || auth()->user()->hasPermission('delete-career'))
                            var value = `

                            `;
                            @if (auth()->user()->hasPermission('update-career'))
                                value += `
                                    <a href="{{route('careers.modals.update')}}" class="dropdown-item" data-toggle="modal" data-target="#fast_modal" data-path="{{route('careers.modals.update')}}" data-title="{{trans('careers::career.update_career')}}" data-id="`+full.id+`" data-modal-load>
                                        <span>
                                            <i class="la la-edit"></i>
                                            <span>{{trans('careers::career.update_career')}}</span>
                                        </span>
                                    </a>
                                `;
                            @endif
                            @if (auth()->user()->hasPermission('delete-career'))
                                value += `
                                    <a class="dropdown-item" data-delete-it='{"container":false, "path":"`+delete_url+`", "callback": "deleteCareerCallback"}' href="#"><i class="la la-trash"></i> {{__('careers::career.delete_career')}}</a>
                                `;
                            @endif

                            return value;
                        @else
                            return ``;
                        @endif
                    },
                }
            ],
        });
    };
    jQuery(document).ready(function() {
        // Init datatable
        careers_table = initTable1('{{ route('careers.applied') }}');

        // Search datatable
        $('#m_search').on('click', function(e) {
            e.prcareerDefault();
            var query = $('#search_careers_form').serialize();
            $("#careers_table").dataTable().fnDestroy();
            careers_table = initTable1('{{ route('careers.applied') }}'+'?'+query);
        });

        // Reset search form
        $('#m_reset').on('click', function(e) {
            e.prcareerDefault();
            $(this).closest('form').trigger("reset");
            $("#careers_table").dataTable().fnDestroy();
            careers_table = initTable1('{{ route('careers.applied') }}');
        });
    });
</script>
<script>
    function deleteCareerCallback() {
        // Reload datatable with delay to clear cache
        setTimeout(function() {
            careers_table.ajax.reload(function(json) {
                //
            }, false);
        }, 3000);
    }
</script>
@endpush
