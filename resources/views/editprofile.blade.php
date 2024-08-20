<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555; /* Slightly lighter text color for labels */
            font-size: 1.1rem; /* Slightly larger font size */
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px; /* More rounded corners for input fields */
            font-size: 1rem;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
            transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transition */
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #3498db; /* Change border color on focus */
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.5); /* Subtle shadow */
            outline: none;
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
            display: block; /* Block display for the box effect */
            text-align: center; /* Center text */
            transition: background-color 0.3s; /* Smooth transition */
            margin: 20px 0; /* Margin around the button */
        }
        .btn:hover {
            background-color: #2980b9; /* Darker shade on hover */
        }
        .alert {
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text */
            border: 1px solid #f5c6cb; /* Red border */
            padding: 15px;
            border-radius: 8px; /* More rounded corners */
            margin-bottom: 20px;
            font-size: 1rem;
            transition: opacity 0.3s; /* Smooth transition */
        }
        .alert-success {
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Dark green text */
            border: 1px solid #c3e6cb; /* Green border */
        }
        .alert.fade-out {
            opacity: 0;
        }
        .button-container {
            text-align: right; /* Align buttons to the right */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="address1">Address Line 1:</label>
                <input type="text" id="address1" name="address1" value="{{ old('address1', $user->address1) }}">
            </div>

            <div class="form-group">
                <label for="address2">Address Line 2:</label>
                <input type="text" id="address2" name="address2" value="{{ old('address2', $user->address2) }}">
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}">
            </div>

            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" id="state" name="state" value="{{ old('state', $user->state) }}">
            </div>

            <div class="form-group">
                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $user->postcode) }}">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn">Update Profile</button>
        </form>

        <div class="button-container">
            <a href="/address" class="btn">Add Address</a>
        </div>
    </div>

    <!-- Optional JavaScript for alert fade-out effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.add('fade-out');
                }, 5000); // Fade out after 5 seconds
            });
        });
    </script>
</body>
</html>
