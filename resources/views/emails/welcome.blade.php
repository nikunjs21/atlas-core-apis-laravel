<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
</head>
<body>
    <h1>Welcome to Our Platform, {{ $user->name }}!</h1>
    <p>We're excited to have you on board. Here are some resources to get you started:</p>
    <ul>
        <li><a href="{{ url('/getting-started') }}">Getting Started Guide</a></li>
        <li><a href="{{ url('/support') }}">Support Center</a></li>
        <li><a href="{{ url('/community') }}">Community Forums</a></li>
    </ul>
    <p>If you have any questions, feel free to reach out to our support team.</p>
    <p>Best regards,<br>The Team</p>
</body>
</html>