<script>
    $('body').addClass('kt-aside--enabled kt-aside--fixed');
</script>
<script>
    function initTable1(url) {
        var table = $('#magazines_table');
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
            language:{
                search:"{{__('datatables.search')}}",
                emptyTable:"{{__('datatables.no_records_available')}}",
                info:"{{__('datatables.showing_page')}} _START_ {{__('datatables.of')}} _END_ {{__('datatables.of')}} _TOTAL_ ",

                infoEmpty:"{{__('datatables.showing_page')}} _START_ {{__('datatables.of')}} _END_ {{__('datatables.of')}} _TOTAL_",
            },
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
                {data: 'value', orderable: false, searchable: true},
                {data: 'created_at', orderable: true, searchable: true},
                {data: 'last_updated_at', orderable: true, searchable: false},
            ],
            columnDefs: [
                {
                    targets: 0,
                    title: '{{trans('cms::cms.id')}}',
                    render: function(data, type, full, meta) {
                        return full.id;
                    },
                },
                {
                    targets: 1,
                    title: '{{trans('cms::cms.title')}}',
                    render: function(data, type, full, meta) {
                        return full.title;
                    },
                },
                {
                    targets: 2,
                    title: '{{trans('cms::cms.created_at')}}',
                    render: function(data, type, full, meta) {
                        return full.created_at;
                    },
                },
                {
                    targets: 3,
                    title: '{{trans('cms::cms.last_updated_at')}}',
                    render: function(data, type, full, meta) {
                        return full.last_updated_at;
                    },
                },
                {
                    targets: 4,
                    title: '{{trans('cms::cms.actions')}}',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var delete_url = '{{route("magazines.delete", "id=:id")}}';
                        delete_url = delete_url.replace(':id', full.id);

                        @if (auth()->user()->hasPermission('update-magazine') || auth()->user()->hasPermission('delete-magazine'))
                            var value = `

                            `;
                            @if (auth()->user()->hasPermission('update-magazine'))
                                value += `
                                    <a href="{{route('magazines.modals.update')}}" class="dropdown-item" data-toggle="modal" data-target="#vcxl_modal" data-path="{{route('magazines.modals.update')}}" data-title="{{trans('cms::cms.update_magazine')}}" data-id="`+full.id+`" data-modal-load>
                                        <span>
                                            <i class="la la-edit"></i>
                                            <span>{{trans('cms::cms.update_magazine')}}</span>
                                        </span>
                                    </a>
                                `;
                            @endif
                            @if (auth()->user()->hasPermission('delete-magazine'))
                                value += `
                                    <a class="dropdown-item" data-delete-it='{"container":false, "path":"`+delete_url+`", "callback": "deleteAboutCallback"}' href="#"><i class="la la-trash"></i> {{__('cms::cms.delete_magazine')}}</a>
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
        magazines_table = initTable1('{{ route('magazines.index') }}');

        // Search datatable
        $('#m_search').on('click', function(e) {
            e.preventDefault();
            var query = $('#search_magazines_form').serialize();
            $("#magazines_table").dataTable().fnDestroy();
            magazines_table = initTable1('{{ route('magazines.index') }}'+'?'+query);
        });

        // Reset search form
        $('#m_reset').on('click', function(e) {
            e.preventDefault();
            $(this).closest('form').trigger("reset");
            $("#magazines_table").dataTable().fnDestroy();
            magazines_table = initTable1('{{ route('magazines.index') }}');
        });
    });
</script>
<script>
    function deleteAboutCallback() {
        // Reload datatable with delay to clear cache
        setTimeout(function() {
            magazines_table.ajax.reload(function(json) {
                //
            }, false);
        }, 3000);
    }
</script>
