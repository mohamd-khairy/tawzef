<script>
    $('.m_selectpicker').selectpicker();
</script>
<script>
    $('body').addClass('kt-aside--enabled kt-aside--fixed');
</script>
<script>
    function initTable1(url) {
        var table = $('#subscribes_table');
        return table.DataTable({
            language: {
                'lengthMenu': "{{trans('datatables.display')}} _MENU_",
                search: "_INPUT_",
                searchPlaceholder: "{{trans('datatables.search')}}",
                "sLengthMenu": "{{trans('datatables.display')}} _MENU_ {{trans('datatables.records')}}",
                "paginate": {
                    "previous": "{{trans('datatables.previous')}}",
                    "next": "{{trans('datatables.next')}}",
                    "info": "{{trans('datatables.showing_page')}} _PAGE_ {{trans('datatables.of')}} _PAGES_",
                    "infoEmpty": "{{trans('datatables.no_records_available')}}"
                }
            },
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
                {data: 'email', orderable: true, searchable: true},
                {data: 'created_at', orderable: true, searchable: true},
            ],
            columnDefs: [
                {
                    targets: 0,
                    title: "{{trans('contactus::contact_us.id')}}",
                    render: function(data, type, full, meta) {
                        return full.id;
                    },
                },

                {
                    targets: 1,
                    title: "{{trans('contactus::contact_us.email')}}",
                    render: function(data, type, full, meta) {
                        return full.email;
                    },
                },
                {
                    targets: 2,
                    title: "{{trans('contactus::contact_us.created_at')}}",
                    render: function(data, type, full, meta) {
                        return full.created_at;
                    },
                },

                {
                    targets: 3,
                    title: "{{trans('contactus::contact_us.actions')}}",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var delete_url = "{{route('contact_us.subscribes.delete', 'id=:id')}}";
                        delete_url = delete_url.replace(':id', full.id);

                        @if (auth()->user()->hasPermission('update-subscribe-mail') || auth()->user()->hasPermission('delete-subscribe-mail'))
                            var value = `

                            `;
                            @if (auth()->user()->hasPermission('update-subscribe-mail'))
                                value += `
                                    <a href="{{route('contact_us.subscribes.modals.update')}}" class="dropdown-item" data-toggle="modal" data-target="#vcxl_modal" data-path="{{route('contact_us.subscribes.modals.update')}}" data-title="{{trans('contactus::contact_us.update_subscribe')}}" data-id="`+full.id+`" data-modal-load>
                                        <span>
                                            <i class="la la-edit"></i>
                                            <span>{{trans('contactus::contact_us.update_subscribe')}}</span>
                                        </span>
                                    </a>
                                `;
                            @endif
                            @if (auth()->user()->hasPermission('delete-subscribe-mail'))
                                value += `
                                    <a class="dropdown-item" data-delete-it='{"container":false, "path":"`+delete_url+`", "callback": "deleteSubscribeCallback"}' href="#"><i class="la la-trash"></i> {{__('contactus::contact_us.delete_subscribe')}}</a>
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
        subscribes_table = initTable1("{{ route('contact_us.subscribes.index') }}");

        // Search datatable
        $('#m_search').on('click', function(e) {
            e.preventDefault();
            var query = $('#search_subscribes_form').serialize();
            $("#subscribes_table").dataTable().fnDestroy();
            subscribes_table = initTable1("{{ route('contact_us.subscribes.index') }}"+'?'+query);
        });

        // Reset search form
        $('#m_reset').on('click', function(e) {
            e.preventDefault();
            $(this).closest('form').trigger("reset");
            $("#subscribes_table").dataTable().fnDestroy();
            subscribes_table = initTable1("{{ route('contact_us.subscribes.index') }}");
        });
    });
</script>
<script>
    function deleteSubscribeCallback() {
        // Reload datatable with delay to clear cache
        setTimeout(function() {
            subscribes_table.ajax.reload(function(json) {
                //
            }, false);
        }, 3000);
    }
</script>
