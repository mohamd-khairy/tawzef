/* MA Layout */
$(document).on('click', '[data-load1]', function (e){
	if (e.target != e.currentTarget) {
    e.preventDefault();

		var clicked_menu = $(this);
		var path = clicked_menu.attr('href');
	
		KTApp.block('#kt_body', {
			overlayColor: '#000000',
			state: 'primary'
		});
	
		$.get(path, function(data){
			/* Display Data */
			$('#kt_body').html(data).fadeIn("fast");
		}).done(function(data){
			/* Updating Page Title */
			var new_title = $('[data-loadtitle]').text();
			$(document).prop('title', new_title + ' | ' + app_name);
	
			/* Unlock */
			globalFires();
			KTApp.unblock('#kt_body');
			$('.kt-menu__item').removeClass("kt-menu__item--here");
			clicked_menu.closest('li').addClass('kt-menu__item--here');

			history.pushState(data, new_title, path);
			history.pushState(data, new_title, path);

		}).fail(function(){
			/* Unlock */
			alert('Oops, Something went wrong!')
			KTApp.unblock('#kt_body');
		});
  }
	e.stopPropagation();
});

$(function() {
	var checkbox = $("#checkbox01");
	var hidden = $("#div01");
	hidden.hide();
	checkbox.change(function() {
		if (checkbox.is(':checked')) {
		hidden.show();
		$('#username').prop('required', true); //to add required
		} else {
		hidden.hide();
		$("#username").val("");
		$('#username').prop('required', false); //to remove required
		}
	});


	$(document).on('change', '[data-require-some]', function (e){
		var checked_box = $(this);
		var required_inputs = checked_box.data('require-some');
		var required_inputsArr = required_inputs.split(',');

		if(required_inputsArr.length > 0){
			$.each(required_inputsArr, function(key, input_name){
				if (checked_box.is(':checked')){
					console.log('Yes');
					$('input[name="'+input_name+'"]').attr("required", "true");
				}else{
					console.log('No');
					$('input[name="'+input_name+'"]').removeAttr("required");
					$('input[name="'+input_name+'"]').removeAttr("data-parsley-required");
					$('input[name="'+input_name+'"]').removeAttr("data-parsley-required-message");
				}
			});
		}
	});
});



/* Temp data-load && comment pjax */
// $(document).on('click', '[data-load]', function (e){
//     e.preventDefault();
//     var clicked_menu = $(this);
//     var path = clicked_menu.attr('href');
//     KTApp.block('#kt_body', {
//         overlayColor: '#000000',
//         state: 'primary'
//     });
//     $.get(path, function(data){
//         /* Display Data */
//         $('#kt_body').html(data).fadeIn("fast");
//     }).done(function(){
//         /* Updating Page Title */
//         var new_title = $('[data-loadtitle]').text();
//         $(document).prop('title', new_title + ' | ' + app_name);
//         /* Unlock */
//         globalFires();
//         KTApp.unblock('#kt_body');
//         $('.kt-menu__item').removeClass("kt-menu__item--here");
//         clicked_menu.closest('li').addClass('kt-menu__item--here');
//     }).fail(function(){
//         /* Unlock */
//         alert('Oops, Something went wrong!')
//         KTApp.unblock('#kt_body');
//     });
// });

$(document).on('click', '[data-load]', function (e){
    e.preventDefault();

	var clicked_menu = $(this);
	var path = clicked_menu.attr('href');

    // does current browser support PJAX
    if ($.support.pjax) {
        $.pjax.defaults.timeout = 5000; // time in milliseconds - to handle timeout error
        $.pjax.defaults.maxCacheLength = 0; // Disable pjax caching
        $.pjax({
            // type: 'POST',
            url: path,
            container: '#kt_body',
            // push: true
        });
    }
	globalFires();
	clicked_menu.closest('li').addClass('kt-menu__item--here');

});

