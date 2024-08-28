<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Change Verification</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>We received a request to change your email address. Please click the link below to verify the change:</p>
    <p><a href="{{ $verificationUrl }}">Verify Email Change</a></p>
    <p>If you did not request this change, you can ignore this email.</p>
    <p>Thank you!</p>
</body>
</html>
