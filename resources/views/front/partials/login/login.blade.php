@section('title', trans('auth.sign_in'))

<style>
    #notification {
    position: fixed;
    top: 30%;
    right: 7px;
    width: 20%;
    z-index: 10000;
    text-align: center;
    font-weight: normal;
    font-size: 14px;
    font-weight: bold;
    color: white;
    background-color: red;
    padding: 1rem;
    opacity: 0.7
}

#notification span.dismiss {
    border: none;
    padding: 0 5px;
    cursor: pointer;
    float: right;
    margin-right: 10px;
}

#notification a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
    section {
  position: relative;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

/* section .container {
  position: relative;
  width: 800px;
  height: 500px;
  background: #fff;
  box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
  overflow: hidden;
} */

section .container .user {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
}

section .container .user .imgBx {
  position: relative;
  width: 50%;
  height: 100%;
  transition: 0.5s;
}

section .container .user .imgBx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

section .container .user .formBx {
  position: relative;
  width: 100%;
  height: 100%;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px;
  transition: 0.5s;
}

section .container .user .formBx form h2 {
  font-size: 18px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  text-align: center;
  width: 100%;
  margin-bottom: 10px;
  color: #555;
}

section .container .user .formBx form input {
  position: relative;
  width: 100%;
  padding: 10px;
  background: #f5f5f5;
  color: #333;
  border: none;
  outline: none;
  box-shadow: none;
  margin: 8px 0;
  font-size: 14px;
  letter-spacing: 1px;
  font-weight: 300;
}

section .container .user .formBx form input[type='submit'] {
  max-width: 100px;
  background: #677eff;
  color: #fff;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.5s;
}

section .container .user .formBx form .signup {
  position: relative;
  margin-top: 20px;
  font-size: 12px;
  letter-spacing: 1px;
  color: #555;
  text-transform: uppercase;
  font-weight: 300;
}

section .container .user .formBx form .signup a {
  font-weight: 600;
  text-decoration: none;
  color: #677eff;
}

section .container .signupBx {
  pointer-events: none;
}

section .container.active .signupBx {
  pointer-events: initial;
}

section .container .signupBx .formBx {
  left: 100%;
}

section .container.active .signupBx .formBx {
  left: 0;
}

section .container .signupBx .imgBx {
  left: -100%;
}

section .container.active .signupBx .imgBx {
  left: 0%;
}

section .container .signinBx .formBx {
  left: 0%;
}

section .container.active .signinBx .formBx {
  left: 100%;
}

section .container .signinBx .imgBx {
  left: 0%;
}

section .container.active .signinBx .imgBx {
  left: -100%;
}

@media (max-width: 991px) {
  section .container {
    max-width: 400px;
  }

  section .container .imgBx {
    display: none;
  }

  section .container .user .formBx {
    width: 100%;
  }
}

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
    <div class="container">
      <div class="user signinBx">
        <div class="formBx">
          <form action="#" onsubmit="return false;" class="login-Login" data-parsley-validate>
            <h2>Sign In</h2>
            @csrf
            <input type="text"  required name="email" placeholder="{{ __('users.email') }}"
            required data-parsley-required
            data-parsley-required-message="{{ __('main.please_enter_your_email') }}"
            data-parsley-trigger="change focusout"/>
            <input type="password"  name="password" required
            placeholder="{{ __('users.password') }}" />
            <input type="submit"  value="Login"  class="submit-btn" onclick="login()"/>
            <p class="signup">
              Don't have an account ?
              <a href="#" onclick="toggleForm();">Sign Up.</a>
            </p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
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
                        <option value="{{ $group->id }}">{{ $group->slug }}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" name="full_name" placeholder="{{ __('users.full_name') }}"
            required data-parsley-required
            data-parsley-required-message="{{ __('main.please_enter_your_name') }}"
            data-parsley-trigger="change focusout" />
            <input type="email" name="email" placeholder="{{ __('users.email') }}"
            required data-parsley-required
            data-parsley-required-message="{{ __('main.please_enter_your_email') }}"
            data-parsley-trigger="change focusout" />
            <input type="text" name="mobile_number"
            placeholder="{{ __('users.mobile_number') }}" required data-parsley-required
            data-parsley-required-message="{{ __('users.please_enter_the_mobile_number') }}"
            data-parsley-trigger="change focusout" />
            <input type="password" name="password"
            placeholder="{{ __('users.password') }}" required data-parsley-required
            data-parsley-required-message="{{ __('users.please_enter_the_password') }}"
            data-parsley-trigger="change focusout" />
            <input type="password" name="password_confirmation"
            placeholder="{{ __('users.password_confirmation') }}" required data-parsley-required
            data-parsley-required-message="{{ __('users.please_enter_the_password_confirmation') }}"
            data-parsley-trigger="change focusout" />
            <input type="submit" name="" value="Sign Up" class="submit-btn" onclick="register();"/>
            <p class="signup">
              Already have an account ?
              <a href="#" onclick="toggleForm();">Sign in.</a>
            </p>
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
