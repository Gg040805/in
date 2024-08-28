<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Verify OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .register-form .form-group {
            margin-bottom: 1rem;
        }

        .register-form label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: bold;
        }

        .register-form input[type="email"],
        .register-form input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            color: #333;
            box-sizing: border-box;
        }

        .register-form button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #45a049;
        }

        .small-text {
            color: #ff0000;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .form-group:last-of-type {
            margin-top: 1.5rem;
        }

        .register-form + .register-form {
            margin-top: 1rem;
        }
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
