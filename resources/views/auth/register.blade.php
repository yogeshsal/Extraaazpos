@extends('layouts.app')
@extends('layouts.footer')
@section('content')
<style>
.centered-div {
    /* Add styling for the centered div */
    margin-top: 150px;
}
</style>
<section
    class="auth-page-wrapper-2 py-4 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-5">
                <div
                    class="auth-card card bg-primary h-100 rounded-0 rounded-start border-0 d-flex align-items-center justify-content-center overflow-hidden p-4">
                    <div class="auth-image">
                        <img src="images/logo-light-full.png" alt="" height="42" />
                        <img src="images/effect-pattern/auth-effect-2.png" alt="" class="auth-effect-2" />
                        <img src="images/effect-pattern/auth-effect.png" alt="" class="auth-effect" />
                        <img src="images/effect-pattern/auth-effect.png" alt="" class="auth-effect-3" />
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card mb-0 rounded-0 rounded-end border-0">
                    <div class="card-body p-4 p-sm-5 m-lg-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary fs-20">Create New Account</h5>
                            <p class="text-muted">Get your free Hybrix account now</p>
                        </div>
                        <div class="p-2 mt-5">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="username" class="form-label">{{ __('Name') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="ri-user-3-line"></i></span>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Enter username" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter username
                                    </div>
                                </div>

                                <div class=" mb-3">
                                    <label for="useremail" class="form-label">{{ __('Email') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="ri-mail-line"></i></span>
                                        <input type="email" class="form-control" id="useremail" name="email"
                                            value="{{ old('email') }}" placeholder="Enter email address" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter email
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="password-input">{{ __('Password') }}</label>
                                    <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ri-lock-2-line"></i></span>
                                            <input type="password" name="password"
                                                class="form-control pe-5 password-input" onpaste="return false"
                                                placeholder="Enter password" id="password-input"
                                                aria-describedby="passwordInput"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                        </div>
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter password
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input">{{ __('Confirm Password') }}</label>
                                    <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ri-lock-2-line"></i></span>
                                            <input type="password" name="password_confirmation"
                                                class="form-control pe-5 password-input" onpaste="return false"
                                                placeholder="Re-enter password" id="password-input"
                                                aria-describedby="passwordInput"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                        </div>
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please re-enter password
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input">{{ __('Phone') }}</label>
                                    <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ri-phone-line"></i></span>
                                            <input type="number" name="phone" pattern="[0-9]{10}"
                                                placeholder="Enter Phone Number" maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                class="form-control pe-5 password-input" required>
                                        </div>

                                    </div>

                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="password-input">{{ __('Role') }}</label>
                                    <div class="position-relative auth-pass-inputgroup overflow-hidden">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ri-user-3-line"></i></span>
                                            <select name="role" class="form-select">
                                                <!-- <option selected>Select Role</option> -->
                                                <option selected value="1">Admin</option>
                                                <!-- <option value="2">Owner</option> -->
                                                <!-- <option value="3">Cashier</option>
                                                <option value="4">Manager</option>
                                                <option value="5">Waiter</option>
                                                <option value="6">Kitchen</option> -->
                                            </select>
                                        </div>

                                    </div>

                                </div>

                                <!-- <div class="mb-4">
                  <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Hybrix <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                </div> -->

                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                    <h5 class="fs-13">Password must contain:</h5>
                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)
                                    </p>
                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary w-100" type="submit">{{ __('Register') }}</button>
                                </div>

                                <!-- <div class="mt-4 text-center">
                  <div class="signin-other-title">
                    <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                  </div>

                  <div>
                    <button type="button" class="btn btn-soft-primary btn-icon "><i class="ri-facebook-fill fs-16"></i></button>
                    <button type="button" class="btn btn-soft-danger btn-icon "><i class="ri-google-fill fs-16"></i></button>
                    <button type="button" class="btn btn-soft-dark btn-icon "><i class="ri-github-fill fs-16"></i></button>
                    <button type="button" class="btn btn-soft-info btn-icon "><i class="ri-twitter-fill fs-16"></i></button>
                  </div>
                </div> -->
                            </form>
                        </div>
                        <!-- <div class="mt-4 text-center">
              <p class="mb-0">Already have an account ? <a href="auth-signin-basic-2.html" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
            </div> -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
</section>



<!-- 

<div class="container">
  <div class="centered-div">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header">{{ __('Register') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control " name="password">
                </div>
              </div>
              <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
              </div>
              <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                <div class="col-md-6">
                  <input id="phone" type="phone" class="form-control" name="phone" pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
              </div>
              <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Select Role') }}</label>
                <div class="col-md-6">
                  <select name="role" class="form-select">
                    <option selected>select Role</option>
                    <option value="1">Admin</option>
                    <option value="2">Owner</option>
                    <option value="3">Cashier</option>
                    <option value="4">Manager</option>
                    <option value="5">Waiter</option>
                    <option value="6">Kitchen</option>
                  </select>
                </div>
              </div>
              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
@endsection
<script>
// JavaScript for form validation
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        // Initialize a flag to track if the form is valid
        let formIsValid = true;
        // Clear previous error messages
        clearErrorMessages();
        // Validate name
        const nameInput = document.querySelector("#name");
        if (!nameInput.value.trim()) {
            displayErrorMessage(nameInput, "Name is required");
            formIsValid = false;
        }
        // Validate email
        const emailInput = document.querySelector("#email");
        if (!isValidEmail(emailInput.value)) {
            displayErrorMessage(emailInput, "Enter email address");
            formIsValid = false;
        }
        // Validate password
        const passwordInput = document.querySelector("#password");
        if (!isValidPassword(passwordInput.value)) {
            displayErrorMessage(passwordInput,
                "Password must be at least 8 characters, one uppercase letter, one numeric digit, and one alphabet character"
            );
            formIsValid = false;
        }
        // Validate password confirmation
        const passwordConfirmInput = document.querySelector("#password-confirm");
        if (passwordConfirmInput.value !== passwordInput.value) {
            displayErrorMessage(passwordConfirmInput, "Passwords do not match");
            formIsValid = false;
        }
        // Validate phone
        const phoneInput = document.querySelector("#phone");
        if (!isValidPhone(phoneInput.value)) {
            displayErrorMessage(phoneInput, "Invalid phone number");
            formIsValid = false;
        }
        // Validate role selection
        const roleSelect = document.querySelector("select[name='role']");
        if (roleSelect.value === 'select Role') {
            displayErrorMessage(roleSelect, "Please select a role");
            formIsValid = false;
        }
        // If the form is not valid, prevent submission
        if (!formIsValid) {
            event.preventDefault();
        }
    });

    function isValidEmail(email) {
        return /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.test(email);
    }

    function isValidPhone(phone) {
        return /^\d{10}$/.test(phone);
        const phoneInput = document.querySelector('#phone');
        if (phoneInput.value.length != 10) {
            alert('10 digit mobile number is required');
        }
    }

    function isValidPassword(password) {
        // Validate password: at least 8 characters, one uppercase letter, one numeric digit, and one alphabet character
        const hasUpperCase = /[A-Z]/.test(password);
        const hasNumeric = /[0-9]/.test(password);
        const hasAlphabet = /[a-zA-Z]/.test(password);
        return password.length >= 8 && hasUpperCase && hasNumeric && hasAlphabet;
    }

    function displayErrorMessage(inputElement, message) {
        const errorDiv = document.createElement("div");
        errorDiv.className = "text-danger";
        errorDiv.textContent = message;
        inputElement.parentNode.appendChild(errorDiv);
    }

    function clearErrorMessages() {
        const errorMessages = document.querySelectorAll(".text-danger");
        errorMessages.forEach(function(errorMessage) {
            errorMessage.remove();
        });
    }
});
</script>