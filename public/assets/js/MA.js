$('[data-showit]').on('click', function(e) {
  e.preventDefault();
  var target = $(this).data('toggleit');
  $(target).show( "fast", function() {
    // Animation complete.
  });
});

/* Global Load Content */
function globalFires()
{
	$('.repeater').repeater();

	$('.selectpicker').selectpicker();
	
	$('.tagging').select2({
		dir: "ltr",
		language: "en"
	});

	$('.tagging-support').select2({
		dir: "ltr",
		language: "en",
		tags: true
	});

	$('.tagging-onlyone').select2({
		tags: true,
		dir: "ltr",
		language: "en",
		maximumSelectionLength: 1
	});

    $('.date').datepicker({
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
	});
}