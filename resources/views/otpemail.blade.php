<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        /* Same styles as your registration form */
    </style>
</head>
<body>

<div class="register-container">
    <h2>Verify OTP</h2>
    <form class="register-form" action="{{ route('otp.verify.post') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            @php 
                if(isset($_GET["email"])){
                    $email=$_GET["email"];
                    $otp=$_GET["otp"];
                }else{
                    $email="";
                    $otp="";
                }
            @endphp
            <input type="email" id="email" name="email" value="{{ $email}}" required>
            @error('email')
                <p class="small-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="otp">OTP:</label>
            <input type="text" id="otp" name="otp" value="{{ $otp }}" required>
            @error('otp')
                <p class="small-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit">Verify</button>
        </div>
    </form>

    <form class="register-form" action="{{ route('otp.resend') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="email" value="{{ old('email') }}">
            <button type="submit">Resend OTP</button>
        </div>
    </form>
</div>

</body>
</html>
