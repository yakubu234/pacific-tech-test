<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Confirmation</title>
    <style>
        /* Add any custom styling for the email here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e1e1e1;
        }
        .email-heading {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .email-body {
            font-size: 16px;
        }
        .confirmation-link {
            text-align: center;
            margin-bottom: 20px;
        }
        .confirmation-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .email-footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
        .email-footer a {
            color: #888;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-content">
        <div class="email-heading">{{ $subject }}</div>
        <div class="email-body">
            <p>Hello {{ $user->name }},</p>
            <p>Thank you for signing up! We're excited to have you on board.</p>
            <p>Please click the button below to confirm your account:</p>
            <div class="confirmation-link">
                <a href="{{ $token }}" target="_blank">Confirm Account</a>
            </div>
            <p>If you didn't sign up for an account, you can safely ignore this email.</p>
        </div>
        <div class="email-footer">
            <p>Thank you for using our service.</p>
            <p>If you need any assistance, please contact support at <a href="mailto:support@example.com">support@example.com</a>.</p>
        </div>
    </div>
</body>
</html>
