<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: auto;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        .info {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border-left: 5px solid #007BFF;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2>New Contact Message</h2>
        <div class="info">
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Phone:</strong> {{ $data['phone_number'] ?? 'N/A' }}</p>
            <p><strong>Nationality:</strong> {{ $data['nationality'] }}</p>
        </div>
        <p><strong>Message:</strong></p>
        <p class="info">{{ $data['subject'] }}</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
