<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#FFF",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
    //history.replaceState(null, "@yield('title') | {{env('APP_NAME')}}", "{{Request::url()}}");
</script>
<!-- end::Global Config -->

<!-- config && lang -->
<script>
    var config = {
        //
    };
    var lang = {
        please_specify_at_least_4_directions: "{{trans('map.please_specify_at_least_4_directions')}}",
        no_results_found: "{{trans('main.no_results_found')}}",
        geocode_failed_due_to: "{{trans('map.geocode_failed_due_to')}}",
        autocomplete_returned_place_contains_no_geometry: "{{trans('map.autocomplete_returned_place_contains_no_geometry')}}",
    };
</script>
<!-- end:: config && lang -->
<!--begin:: Global Mandatory Vendors -->
<script src="{{URL::asset('MA/assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>

<script src="{{URL::asset('MA/assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/moment/min/moment-timezone.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="{{URL::asset('MA/assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/components/vendors/bootstrap-switch/init.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/components/vendors/bootstrap-markdown/init.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/components/vendors/bootstrap-notify/init.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/components/vendors/jquery-validation/init.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/morris.js/morris-06.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/custom/components/vendors/sweetalert2/init.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/vendors/general/jquery.MA-editable/js/jquery.MA-editable.js')}}"></script>
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{URL::asset('MA/assets/demo/demo2/base/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{URL::asset('MA/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
{{-- <script src="//maps.google.com/maps/api/js?key={{ env('MAP_KEY') }}" type="text/javascript"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&libraries=places&language={{App::getLocale()}}"></script>
{{-- <script src="{{URL::asset('MA/assets/vendors/custom/gmaps/gmaps.js')}}" type="text/javascript"></script> --}}
<!--end::Page Vendors -->

<script src="{{URL::asset('MA/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

<!--begin::MA Scripts(used by all pages) -->
<script src="{{URL::asset('MA/assets/js/js.cookie.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/js/parsley.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/js/jquery.jscroll.min.js')}}"></script>
<script src="{{URL::asset('MA/assets/js/jquery.appear.js')}}"></script>
<script src="{{URL::asset('MA/assets/js/map.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/js/jstree.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/js/animatedModal.min.js')}}" type="text/javascript"></script>

<script src="{{URL::asset('MA/assets/js/AMA.js?ver='.env('FILES_VER'))}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/js/MA.js?ver='.env('FILES_VER'))}}" type="text/javascript"></script>
<!--end::MA Scripts -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{URL::asset('MA/assets/app/custom/general/dashboard.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/app/custom/general/components/utils/session-timeout.js')}}" type="text/javascript"></script>
<!--end::Page Scripts -->

<!--begin::Global App Bundle(used by all pages) -->
<script src="{{URL::asset('MA/assets/app/bundle/app.bundle.js')}}" type="text/javascript"></script>
<!--end::Global App Bundle -->

@php
    $user_id = Session::get('user') ? Session::get('user')->id : null;
@endphp
<script src="{{URL::asset('MA/assets/js/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/packages/bootstrapValidator/js/bootstrapValidator.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('MA/assets/js/upload_button.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
<!-- TOKEN -->
<script>
document.addEventListener('DOMContentLoaded', function(){
    $(document).ready(function() {
        window.Laravel = <?php


echo json_encode([
            'user' => Session::get('user'),
            'csrfToken' => csrf_token(),
            'baseUrl' => url('/'),
            'host' => request()->getHttpHost()
        ]); ?>;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
}, false);
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
<!-- TOKEN -->



<!-- Globals -->
@include('MA.inc.global_variables')
@include('MA.inc.global_translations')
@include('MA.inc.global_routes')
@include('MA.inc.delete-script')

<!-- Module Socket Events (Solves PJAX doesn't flush events issue) -->
@include('MA.inc.load_module_socket_events')

<script>
    $(document).on('click', '.panel-heading a.icon_minim', function(e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
        }
    });
    $(document).on('focus', '.panel-footer input.chat_input', function(e) {
        var $this = $(this);
        if ($('#minim_chat_window').hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideDown();
            $('#minim_chat_window').removeClass('panel-collapsed');
            $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('click', '#new_chat', function(e) {
        var size = $(".chat-window:last-child").css("margin-left");
        size_total = parseInt(size) + 400;
        alert(size_total);
        var clone = $("#chat_window_1").clone().appendTo(".container");
        clone.css("margin-left", size_total);
    });
    $(document).on('click', '.icon_close', function(e) {
        //$(this).parent().parent().parent().parent().remove();
        $("#chat_window_1").remove();
    });
</script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-firestore.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
<!-- <script>
    firebase.initializeApp({
        apiKey: 'AIzaSyDb58sY7C62ncwv06FcneGd1ObPZkM-YRU',
        authDomain: 'ghorza-65c4d.firebaseapp.com',
        projectId: 'ghorza-65c4d'
    });

    var db = firebase.firestore();
    var collection = db.collection("support_messages");
    $('#btn-chat').on('click', function() {
        var id = $(this).attr('data-id');
        setMessages(id);
        // getUserMessages(id);
    })


    collection.orderBy('date').onSnapshot((querySnapshot) => {
        $('#head-messages-container').empty();
        querySnapshot.forEach((doc) => {
            $('#head-messages-container').append(`
            <button type="button" data-id="${doc.id}" class="btn col-12 d-flex border-bottom messages-buttons">
            <div class="col-4">
                        <img class="message-image" src="{{URL::asset('/MA/no_image.jpg')}}" alt="">
                        </div>
                        <div class="col-8 text-justify">
                        <p class="message-hed">
                        <span class="message-title">${doc.data().sender}</span>
                        <p class="message-preive">${doc.data().content}</p>
                        </p>
                        </div>
                        </button>
                        `);
                    });
                });

                function getUserMessages(id){
                    $('.msg_container_base').empty();
                    collection.doc(id).collection('Messages').orderBy('date').onSnapshot((querySnapshot2) => {
                querySnapshot2.forEach((doc2)=>{
                    if(doc2.data()['userId'] == {{$user_id}}){
                        console.log(`${doc2.id} => ${doc2.data()['content']}`);
                        $('.msg_container_base').append(`
                        <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                                    <div class="messages msg_sent">
                                    <p>${doc2.data()['content']}</p>
                                    </div>
                                    </div>
                                    <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                                    </div>
                            </div>
                            `);
                        }else{
                            $('.msg_container_base').append(`
                            <div class="row msg_container base_sent">
                            <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                            </div>
                            <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                            <p>${doc2.data()['content']}</p>
                            </div>
                            </div>
                            </div>
                            `);
                    }
                });
            });
        }

        $(document).on('click','.messages-buttons',function(){
            console.log('s');
            var id = $(this).attr('data-id');
            $('#btn-chat').attr('data-id',id);
            getUserMessages(id);
        });
    function setMessages(id){
        $('.msg_container_base').empty();
        collection.doc(id).update({
            content: $('.chat_input').val(),
            date:"{{\Carbon\Carbon::now()}}",
        })
        .then(function(docRef) {
            })
            .catch(function(error) {
            });
            var messageId = collection.doc(id).collection('Messages').doc();
            messageId.set({
                content: $('.chat_input').val(),
                id: messageId,
                sender: "user",
                date:"{{\Carbon\Carbon::now('UTC')}}",
                userId: {{$user_id}}
            }).then(function(docRef) {
            })
            .catch(function(error) {
            });
    }
</script> -->
