@section('title', trans('users.user_info'))
<style>
    * {
        box-sizing: border-box
    }

    /* Style the tab */
    .tab {
        /* float: left; */
        border: 1px solid #ccc;
        background-color: #fff;
        width: 30%;
        height: 300px;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
        background-color: #ccc;
    }

    .profile {
        min-height: 500px;
    }

    .tabcontent {}
</style>
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container profile d-flex flex-wrap justify-content-between">
        <div class="tab col-md-3">
            <button class="tablinks" onclick="openDiv(event, 'Info')">Info</button>
            @if (auth()->user()->group_id == 4)
                <button class="tablinks" onclick="openDiv(event, 'MyJobs')">MyJobs</button>
            @endif
            <button class="tablinks" onclick="openDiv(event, 'MyApplications')">MyApplications</button>
        </div>

        <div class="col-md-8">
            <div id="Info" class="tabcontent">
                <h3>Info</h3>
                <div class="manage-profile-holder">
                    <form action=""id="edit-info" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}" />

                        <div class="row">
                            <div class="col-md-8">
                                <div class="custom-file-input mb-3">
                                    <div class="avatar rounded-circle">
                                        <img class="rounded-circle img-thumbnail" id="output" width="100"
                                            src="{{ URL::asset('storage/'.$user->image) }}" alt="{{ $user->full_name }}">
                                    </div>

                                    <label class="form-label" for="ch-img">
                                        <i class="ri-camera-line"></i>
                                        {{ __('users.change') }} {{ __('users.profile_image') }}
                                    </label>
                                    <input class="form-control" id="ch-img" type="file" name="image"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class='form-control' value="{{ $user->username }}"
                                        name="username" placeholder="{{ __('users.username') }}"required
                                        data-parsley-required
                                        data-parsley-required-message="{{ __('users.username_is_required') }}"
                                        data-parsley-trigger="change focusout" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class='form-control' value="{{ $user->full_name }}"
                                        name="full_name" placeholder="{{ __('users.full_name') }}" required
                                        data-parsley-required
                                        data-parsley-required-message="{{ __('main.please_enter_your_name') }}"
                                        data-parsley-trigger="change focusout" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class='form-control' value="{{ $user->email }}"
                                        name="email" placeholder="{{ __('users.email') }}" required
                                        data-parsley-required
                                        data-parsley-required-message="{{ __('main.please_enter_your_email') }}"
                                        data-parsley-trigger="change focusout" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class='form-control' value="{{ $user->mobile_number }}" value
                                        name="mobile_number" placeholder="{{ __('users.mobile_number') }}" required
                                        data-parsley-required
                                        data-parsley-required-message="{{ __('users.please_enter_the_mobile_number') }}"
                                        data-parsley-trigger="change focusout" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="password" class='form-control' name="password"
                                        placeholder="{{ __('users.password') }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="password" class='form-control' name="password_confirmation"
                                        placeholder="{{ __('users.password_confirmation') }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea type="text" class='form-control bio' rows="2" name="bio" placeholder="{{ __('users.bio') }}">{{ $user->bio }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex gap-2">
                                    <button type='button'
                                        class="site-btn submit m-0 submit-from btn btn-primary">{{ __('main.submit') }}
                                        {{ __('users.change') }}</button>
                                    <button type='reset' class="btn btn-outline-secondary">
                                        {{ __('users.cancel') }}</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            @if($careers)
            <div id="MyJobs" class="tabcontent" style="display: none;">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter">
                    Create Job
                </button>
                <h3>MyJobs</h3>
                @foreach ($careers as $career)
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">


                                <img class="flex-shrink-0 img-fluid border rounded"
                                src="{{ asset('storage/'.$career->creator->image) }}" alt=""
                                style="width: 80px; height: 80px;">
                                <a href="{{ route('front.careerSingle', ['id' => $career->id]) }}">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{ $career->title }}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $career->location }}</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>{{ $career->type }}</span>

                                    </div>
                                </a>
                            </div>
                            <div
                                class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    {{-- <a class="btn btn-light btn-square me-3" href=""><i
                                    class="far fa-heart text-primary"></i></a> --}}
                                    <a class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalCenter-{{ $career->id }}">Edit</a>
                                </div>
                                <div class="modal fade" id="exampleModalCenter-{{ $career->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                {{-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> --}}
                                                {{-- <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button> --}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('careers.edit') }}" method="POST"
                                                    id="update_career_form_{{ $career->id }}"
                                                    enctype="multipart/form-data"
                                                    class="m-form m-form--fit m-form--label-align-right m-form--group-seperator"
                                                    data-async data-callback="createCareerCallback"
                                                    data-parsley-validate>
                                                    @csrf
                                                    <div class="m-portlet__body">
                                                        <input type="hidden" name="id" id="id"
                                                            value="{{ $career->id }}" />

                                                        <div class="col-12">
                                                            <label
                                                                for="category_id">{{ __('categories::category.category') }}</label>
                                                            <select
                                                                class="form-control form-select form-select-lg mb-3 "
                                                                name="category_id" id="category_id" required>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $category->id == $career->category_id ? 'selected' : '' }}>
                                                                        {{ $category->title }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-6">
                                                                <label
                                                                    for="title_en">{{ __('careers::career.title_en') }}</label>
                                                                <input name="title_en" id="title_en" type="text"
                                                                    class="form-control"
                                                                    placeholder="{{ __('careers::career.please_enter_the_career') }}"
                                                                    required data-parsley-required
                                                                    value="{{ $career->title_en }}"
                                                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"
                                                                    data-parsley-trigger="change focusout"
                                                                    data-parsley-maxlength="150"
                                                                    data-parsley-maxlength-message="{{ __('careers::career.title_max_is_150_characters_long') }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label
                                                                    for="title_ar">{{ __('careers::career.title_ar') }}</label>
                                                                <input name="title_ar" id="title_ar" type="text"
                                                                    class="form-control"
                                                                    placeholder="{{ __('careers::career.please_enter_the_career') }}"
                                                                    required data-parsley-required
                                                                    value="{{ $career->title_ar }}"
                                                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"
                                                                    data-parsley-trigger="change focusout"
                                                                    data-parsley-maxlength="150"
                                                                    data-parsley-maxlength-message="{{ __('careers::career.title_max_is_150_characters_long') }}">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label
                                                                    for="description_en">{{ __('careers::career.description_en') }}
                                                                    <small class="text-muted"> -
                                                                        {{ __('careers::career.optional') }}</small></label>
                                                                <textarea rows="6" name="description_en" id="description_en" class="form-control description_en"
                                                                    placeholder="{{ __('careers::career.enter_description') }}" data-parsley-trigger="change focusout"
                                                                    data-parsley-maxlength="4294967295"
                                                                    data-parsley-maxlength-message="{{ __('careers::career.description_max_is_4294967295_characters_long') }}"
                                                                    required data-parsley-required
                                                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}">{{ $career->description_en }}</textarea>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <label
                                                                    for="description_ar">{{ __('careers::career.description_ar') }}
                                                                    <small class="text-muted"> -
                                                                        {{ __('careers::career.optional') }}</small></label>
                                                                <textarea rows="6" name="description_ar" id="description_ar" class="form-control description_ar"
                                                                    placeholder="{{ __('careers::career.enter_description') }}" data-parsley-trigger="change focusout"
                                                                    data-parsley-maxlength="4294967295"
                                                                    data-parsley-maxlength-message="{{ __('careers::career.description_max_is_4294967295_characters_long') }}"
                                                                    required data-parsley-required
                                                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}">{{ $career->description_ar }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-6">
                                                                <label>{{ trans('careers::career.number') }}</label>
                                                                <input name="number_of_available_vacancies"
                                                                    class="form-control" type="number"
                                                                    placeholder="{{ trans('careers::career.number') }}"
                                                                    data-parsley-trigger="change focusout" required
                                                                    data-parsley-required
                                                                    value="{{ $career->number_of_available_vacancies }}"
                                                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_number_of_available_vacancies') }}" />
                                                            </div>
                                                            <div class="col-6">
                                                                <label>{{ trans('main.location') }}</label>
                                                                <input name="location" class="form-control"
                                                                    value="{{ $career->location }}" type="text"
                                                                    placeholder="{{ trans('main.location') }}"
                                                                    data-parsley-trigger="change focusout" required
                                                                    data-parsley-required
                                                                    data-parsley-required-message="{{ trans('main.location') }}" />
                                                            </div>
                                                            <div class="col-4">
                                                                <label>Type</label>
                                                                <input name="type" class="form-control"
                                                                    value="{{ $career->type }}" type="text"
                                                                    placeholder="Type"
                                                                    data-parsley-trigger="change focusout" required
                                                                    data-parsley-required
                                                                    data-parsley-required-message="Type" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit mt-3">
                                                        <div class="m-form__actions m-form__actions--solid">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <button type="button"
                                                                        class="btn btn-success update-job"
                                                                        div-id="update_career_form_{{ $career->id }}">{{ __('main.submit') }}</button>
                                                                    <button type="reset"
                                                                        class="btn btn-secondary">{{ __('main.reset') }}</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date
                            Line: 01 Jan,
                            2045</small> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            <div id="MyApplications" class="tabcontent" style="display: none;">
                @foreach ($applications as $application)
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded"
                                            src="{{ asset('storage/'.$application->career->creator->image) }}" alt=""
                                    style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $application->career->title }}</h5>
                                    <span class="text-truncate me-3"><i
                                            class="fa fa-map-marker-alt text-primary me-2"></i>{{ $application->full_name }}</span>
                                    <span class="text-truncate me-3"><i
                                            class="far fa-clock text-primary me-2"></i>{{ $application->email }}</span>
                                    <span class="text-truncate me-3"><i
                                            class="far fa-clock text-primary me-2"></i>{{ $application->phone }}</span>
                                    <p>{{ $application->message }}</p>
                                </div>
                            </div>
                            <div
                                class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    {{-- <a class="btn btn-light btn-square me-3" href=""><i
                                        class="far fa-heart text-primary"></i></a> --}}
                                    <a class="btn btn-primary" href="{{ asset('storage/' . $application->resume) }}"
                                        download>Resume</a>
                                </div>
                                {{-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date
                                Line: 01 Jan,
                                2045</small> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('careers.store') }}" method="POST" id="create_career_form"
                    enctype="multipart/form-data"
                    class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async
                    data-callback="createCareerCallback" data-parsley-validate>
                    @csrf
                    <div class="m-portlet__body">

                        <div class="col-12">
                            <label for="category_id">{{ __('categories::category.category') }}</label>
                            <select class="form-control form-select form-select-lg mb-3 " name="category_id"
                                id="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="title_en">{{ __('careers::career.title_en') }}</label>
                                <input name="title_en" id="title_en" type="text" class="form-control"
                                    placeholder="{{ __('careers::career.please_enter_the_career') }}" required
                                    data-parsley-required
                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"
                                    data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                                    data-parsley-maxlength-message="{{ __('careers::career.title_max_is_150_characters_long') }}">
                            </div>
                            <div class="col-6">
                                <label for="title_ar">{{ __('careers::career.title_ar') }}</label>
                                <input name="title_ar" id="title_ar" type="text" class="form-control"
                                    placeholder="{{ __('careers::career.please_enter_the_career') }}" required
                                    data-parsley-required
                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"
                                    data-parsley-trigger="change focusout" data-parsley-maxlength="150"
                                    data-parsley-maxlength-message="{{ __('careers::career.title_max_is_150_characters_long') }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="description_en">{{ __('careers::career.description_en') }} <small
                                        class="text-muted"> -
                                        {{ __('careers::career.optional') }}</small></label>
                                <textarea rows="6" name="description_en" id="description_en" class="form-control description_en"
                                    placeholder="{{ __('careers::career.enter_description') }}" data-parsley-trigger="change focusout"
                                    data-parsley-maxlength="4294967295"
                                    data-parsley-maxlength-message="{{ __('careers::career.description_max_is_4294967295_characters_long') }}"
                                    required data-parsley-required
                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label for="description_ar">{{ __('careers::career.description_ar') }} <small
                                        class="text-muted"> -
                                        {{ __('careers::career.optional') }}</small></label>
                                <textarea rows="6" name="description_ar" id="description_ar" class="form-control description_ar"
                                    placeholder="{{ __('careers::career.enter_description') }}" data-parsley-trigger="change focusout"
                                    data-parsley-maxlength="4294967295"
                                    data-parsley-maxlength-message="{{ __('careers::career.description_max_is_4294967295_characters_long') }}"
                                    required data-parsley-required
                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_career') }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label>{{ trans('careers::career.number') }}</label>
                                <input name="number_of_available_vacancies" class="form-control" type="number"
                                    placeholder="{{ trans('careers::career.number') }}"
                                    data-parsley-trigger="change focusout" required data-parsley-required
                                    data-parsley-required-message="{{ __('careers::career.please_enter_the_number_of_available_vacancies') }}" />
                            </div>
                            <div class="col-6">
                                <label>{{ trans('main.location') }}</label>
                                <input name="location" class="form-control" type="text"
                                    placeholder="{{ trans('main.location') }}"
                                    data-parsley-trigger="change focusout" required data-parsley-required
                                    data-parsley-required-message="{{ trans('main.location') }}" />
                            </div>
                            <div class="col-6">
                                <label>Type</label>
                                <input name="type" class="form-control" type="text" placeholder="type"
                                    data-parsley-trigger="change focusout" required data-parsley-required
                                    data-parsley-required-message="type" />
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit mt-3">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button"
                                        class="btn btn-success create-job">{{ __('main.submit') }}</button>
                                    <button type="reset" class="btn btn-secondary">{{ __('main.reset') }}</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script>
        $('.submit-from').on('click', function() {

            var form = $('#edit-info');

            /* Parsley validate front-end */
            if (!form.parsley().isValid()) {
                // Display notification
                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification .messages').append(`<span>` +
                    "{{ trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again') }}" +
                    `</span> <br>`);
                $('#notification').fadeIn("slow");
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });

                form.find('[data-parsley-type]').each(function(i, v) {
                    $(this).parsley().validate({
                        focusInvalid: false,
                        invalidHandler: function() {
                            $(this).find(":input.error:first").focus();
                        }
                    });

                    return;
                });
                form.find('[data-parsley-pattern]').each(function(i, v) {
                    $(this).parsley().validate({
                        focusInvalid: false,
                        invalidHandler: function() {
                            $(this).find(":input.error:first").focus();
                        }
                    });

                    return;
                });
                form.parsley().validate({
                    focusInvalid: false,
                    invalidHandler: function() {
                        $(this).find(":input.error:first").focus();
                    }
                });

                return;
            }

            // Request parameters
            var url = "{{ route('front.users.update') }}";
            var formData = new FormData(document.getElementById("edit-info"));

            // Send the request
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(response) {


                // Notification message
                if (response.message) {
                    // Empty notificaion messages
                    $('.messages').empty();

                    // Notification type
                    if (response.status) {
                        $('#notification').css('background-color', 'green');
                    } else {
                        $('#notification').css('background-color', 'red');
                    }

                    // Display notification
                    $('#notification .messages').append(`<span>` + response.message + `</span> <br>`);
                    $('#notification').fadeIn("slow");
                    $('.dismiss').click(function() {
                        $('#notification').fadeOut('slow')
                    });

                    // // Dismiss notification
                    // setTimeout(function() {
                    //     $('#notification').fadeOut('slow')
                    // }, 2000);
                }
            }).fail(function(xhr, error_text, statusText) {


                // Empty notification messages
                $('.messages').empty();

                // Notification type
                $('#notification').css('background-color', 'red');

                // Display notificaion
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(index, error) {
                        $('#notification .messages').append(`<span>` + error.message +
                            `</span> <br>`);
                    });
                } else {
                    $('#notification .messages').append(`<span>` + statusText + `</span> <br>`);
                }
                $('#notification').fadeIn("slow");
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });
            });
        });
    </script>
    <script>
        function openDiv(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    <script>
        $('.create-job').on('click', function() {

            var form = $('#create_career_form');

            /* Parsley validate front-end */
            if (!form.parsley().isValid()) {
                // Display notification
                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification .messages').append(`<span>` +
                    "{{ trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again') }}" +
                    `</span> <br>`);
                $('#notification').fadeIn("slow");
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });

                form.find('[data-parsley-type]').each(function(i, v) {
                    $(this).parsley().validate({
                        focusInvalid: false,
                        invalidHandler: function() {
                            $(this).find(":input.error:first").focus();
                        }
                    });

                    return;
                });
                form.find('[data-parsley-pattern]').each(function(i, v) {
                    $(this).parsley().validate({
                        focusInvalid: false,
                        invalidHandler: function() {
                            $(this).find(":input.error:first").focus();
                        }
                    });

                    return;
                });
                form.parsley().validate({
                    focusInvalid: false,
                    invalidHandler: function() {
                        $(this).find(":input.error:first").focus();
                    }
                });

                return;
            }

            // Request parameters
            var url = "{{ route('careers.store') }}";
            var formData = new FormData(document.getElementById("create_career_form"));

            // Send the request
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(response) {


                // Notification message
                if (response.message) {
                    // Empty notificaion messages
                    $('.messages').empty();

                    // Notification type
                    if (response.status) {
                        $('#notification').css('background-color', 'green');
                    } else {
                        $('#notification').css('background-color', 'red');
                    }

                    // Display notification
                    $('#notification .messages').append(`<span>` + response.message + `</span> <br>`);
                    $('#notification').fadeIn("slow");
                    $('.dismiss').click(function() {
                        $('#notification').fadeOut('slow')
                    });

                    // // Dismiss notification
                    // setTimeout(function() {
                    //     $('#notification').fadeOut('slow')
                    // }, 2000);
                    window.location.reload()
                }
            }).fail(function(xhr, error_text, statusText) {


                // Empty notification messages
                $('.messages').empty();

                // Notification type
                $('#notification').css('background-color', 'red');

                // Display notificaion
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(index, error) {
                        $('#notification .messages').append(`<span>` + error.message +
                            `</span> <br>`);
                    });
                } else {
                    $('#notification .messages').append(`<span>` + statusText + `</span> <br>`);
                }
                $('#notification').fadeIn("slow");
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });
            });
        });
    </script>


    <script>
        $('.update-job').on('click', function() {

            var form = $(`#${$(this).attr('div-id')}`);

            /* Parsley validate front-end */
            if (!form.parsley().isValid()) {
                // Display notification
                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification .messages').append(`<span>` +
                    "{{ trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again') }}" +
                    `</span> <br>`);
                $('#notification').fadeIn("slow");
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });

                form.find('[data-parsley-type]').each(function(i, v) {
                    $(this).parsley().validate({
                        focusInvalid: false,
                        invalidHandler: function() {
                            $(this).find(":input.error:first").focus();
                        }
                    });

                    return;
                });
                form.find('[data-parsley-pattern]').each(function(i, v) {
                    $(this).parsley().validate({
                        focusInvalid: false,
                        invalidHandler: function() {
                            $(this).find(":input.error:first").focus();
                        }
                    });

                    return;
                });
                form.parsley().validate({
                    focusInvalid: false,
                    invalidHandler: function() {
                        $(this).find(":input.error:first").focus();
                    }
                });

                return;
            }

            // Request parameters
            var url = "{{ route('careers.edit') }}";
            var formData = new FormData(document.getElementById(`${$(this).attr('div-id')}`));

            // Send the request
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(response) {


                // Notification message
                if (response.message) {
                    // Empty notificaion messages
                    $('.messages').empty();

                    // Notification type
                    if (response.status) {
                        $('#notification').css('background-color', 'green');
                    } else {
                        $('#notification').css('background-color', 'red');
                    }

                    // Display notification
                    $('#notification .messages').append(`<span>` + response.message + `</span> <br>`);
                    $('#notification').fadeIn("slow");
                    $('.dismiss').click(function() {
                        $('#notification').fadeOut('slow')
                    });

                    // // Dismiss notification
                    // setTimeout(function() {
                    //     $('#notification').fadeOut('slow')
                    // }, 2000);
                    window.location.reload()
                }
            }).fail(function(xhr, error_text, statusText) {


                // Empty notification messages
                $('.messages').empty();

                // Notification type
                $('#notification').css('background-color', 'red');

                // Display notificaion
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(index, error) {
                        $('#notification .messages').append(`<span>` + error.message +
                            `</span> <br>`);
                    });
                } else {
                    $('#notification .messages').append(`<span>` + statusText + `</span> <br>`);
                }
                $('#notification').fadeIn("slow");
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });
            });
        });
    </script>
@endpush
