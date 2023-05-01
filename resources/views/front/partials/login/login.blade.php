@section('title', trans('auth.sign_in'))

<style>


</style>
{{-- <div class="login">
    <h2 class='text-center'>{{ __('auth.sign_in') }}</h1>
        <form action="{{ route('login') }}" class="login-Login" data-parsley-validate>
            @csrf
            <div class="mb-3">
                <input type="text" class='form-control' required name="email" placeholder="{{ __('users.email') }}"
                    required data-parsley-required
                    data-parsley-required-message="{{ __('main.please_enter_your_email') }}"
                    data-parsley-trigger="change focusout" />
            </div>

            <div class="mb-3">
                <input type="password" class='form-control' name="password" required
                    placeholder="{{ __('users.password') }}" />
            </div>

            <div class="mb-3 text-end">
                <button class="forgot-pw" type="button" data-bs-toggle="modal" data-bs-target="#forgot-modal">
                    {{ __('auth.forget_password') }}?
                </button>
            </div>

            <button type='button' class="submit-btn" onclick="login()">{{ __('auth.login') }}</button>
        </form>
        <span class="or">OR</span>

        <div class="login__social">
            <button type="button" class="login__social--facebook">
                <i class="ri-facebook-fill"></i>
            </button>
            <button type="button" class="login__social--google">
                <i class="ri-google-fill"></i>
            </button>
        </div>

        <div class="footer">
            <div class="footer-txt"><span>{{ __('auth.not_register') }}?</span></div>
            <div class="footer-link"><a id='registerBtn' href="#">{{ __('auth.create_account') }}</a></div>
        </div>
</div> --}}
<section>
    <div class="container d-flex flex-wrap justify-content-between">
      <div class="user signinBx col-md-5 col-sm-12">
        <div class="formBx">
          <form action="#" onsubmit="return false;" class="login-Login form-group" data-parsley-validate>
            <h2>Sign In</h2>
            @csrf
            <input type="text"  required name="email" class="form-control mb-4" placeholder="{{ __('users.email') }}"
            required data-parsley-required
            data-parsley-required-message="{{ __('main.please_enter_your_email') }}"
            data-parsley-trigger="change focusout"/>
            <input type="password"  name="password" required class="form-control"
            placeholder="{{ __('users.password') }}" />
            <input type="submit"  value="Login"  class="submit-btn btn btn-success mt-3" onclick="login()"/>
          </form>
        </div>
      </div>
      <div class="user signupBx col-md-6 col-sm-12 p-5" style="border-left: 1px solid gray;">
        <div class="formBx">
          <form action="" onsubmit="return false;" method="POST" class="login-Register" data-parsley-validate>
            @csrf
            <h2>Create an account</h2>
            <div class="mb-3">
                <select class='form-select dd-select' placeholder='Your experience' name="group_id"
                    title='{{ trans('main.who_are_you') }}' required data-parsley-required
                    data-parsley-required-message="{{ __('main.who_you_are_required') }}"
                    data-parsley-trigger="change focusout" data-parsley-errors-container="#who_error_container">
                    <option value=""></option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->slug == 'customers' ? __('main.users'  : $group->slug) }}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" name="full_name" placeholder="{{ __('users.full_name') }}"
            required data-parsley-required class="form-control mb-4"
            data-parsley-required-message="{{ __('main.please_enter_your_name') }}"
            data-parsley-trigger="change focusout" />
            <input type="email" name="email" placeholder="{{ __('users.email') }}"
            required data-parsley-required class="form-control mb-4"
            data-parsley-required-message="{{ __('main.please_enter_your_email') }}"
            data-parsley-trigger="change focusout" />
            <input type="text" name="mobile_number" class="form-control mb-4"
            placeholder="{{ __('users.mobile_number') }}" required data-parsley-required
            data-parsley-required-message="{{ __('users.please_enter_the_mobile_number') }}"
            data-parsley-trigger="change focusout" />
            <input type="password" name="password" class="form-control mb-4"
            placeholder="{{ __('users.password') }}" required data-parsley-required
            data-parsley-required-message="{{ __('users.please_enter_the_password') }}"
            data-parsley-trigger="change focusout" />
            <input type="password" name="password_confirmation" class="form-control mb-4"
            placeholder="{{ __('users.password_confirmation') }}" required data-parsley-required
            data-parsley-required-message="{{ __('users.please_enter_the_password_confirmation') }}"
            data-parsley-trigger="change focusout" />
            <input type="submit" name="" value="Sign Up" class="submit-btn btn btn-primary" onclick="register();"/>

          </form>
        </div>
      </div>
    </div>
  </section>
@push('scripts')
    <script>
        const toggleForm = () => {
        const container = document.querySelector('.container');
        container.classList.toggle('active');
};
    </script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>

    <script>
        // SELECT PICKER PLUGIN INIT
        $('.users-select').selectpicker();
    </script>
    <!-- Login Request -->
    <script>
        function login() {
            var form = $('.login-Login');
            console.log(form);
            /* Parsley validate front-end */
            if (!form.parsley().isValid()) {

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

            var url = "{{ route('front.login') }}";
            var data = $('.login-Login').serialize();
            var headers = {
                'content-type': 'application/json'
            }


            // Send Request
            $.post(url, data, headers).done(function(response) {

                // Redirect
                if (response.redirect_to) {
                    window.location.href = response.redirect_to;
                } else {
                    window.location.href = "{{ route('home') }}";
                }

            }).fail(function(xhr, error_text, statusText) {

            });

        }
    </script>
  <!-- Register -->
  <script>
    function register() {
        var form = $('.login-Register');

        /* Parsley validate front-end */
        if (!form.parsley().isValid()) {

            form.find('[data-parsley-type]').each(function(i, v) {
                $(this).parsley().validate({
                    focusInvalid: false,
                    invalidHandler: function() {
                        $(this).find(":input.error:first").focus();
                    }
                });

                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification').fadeIn("slow");
                $('#notification .messages').append(`<span>` +
                    "{{ trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again') }}" +
                    `</span> <br>`);
                $('.dismiss').click(function() {
                    $('#notification').fadeOut('slow')
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
                $('.messages').empty();
                $('#notification').css('background-color', 'red');
                $('#notification').fadeIn("slow");
                $('#notification .messages').append(`<span>` +
                    "{{ trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again') }}" +
                    `</span> <br>`);
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
            $('#notification .messages').append(`<span>` +
                "{{ trans('main.oh_snap_change_a_few_thing_up_and_try_submitting_again') }}" + `</span> <br>`);
            $('.dismiss').click(function() {
                $('#notification').fadeOut('slow')
            });

            return;
        }

        var url = "{{ route('register') }}";
        var data = $('.login-Register').serialize();
        var headers = {
            'content-type': 'application/json'
        }


        // Send Request
        $.post(url, data, headers).done(function(response) {

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

            // Dismiss notification
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

    }
</script>
@endpush
