<script>
    $('.m_selectpicker').selectpicker();
</script>
<script src="{{URL::asset('MA/assets/js/repeater.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        
        $('.repeater').repeater({
            // (Required if there is a nested repeater)
            // Specify the configuration of the nested repeaters.
            // Nested configuration follows the same format as the base configuration,
            // supporting options "defaultValues", "show", "hide", etc.
            // Nested repeaters additionally require a "selector" field.
            repeaters: [{
                // (Required)
                // Specify the jQuery selector for this nested repeater
                selector: '.inner-repeater'
            }],
            show: function () {
                // Get items count
                var items_count = $('.repeater').repeaterVal().translations.length;
                var current_index = items_count - 1;

                /* Summernote */
                // Update the textarea id
                $(this).find('.note-editor').remove(); // Remove repeated summernote
                $(this).find('.description').attr('id', 'description-'+current_index);

                $('#description-'+current_index).summernote({
        imageTitle: {
                    specificAltField: true,
                },
                popover: {
                    image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageTitle']],
                    ],
                },
        height: '300px',
    });

                // Showing the item
                $(this).show();
            }
        });
    $('#description-'+'0').summernote({
          height: 150,   //set editable area's height
          toolbar: [
            // [groupName, [list of button]]
            // ['style', ['bold', 'italic', 'underline', 'clear']],
                                    ['style', ['bold', 'underline']],
            
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'hr']],
            ['misc', ['fullscreen', 'codeview', 'undo', 'redo']]
          ]
    });
    });
</script>