/*
$(function() {
    // Loaded for the first time
    if( Cookies.get('loadedAlready') != 'YES' ) {
        var path = window.location.href;
        // does current browser support PJAX
        if ($.support.pjax) {
            $.pjax.defaults.timeout = 5000; // time in milliseconds - to handle timeout error
            $.pjax.defaults.maxCacheLength = 0; // Disable pjax caching
            $.pjax({
                // type: 'POST',
                url: path,
                container: '#kt_body',
                // push: true
            });
        }
        Cookies.set('loadedAlready', 'YES'); //set cookie
    } else {
        // Already loaded
        if (performance.navigation.type == 1) {
            // Reloaded
            var path = window.location.href;

            // does current browser support PJAX
            if ($.support.pjax) {
                $.pjax.defaults.timeout = 5000; // time in milliseconds - to handle timeout error
                $.pjax.defaults.maxCacheLength = 0; // Disable pjax caching
                $.pjax({
                    // type: 'POST',
                    url: path,
                    container: '#kt_body',
                    // push: true
                });
            }
        } else {
            // Not reloaded
            var path = window.location.href;

            // does current browser support PJAX
            if ($.support.pjax) {
                $.pjax.defaults.timeout = 5000; // time in milliseconds - to handle timeout error
                $.pjax.defaults.maxCacheLength = 0; // Disable pjax caching
                $.pjax({
                    // type: 'POST',
                    url: path,
                    container: '#kt_body',
                    // push: true
                });
            }
        }
    }
});
*/

$(document).on('pjax:beforeSend', function() {
	KTApp.block('#kt_body', {
		opacity: 0.07,
		overlayColor: '#000000',
		state: 'primary'
	});
	$('.kt-menu__item').removeClass("kt-menu__item--here");
});
	
$(document).on('pjax:complete, pjax:end', function() {
	var new_title = $('[data-loadtitle]').text();
	$(document).prop('title', new_title + ' | ' + app_name);

	globalFires();
	KTApp.unblock('#kt_body');
});

$(document).on('pjax:end', function() {
    ga('set', 'location', window.location.href);
    ga('send', 'pageview');
});

$(document).on('pjax:popstate', function() {
	globalFires();
	/* Workaround to fix DataTable Bug with pushState */
	var destroyTable = $('.table').DataTable();
	destroyTable.destroy();
});

$(document).on('pjax:error', function(xhr, textStatus, error) {
	console.log('Oops, Something went wrong!');
	KTApp.unblock('#kt_body');
});
/* MA Layout */


$('[data-showit]').on('click', function(e) {
  e.preventDefault();
  var target = $(this).data('toggleit');
  $(target).show( "fast", function() {
    // Animation complete.
  });
});

/* Infinite Scroll */
$('ul.pagination').hide(); // Hide the page links that were rendered by Laravel’s links method
$(function() {
	$('.infinite-scroll').jscroll({ // Scrollable content container
		autoTrigger: true, // Triggers the loading of the next set of content automatically when the user scrolls to the bottom of the containing element
		loadingHtml: '<div class="kt-spinner kt-spinner--brand"></div>', // Define the HTML to show at the bottom of the content while loading the next set
		padding: 0, // The distance from the bottom of the scrollable content at which to trigger the loading of the next set of content
		nextSelector: '.pagination li.active + li a', // Specify the selector to use for finding the link which contains the href pointing to the next set of content (and that link was generated by Laravel’s links method)
		contentSelector: 'div.infinite-scroll', // A reference to a selector on the next page that we will be loading
		callback: function() {
			$('ul.pagination').remove(); // Finally, at the end of each page load (when there's nothing more to load) we call a function that will remove (take out of the DOM) pagination links generated by  Laravel’s links method
		}
	});
});

