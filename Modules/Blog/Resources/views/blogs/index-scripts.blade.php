<script>
    $('body').addClass('kt-aside--enabled kt-aside--fixed');
</script>
<script>
    function initTable1(url) {
        var table = $('#blogs_table');
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
                {data: 'value', orderable: false, searchable: true},
                {data: 'created_at', orderable: true, searchable: true},
                {data: 'last_updated_at', orderable: true, searchable: true},
            ],
            columnDefs: [
                {
                    targets: 0,
                    title: '{{trans('blog::blog.id')}}',
                    render: function(data, type, full, meta) {
                        return full.id;
                    },
                },
                {
                    targets: 1,
                    title: '{{trans('blog::blog.title')}}',
                    render: function(data, type, full, meta) {
                        return full.value;
                    },
                },
                {
                    targets: 2,
                    title: '{{trans('blog::blog.created_at')}}',
                    render: function(data, type, full, meta) {
                        return full.created_at;
                    },
                },
                {
                    targets: 3,
                    title: '{{trans('blog::blog.last_updated_at')}}',
                    render: function(data, type, full, meta) {
                        return full.last_updated_at;
                    },
                },
                {
                    targets: 4,
                    title: '{{trans('blog::blog.actions')}}',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var delete_url = '{{route("blogs.delete", "id=:id")}}';
                        delete_url = delete_url.replace(':id', full.id);

                        @if (auth()->user()->hasPermission('update-blog') || auth()->user()->hasPermission('delete-blog'))
                            var value = `

                            `;
                            @if (auth()->user()->hasPermission('update-blog'))
                                value += `
                                    <a href="{{route('blogs.modals.update')}}" class="dropdown-item" data-toggle="modal" data-target="#vcxl_modal" data-path="{{route('blogs.modals.update')}}" data-title="{{trans('blog::blog.update_blog')}}" data-id="`+full.id+`" data-modal-load>
                                        <span>
                                            <i class="la la-edit"></i>
                                            <span>{{trans('blog::blog.update_blog')}}</span>
                                        </span>
                                    </a>
                                `;
                            @endif
                            @if (auth()->user()->hasPermission('delete-blog'))
                                value += `
                                    <a class="dropdown-item" data-delete-it='{"container":false, "path":"`+delete_url+`", "callback": "deleteBlogCallback"}' href="#"><i class="la la-trash"></i> {{__('blog::blog.delete_blog')}}</a>
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
        blogs_table = initTable1('{{ route('blogs.index') }}');

        // Search datatable
        $('#m_search').on('click', function(e) {
            e.preventDefault();
            var query = $('#search_blogs_form').serialize();
            $("#blogs_table").dataTable().fnDestroy();
            blogs_table = initTable1('{{ route('blogs.index') }}'+'?'+query);
        });

        // Reset search form
        $('#m_reset').on('click', function(e) {
            e.preventDefault();
            $(this).closest('form').trigger("reset");
            $("#blogs_table").dataTable().fnDestroy();
            blogs_table = initTable1('{{ route('blogs.index') }}');
        });
    });
</script>
<script>
    function deleteBlogCallback() {
        // Reload datatable with delay to clear cache
        setTimeout(function() {
            blogs_table.ajax.reload(function(json) {
                //
            }, false);
        }, 3000);
    }
</script>
