<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to [Your Company]</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .content {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            color: #888888;
            font-size: 12px;
            margin-top: 20px;
        }
        .highlight {
            background-color: #f1f1f1;
            padding: 10px;
            border-left: 4px solid #007bff;
            margin: 10px 0;
            font-family: monospace;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Welcome to Krinoscco</h2>
    </div>
    <div class="content">
        <p>Hi {{ $user->name }},</p>

        <p>Thank you for registering with us! Your account has been successfully created.</p>

        <p>You can log in with the following credentials:</p>

        <div class="highlight">
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>Password:</strong> {{ $user->tempPassword }}
        </div>

        <a href="{{ url('/login') }}" class="button">Login to Your Account</a>

        <p>🔒 <strong>Security Tip:</strong> For your safety, we recommend changing your password immediately after logging in.</p>

        <p>If you did not sign up for this account, please ignore this email or contact our support team.</p>

        <p>Best regards,<br>Krinoscco Team</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Krinoscco. All rights reserved.
    </div>
</div>

</body>
</html>