/* Global Load Content */
function globalFires()
{
	KTLayout.init();
	KTApp.initTooltips({
		html: true
	});
	KTApp.initPopovers({
		html: true
	});
	$('.bootstrap-select, .kt-selectpicker').selectpicker('refresh');
	$('.selectpicker').selectpicker();
	$('.m-select2').select2();
	datetimepickerInit();
	daterangepickerInit();
	$('[data-switch=true]').bootstrapSwitch();	

	$('.showmap').each(function(){
		var mapDetails = $(this).data('showmap');
		MapHelper.initMap(false, true, true, false, mapDetails);
	});

	if($("div").hasClass("kt-aside--fixed")){
		$('body').addClass('kt-aside--enabled kt-aside--fixed');
	}else{
		$('body').removeClass('kt-aside--enabled kt-aside--fixed');
	}

    $('.infinite-scroll').jscroll({ // Scrollable content container
        autoTrigger: true, // Triggers the loading of the next set of content automatically when the user scrolls to the bottom of the containing element
        loadingHtml: '<div class="kt-spinner kt-spinner--brand"></div>', // Define the HTML to show at the bottom of the content while loading the next set
        padding: 0, // The distance from the bottom of the scrollable content at which to trigger the loading of the next set of content
        nextSelector: '.pagination li.active + li a', // Specify the selector to use for finding the link which contains the href pointing to the next set of content (and that link was generated by Laravel’s links method)
        contentSelector: 'div.infinite-scroll', // A reference to a selector on the next page that we will be loading
        callback: function() {
            $('ul.pagination').remove(); // Finally, at the end of each page load (when there's nothing more to load) we call a function that will remove (take out of the DOM) pagination links generated by  Laravel’s links method
        }
    });

	$('[data-editable]').editable();
	
	$('[data-scroll="true"]').each(function() {
		var el = $(this);
		KTUtil.scrollInit(this, {
			disableForMobile: true,
			handleWindowResize: true,
			height: function() {
				if (KTUtil.isInResponsiveRange('tablet-and-mobile') && el.data('mobile-height')) {
					return el.data('mobile-height');
				} else {
					return el.data('height');
				}
			}
		});
	});

	applykFormatter();
	loadMAChart();

	/*
	$('.repeater').repeater();
	
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
	*/
}

/* Prepend Todos Response Timeline */
function prependTodosTimeline(data) {
	$('#createLccTodos').toggle().empty();
	$( ".infinite-scroll .jscroll-inner" ).prepend(data);
	globalFires();
}

/* Prepend Activities Response Timeline */
function prependActivitiesTimeline(data) {
	$('#loadMyActoinsContent').toggle().empty();
	$( ".infinite-scroll .jscroll-inner" ).prepend(data);
	globalFires();
}

/* Prepend Opportunities Response Timeline */
function prependOpportunitiesTimeline(data) {
	$('#addNewOpportunity').toggle().empty();
	$( ".infinite-scroll .jscroll-inner" ).prepend(data);
	globalFires();
}

/* Prepend Mobile Numbers Response Timeline */
function prependMobileNumbers(data) {
    $('#createLccTodos').toggle().empty();
    $( ".phones-inner" ).prepend(data);

    $('#addNewPhone').toggle().empty();
    globalFires();
}

/* Prepend Social Accounts Response Timeline */
function prependSocialAccounts(data) {
    $('#createLccTodos').toggle().empty();
    $( ".social-accounts-inner" ).prepend(data);

    $('#addNewSocialAccount').toggle().empty();
    globalFires();
}

document.addEventListener('DOMContentLoaded', function(){
	$(document).ready(function() {

		/* Handle selecting main activity radio button */
		$('.mainActivity').each(function(){
			$('input[type=radio]:first', this).attr('checked', true);
			loadActivityTypeOutcomes($('input[type=radio]:first', this).attr('value'));
		});

		/* Auto Click Trigger on Load */
		$('.autoClickTrigger').each(function(){
			$(this).trigger("click");
		});

		/* Show Map */
		$('.showmap').each(function(){
			var mapDetails = $(this).data('showmap');
			MapHelper.initMap(false, true, true, false, mapDetails);
		});

		/* Keep Me Alive */
		/*
        $.sessionTimeout({
            title: 'Session Timeout Notification',
            message: 'Your session is about to expire.',
            keepAliveUrl: 'https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/session-timeout/keepalive.php',
            redirUrl: '?p=page_user_lock_1',
            logoutUrl: '?p=page_user_login_1',
            warnAfter: 3000, //warn after 5 seconds
            redirAfter: 35000, //redirect after 10 secons,
            ignoreUserActivity: true,
            countdownMessage: 'Redirecting in {timer} seconds.',
            countdownBar: true
				});
				*/

		$('[data-editable]').editable();

	});
}, false);

$(function() {  
	$('#loadMoreLCSSProfile').appear();
	$(document.body).on('appear', '#loadMoreLCSSProfile', function(e, $affected) {
		console.log('loadMoreLCSSProfile is visable');
	});
	globalFires();

	/* Digital Clock - Cache some selectors */
	function updateTime() {
		$('#clock').html(moment().format("ddd, Do MMMM YY hh:mm A"), function(){
			$('#clock').addClass('animated bounceIn');
		});
	}

	setInterval(updateTime, 1000);
});

