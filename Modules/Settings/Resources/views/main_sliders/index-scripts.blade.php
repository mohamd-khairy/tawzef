<script>
    $('body').addClass('kt-aside--enabled kt-aside--fixed');
</script>
<script>
    function initTable1(url) {
        var table = $('#main_sliders_table');
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
            columns: [{
                    data: 'id',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'title',
                    orderable: true,
                    searchable: true
                },

                {
                    data: 'image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'last_updated_at',
                    orderable: true,
                    searchable: true
                },
            ],
            columnDefs: [{
                    targets: 0,
                    title: "{{trans('settings::settings.id')}}",
                    render: function(data, type, full, meta) {
                        return full.id;
                    },
                },
                {
                    targets: 1,
                    title: "{{trans('settings::settings.title')}}",
                    render: function(data, type, full, meta) {
                        return full.title;
                    },
                },

                {
                    targets: 2,
                    title: "{{trans('settings::settings.image')}}",
                    render: function(data, type, full, meta) {
                        return `<a href="{{asset('storage/'.'${full.image}')}}" target="_blank">{{__('settings::settings.attachments')}}</a>`;
                    },
                },
                {
                    targets: 3,
                    title: "{{trans('settings::settings.created_at')}}",
                    render: function(data, type, full, meta) {
                        return full.created_at;
                    },
                },
                {
                    targets: 4,
                    title: "{{trans('settings::settings.last_updated_at')}}",
                    render: function(data, type, full, meta) {
                        return full.last_updated_at;
                    },
                },
                {
                    targets: 5,
                    title: "{{trans('settings::settings.actions')}}",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var delete_url = "{{route('settings.main_sliders.delete', 'id=:id')}}";
                        delete_url = delete_url.replace(':id', full.id);

                        @if(auth()->user()->hasPermission('update-settings-main-slider') || auth()->user()->hasPermission('delete-settings-main-slider'))
                        var value = `

                            `;
                        @if(auth()->user()->hasPermission('update-settings-main-slider'))
                        value += `
                                    <a href="{{route('settings.main_sliders.modals.update')}}" class="dropdown-item" data-toggle="modal" data-target="#fast_modal" data-path="{{route('settings.main_sliders.modals.update')}}" data-title="{{trans('settings::settings.update_mainslider')}}" data-id="` + full.id + `" data-modal-load>
                                        <span>
                                            <i class="la la-edit"></i>
                                            <span>{{trans('settings::settings.update_mainslider')}}</span>
                                        </span>
                                    </a>
                                `;
                        @endif
                        @if(auth()->user()->hasPermission('delete-settings-main-slider'))
                        value += `
                                    <a class="dropdown-item" data-delete-it='{"container":false, "path":"` + delete_url + `", "callback": "deleteMainSliderCallback"}' href="#"><i class="la la-trash"></i> {{__('settings::settings.delete_mainslider')}}</a>
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
        main_sliders_table = initTable1("{{ route('settings.main_sliders.index') }}");

        // Search datatable
        $('#m_search').on('click', function(e) {
            e.preventDefault();
            var query = $('#search_main_sliders_form').serialize();
            $("#main_sliders_table").dataTable().fnDestroy();
            main_sliders_table = initTable1("{{ route('settings.main_sliders.index') }}" + '?' + query);
        });

        // Reset search form
        $('#m_reset').on('click', function(e) {
            e.preventDefault();
            $(this).closest('form').trigger("reset");
            $("#main_sliders_table").dataTable().fnDestroy();
            main_sliders_table = initTable1("{{ route('settings.main_sliders.index') }}");
        });
    });
</script>
<script>
    function deleteMainSliderCallback() {
        // Reload datatable with delay to clear cache
        setTimeout(function() {
            main_sliders_table.ajax.reload(function(json) {
                //
            }, false);
        }, 3000);
    }
</script>
