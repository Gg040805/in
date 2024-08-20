<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>

<div class="reset-container">
    <h2>Reset Password</h2>
    <form class="reset-form" action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button type="submit">Reset Password</button>
        </div>
    </form>
    
    <div class="forgot-password">
        <span>Or forget password? <a href="{{ route('password.request') }}">Click here</a></span>
    </div>
</div>

</body>
</html>
