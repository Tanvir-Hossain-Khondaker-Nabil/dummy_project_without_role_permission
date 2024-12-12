@extends('backend.auth.layouts.master')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
        @error('email')
        <code>*{{$message}}</code>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group auth-pass-inputgroup">
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
            <button class="btn btn-light" type="button" id="toggle-password">
                <i class="mdi mdi-eye-outline" id="password-icon"></i>
            </button>
        </div>
        @error('password')
        <code>*{{$message}}</code>
        @enderror
    </div>

    <div class="mt-5 d-grid">
        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
    </div>

</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Debugging check: Ensure jQuery is loaded and click event is working
        console.log('jQuery Loaded:', $.fn.jquery);

        // Password visibility toggle
        $('#toggle-password').click(function() {
            // Debugging check: Log to ensure the button is clicked
            console.log('Password Toggle Clicked');
            
            var passwordField = $('#password');
            var passwordIcon = $('#password-icon');
            
            // Check the current type of the password field
            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text'); // Change to text to show password
                passwordIcon.removeClass('mdi-eye-outline').addClass('mdi-eye-off-outline'); // Change icon to eye-off
                console.log('Password Visible');
            } else {
                passwordField.attr('type', 'password'); // Change back to password to hide text
                passwordIcon.removeClass('mdi-eye-off-outline').addClass('mdi-eye-outline'); // Change icon to eye
                console.log('Password Hidden');
            }
        });
    });
</script>

@endsection
