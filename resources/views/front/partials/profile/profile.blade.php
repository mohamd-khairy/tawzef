@section('title', trans('users.user_info'))

<nav aria-label="breadcrumb">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('front.home')}}">{{__('main.home_title')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('main.manage_your_profile')}}</li>
      </ol>
    </div>
  </nav>

  <main class="main-content">
    <section class="manage-profile-page py-5">
      <div class="container-fluid">

        <div class="section-title">
          <h2 class='title'>{{__('users.edit_profile')}}</h2>
        </div>

        <div class="manage-profile-holder">
          <form action=""id="edit-info" enctype="multipart/form-data" data-parsley-validate>
            @csrf
            <input type="hidden" name="id" id="id" value="{{auth()->user()->id}}" />

            <div class="row">
              <div class="col-md-8">
                <div class="custom-file-input mb-3">
                  <div class="avatar rounded-circle">
                    <img class="rounded-circle img-thumbnail" id="output" src="{{URL::asset($user->image)}}" alt="{{$user->full_name}}">
                  </div>

                  <label class="form-label" for="ch-img">
                    <i class="ri-camera-line"></i>
                    {{__('users.change')}} {{__('users.profile_image')}}
                  </label>
                  <input class="form-control" id="ch-img" type="file" name="image"
                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                    <input type="text" class='form-control' value="{{$user->username}}" name="username" placeholder="{{__('users.username')}}"required data-parsley-required data-parsley-required-message="{{__('users.username_is_required')}}" data-parsley-trigger="change focusout" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                    <input type="text" class='form-control' value="{{$user->full_name}}" name="full_name" placeholder="{{__('users.full_name')}}" required data-parsley-required data-parsley-required-message="{{__('main.please_enter_your_name')}}" data-parsley-trigger="change focusout" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <input type="text" class='form-control' value="{{$user->email}}" name="email" placeholder="{{__('users.email')}}" required data-parsley-required data-parsley-required-message="{{__('main.please_enter_your_email')}}" data-parsley-trigger="change focusout" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <input type="text" class='form-control' value="{{$user->mobile_number}}" value name="mobile_number" placeholder="{{__('users.mobile_number')}}" required data-parsley-required data-parsley-required-message="{{__('users.please_enter_the_mobile_number')}}" data-parsley-trigger="change focusout" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <input type="password" class='form-control' name="password" placeholder="{{__('users.password')}}" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <input type="password" class='form-control' name="password_confirmation" placeholder="{{__('users.password_confirmation')}}" />
                </div>
              </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <textarea type="text" class='form-control bio' rows="2" name="bio" placeholder="{{__('users.bio')}}">{{$user->bio}}</textarea>
                    </div>
                </div>
              <div class="col-md-6">
                <div class="d-flex gap-2">
                    <button type='button' class="site-btn submit m-0 submit-from">{{__('main.submit')}} {{__('users.change')}}</button>
                  <button type='reset' class="btn btn-outline-secondary"> {{__('users.cancel')}}</button>
                </div>
              </div>

            </div>
          </form>

        </div>
      </div>
    </section>
  </main>
@push('scripts')
    <script>
        $('.submit-from').on('click', function() {

            var form = $(this).closest('form');

            /* Parsley validate front-end */
            if (!form.parsley().isValid()) {  
				// Display notification                
                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification .messages').append(`<span>` + "{{trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again')}}" + `</span> <br>`);
                $('#notification').fadeIn("slow");
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });

                form.find( '[data-parsley-type]' ).each( function( i , v ){
                    $(this).parsley().validate({
                        focusInvalid: false,
                        invalidHandler: function() {
                            $(this).find(":input.error:first").focus();
                        }
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
            var url = "{{route('front.users.update')}}";
            var formData = new FormData(document.getElementById("edit-info"));

            // Block UI
            $.blockUI({
                overlayColor: "#000000",
                type: "loader",
                state: "success",
                message: "{{trans('main.please_wait')}}"
            });

            // Send the request
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
            }).done(function(response) {
            	// Unblock UI
                $.unblockUI();

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
                // Unblock UI
                $.unblockUI();

                // Empty notification messages
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
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
                });
            });
        });
    </script>
@endpush