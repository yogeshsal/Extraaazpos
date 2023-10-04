@extends('layouts.app')
@section('content')
<style>
.centered-div {
    /* Add styling for the centered div */
    margin-top: 150px;
}
</style>
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
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" >
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
                                <input id="phone" type="phone" class="form-control" name="phone"  pattern="[0-9]{10}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                        </div>
                        <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Select Role') }}</label>
                        <div class="col-md-6">
                            <select name="role" class="form-select" >
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
</div>
@endsection
<script>
  // JavaScript for form validation
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    form.addEventListener("submit", function (event) {
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
        displayErrorMessage(passwordInput, "Password must be at least 8 characters, one uppercase letter, one numeric digit, and one alphabet character");
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
    if(phoneInput.value.length != 10) {
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
      errorMessages.forEach(function (errorMessage) {
        errorMessage.remove();
      });
    }
  });
</script>