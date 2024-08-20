<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light background color */
            color: #333; /* Dark text color */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff; /* White background for the form */
            border-radius: 12px; /* More rounded corners */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Deeper shadow */
            border: 1px solid #ddd; /* Border for the container */
            box-sizing: border-box; /* Ensures padding does not affect width */
        }
        h1 {
            color: #2c3e50; /* Dark color for the heading */
            margin-bottom: 20px;
            text-align: center;
            font-size: 2.5rem; /* Larger font size */
            font-weight: 600; /* Semi-bold */
        }
        .user-info {
            margin-bottom: 20px;
        }
        .user-info label {
            font-weight: bold;
            color: #555; /* Slightly lighter text color for labels */
            font-size: 1.1rem; /* Slightly larger font size */
            display: block;
            margin-bottom: 5px;
        }
        .user-info p {
            margin: 0;
            padding: 5px 0;
            font-size: 1rem;
        }
        .button-container {
            text-align: right; /* Align buttons to the right */
        }
        .btn {
            background-color: #3498db; /* Primary color */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px; /* More rounded corners */
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
            display: inline-block; /* Inline-block display for buttons */
            text-align: center; /* Center text */
            transition: background-color 0.3s; /* Smooth transition */
            margin: 20px 0; /* Margin around the button */
        }
        .btn:hover {
            background-color: #2980b9; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Data</h1>

        <div class="user-info">
            <label for="name">Name:</label>
            <p id="name">{{ $user->name }}</p>
        </div>

        <div class="user-info">
            <label for="email">Email:</label>
            <p id="email">{{ $user->email }}</p>
        </div>
        @if ($addresses->isNotEmpty())
            <h2>Addresses</h2>
            @foreach ($addresses as $address)
                <div class="user-info">
                    <p><strong>Address Line 1:</strong> {{ $address->address1 }}</p>
                    <p><strong>Address Line 2:</strong> {{ $address->address2 }}</p>
                    <p><strong>City:</strong> {{ $address->city }}</p>
                    <p><strong>State:</strong> {{ $address->state }}</p>
                    <p><strong>Postcode:</strong> {{ $address->postcode }}</p>
                </div>
            @endforeach
        @else
            <p>No addresses found.</p>
        @endif

        <div class="button-container">
            <a href="{{ route('profile.edit') }}" class="btn">Edit Profile</a>
            <a href="{{ route('home') }}" class="btn">Back to Main Page</a>
        </div>
    </div>
</body>
</html>
