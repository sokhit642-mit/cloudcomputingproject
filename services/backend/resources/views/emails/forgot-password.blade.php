<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Request</title>
    <style>
        /* General styles for the email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            max-width: 800px;
            margin: 10px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .email-header img {
            max-width: 120px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
            text-align: center;
        }
        .email-body h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .btn-primary {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .email-footer {
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #888888;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            <img src="https://i.ibb.co/ZNL9tZX/homesport-logo.png" alt="HomeSport Logo">
        </div>
        
        <!-- Body Section -->
        <div class="email-body">
            <h1>Password Reset Request</h1>
            <p>We received a request to reset your password. Click the button below to proceed:</p>
            <a class="btn-primary" href="{{ $resetUrl }}" style="color: white">Reset Password</a>
            <p>If you didn’t request a password reset, please disregard this email.</p>
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            &copy; 2024 HomeSport. All rights reserved.
        </div>
    </div>
</body>
</html>
