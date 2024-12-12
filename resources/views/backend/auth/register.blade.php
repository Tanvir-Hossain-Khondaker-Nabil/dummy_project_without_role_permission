@extends('backend.auth.layouts.master')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name Field -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" value="{{ old('name') }}">
        @error('name')
        <code>*{{$message}}</code>
        @enderror
    </div>

    <!-- Email Field -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ old('email') }}">
        @error('email')
        <code>*{{$message}}</code>
        @enderror
    </div>

    <!-- Password Field -->
    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group auth-pass-inputgroup">
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
            <button class="btn btn-light" type="button" id="toggle-password">
                <i class="mdi mdi-eye-outline" id="password-icon"></i>
            </button>
        </div>
        @error('password')
        <code>*{{$message}}</code>
        @enderror
    </div>

    <!-- Confirm Password Field -->
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <div class="input-group auth-pass-inputgroup">
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Your Password">
        </div>
        @error('password_confirmation')
        <code>*{{$message}}</code>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="mt-5 d-grid">
        <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
    </div>

</form>

<!-- jQuery Script for Password Visibility Toggle -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Password visibility toggle functionality
        $('#toggle-password').click(function() {
            var passwordField = $('#password');
            var passwordIcon = $('#password-icon');

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text'); // Show password
                passwordIcon.removeClass('mdi-eye-outline').addClass('mdi-eye-off-outline'); // Change icon to eye-off
            } else {
                passwordField.attr('type', 'password'); // Hide password
                passwordIcon.removeClass('mdi-eye-off-outline').addClass('mdi-eye-outline'); // Change icon to eye
            }
        });
    });
</script>

@endsection
