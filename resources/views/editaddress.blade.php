<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Address</title>
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
            font-weight: bold;
            color: #555; /* Slightly lighter text color for labels */
            font-size: 1.1rem; /* Slightly larger font size */
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px; /* More rounded corners */
            font-size: 1rem;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: #3498db; /* Change border color on focus */
            outline: none; /* Remove default outline */
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
        <h1>Edit Address</h1>
        <form action="{{ route('address.update', $address->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="address1">Address Line 1:</label>
                <input type="text" id="address1" name="address1" value="{{ old('address1', $address->address1) }}" required>
            </div>
            
            <div class="form-group">
                <label for="address2">Address Line 2:</label>
                <input type="text" id="address2" name="address2" value="{{ old('address2', $address->address2) }}">
            </div>
            
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" value="{{ old('city', $address->city) }}" required>
            </div>

            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" id="state" name="state" value="{{ old('state', $address->state) }}" required>
            </div>

            <div class="form-group">
                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $address->postcode) }}" required>
            </div>

            <button type="submit" class="btn">Update Address</button>
        </form>

        <div class="button-container">
            <a href="{{ route('udata') }}" class="btn">Back to User Data</a>
        </div>
    </div>
</body>
</html>
