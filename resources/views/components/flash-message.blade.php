<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<style>
   

    .message-box {
        position: absolute;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        width: 300px;
        padding: 20px;
        margin-top: 10%;
        margin-left: 40%;
    }

    .message-box h2 {
        color: #333;
        margin-bottom: 10px;
    }

    .message-box p {
        color: #555;
        margin-bottom: 20px;
    }

    .close-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .close-button:hover {
        background-color: #0056b3;
    }
</style>

@if(session()->has('message'))
<div class="message-box">
    <h2>Alert message</h2>
    <p>{{ session("message") }}</p>
    <button class="close-button" onclick="closeMessageBox()">Close</button>
</div>
@endif

<script>
    function closeMessageBox() {
        document.querySelector(".message-box").style.display = "none";
    }
</script>