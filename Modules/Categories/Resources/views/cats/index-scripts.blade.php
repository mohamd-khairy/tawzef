<script>
    $('.m_selectpicker').selectpicker();
</script>
<script>
    $('body').addClass('kt-aside--enabled kt-aside--fixed');
</script>
<script>
    function initTable1(url) {
        var table = $('#cats_table');
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
                // {
                //     data: 'description',
                //     orderable: true,
                //     searchable: true
                // },
                {
                    data: 'created_at',
                    orderable: true,
                    searchable: true
                },
            ],
            columnDefs: [{
                    targets: 0,
                    title: '{{trans('categories::category.id')}}',
                    render: function(data, type, full, meta) {
                        return full.id;
                    },
                },
                {
                    targets: 1,
                    title: '{{trans('categories::category.titlee')}}',
                    render: function(data, type, full, meta) {
                        return full.title;
                    },
                },
                {
                    targets: 2,
                    title: '{{trans('categories::category.description')}}',
                    render: function(data, type, full, meta) {
                        return full.description;
                    },
                },
                {
                    targets: 3,
                    title: '{{trans('categories::category.created_at')}}',
                    render: function(data, type, full, meta) {
                        return full.created_at;
                    },
                },
                {
                    targets: 4,
                    title: '{{trans('categories::category.actions')}}',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var delete_url = '{{route("categories.delete", "id=:id")}}';
                        delete_url = delete_url.replace(':id', full.id);

                        @if(auth()->user()->hasPermission('update-category') || auth()->user()->hasPermission('delete-category'))
                            var value = `
<!--                                <span class="dropdown">-->
<!--                                    <a href="#" class="btn m-btn m-btn&#45;&#45;hover-brand m-btn&#45;&#45;icon m-btn&#45;&#45;icon-only m-btn&#45;&#45;pill" data-toggle="dropdown" aria-expanded="true">-->
<!--                                        <i class="la la-ellipsis-h"></i>-->
<!--                                    </a>-->
<!--                                    <div class="dropdown-menu dropdown-menu-right">-->
                                `;



                            @if(auth()->user()->hasPermission('update-category'))
                            value += `
                                        <a href="{{route('categories.modals.update')}}" class="dropdown-item" data-toggle="modal" data-target="#vcxl_modal" data-path="{{route('categories.modals.update')}}" data-title="{{trans('categories::category.update_cat')}}" data-id="` + full.id + `" data-modal-load>
                                            <span>
                                                <i class="la la-edit"></i>
                                                {{--<span>{{trans('categories::category.update_cat')}}</span>--}}
                                            </span>
                                        </a>
                                    `;


                            @endif
                            @if(auth()->user()->hasPermission('delete-category'))
                            value += `
                                        <a class="dropdown-item" data-delete-it='{"container":false, "path":"` + delete_url + `", "callback": "deleteadCallback"}' href="#"><i class="la la-trash"></i> </a>
                                    `;
                            @endif
                            value += `
                                    </div>
                                </span>
                                `;
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
        console.log('dd');
        // Init datatable
        cats_table = initTable1('{{route('categories.index')}}');

        // Search datatable
        $('#m_search').on('click', function(e) {
            e.preventDefault();
            var query = $('#search_ads_form').serialize();
            $("#cats_table").dataTable().fnDestroy();
            cats_table = initTable1('{{ route('categories.index')}}' + '?' + query);
        });

        // Reset search form
        $('#m_reset').on('click', function(e) {
            e.preventDefault();
            $(this).closest('form').trigger("reset");
            $("#cats_table").dataTable().fnDestroy();
            cats_table = initTable1('{{route('categories.index')}}');
        });
    });
</script>
<script>
    function deleteadCallback() {
        // Reload datatable with delay to clear cache
        setTimeout(function() {
            cats_table.ajax.reload(function(json) {
                //
            }, false);
        }, 3000);
    }
</script>
