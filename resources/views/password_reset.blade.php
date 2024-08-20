<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <form action="{{ route('password.reset') }}" method="post">
    <h1>Password Reset Request</h1>
    <p>Click the link below to reset your password:</p>
    <a href="{{ url('password/reset/'.$token.'?email='.$email) }}">Reset Password</a>
</form>
</body>
</html>
