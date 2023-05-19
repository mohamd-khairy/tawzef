@extends('front.layouts.main')
@section('content')
    <!-- Header End -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt=""
                            style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $career->title }}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $career->location }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $career->type }}</span>

                        </div>
                    </div>

                    <div class="mb-5">
                       {!! nl2br($career->description) !!}
                    </div>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Qalifications: {{ $career->services }}</p>

                    <p><i class="fa fa-angle-right text-primary me-2"></i>About the company: {{ $career->message }}</p>

                    @if(auth()->check())
                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form enctype="multipart/form-data" id="apply-form" data-parsley-validate>
                            <input type="hidden" class="form-control" id="career_id" name="career_id" value="{{ $career->id }}">
                            <input type="hidden" class="form-control" id="applied_by" name="applied_by" value="{{ auth()->user()->id }}">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="full_name"  placeholder="Your Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone number">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" multiple class="form-control bg-white" name="resume" id="formFile" required data-parsley-required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" name="message" placeholder="Coverletter"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 apply-from" type="button">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $career->created_at }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $career->number_of_available_vacancies }} Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $career->type }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $career->location }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Gender: {{ $career->gender }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Years of experience: {{ $career->years_of_experience }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $career->salary }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Age: {{ $career->age }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Marital status: {{ $career->marital_status }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Branches: {{ $career->branches }}</p>

                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">{{ $career->creator->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->
@endsection
@push('scripts')
<script>
    $('.apply-from').on('click', function() {
        var form = $(this).closest('form');

        /* Parsley validate front-end */
        if (!form.parsley().isValid()) {

            form.find( '[data-parsley-type]' ).each( function( i , v ){
                $(this).parsley().validate({
                    focusInvalid: false,
                    invalidHandler: function() {
                        $(this).find(":input.error:first").focus();
                    }
                });

                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification').fadeIn("slow");
                $('#notification .messages').append(`<span>` + "{{trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again')}}" + `</span> <br>`);
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });
                return;
            });
            form.find( '[data-parsley-pattern]' ).each(function( i, v ) {
                $(this).parsley().validate({
                    focusInvalid: false,
                    invalidHandler: function() {
                        $(this).find(":input.error:first").focus();
                    }
                });
                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification').fadeIn("slow");
                $('#notification .messages').append(`<span>` + "{{trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again')}}" + `</span> <br>`);
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });
                return;
            });
            form.parsley().validate({
                focusInvalid: false,
                invalidHandler: function() {
                    $(this).find(":input.error:first").focus();
                }
            });
            $('.messages').empty();
            $('#notification').css('background-color', 'red');
            $('#notification').fadeIn("slow");
            $('#notification .messages').append(`<span>` + "{{trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again')}}" + `</span> <br>`);
            $('.dismiss').click(function() {
                $('#notification').fadeOut('slow')
            });

            return;
        }

        var form = document.getElementById('apply-form');


        // Send Request
        $.ajax({
            url: "{{route('front.careerApply')}}",
            method: 'POST',
            data: new FormData(form),
            processData: false,
            contentType: false,
        }).done(function(response) {


            // Empty notificaion messages
            $('.messages').empty();

            // Notification type
            if(response.status){
                $('#notification').css('background-color', 'green');
            }else{
                $('#notification').css('background-color', 'red');
            }

            // Display notification
            $('#notification .messages').append(`<span>` + response.message + `</span> <br>`);
            $('#notification').fadeIn("slow");

            // Dismiss
            $('.dismiss').click(function() {
                $('#notification').fadeOut('slow')
            });
            setTimeout(function() {
                $('#notification').fadeOut('slow')
            }, 2000);

        }).fail(function(xhr, error_text, statusText) {

            // Empty notification message
            $('.messages').empty();

            // Notification type
            $('#notification').css('background-color', 'red');

            // Display notificaion
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $.each(xhr.responseJSON.errors, function(index, error) {
                    $('#notification .messages').append(`<span>` + error.message + `</span> <br>`);
                });
            } else {
                $('#notification .messages').append(`<span>` + statusText + `</span> <br>`);
            }
            $('#notification').fadeIn("slow");

            // Dismiss notification
            $('.dismiss').click(function() {
                $('#notification').fadeOut('slow')
            });
        });
    });
</script>
@endpush
