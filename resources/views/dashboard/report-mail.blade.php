<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
        }
        h5 {
            font-size: 24px;
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 12px;
            line-height: 1.2;
        }
        .label {
            font-weight: bold;
            margin-top: 10px;
        }
        .value {
            margin-left: 5px;
            color: #555;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h5>Test Report</h5>
        <p>Hello Dev, your user has made a report. You can see the details below:</p>
        <p class="label">Reporter Email:<span class="value">{{$reporterEmail}}</span></p>
        <p class="label">Repor Token:<span class="value">{{$token}}</span></p>
        <p class="label">Description:<span class="value">{{$description}}</span></p>
        <p class="label">Wallpaper ID:<span class="value">{{$wallpaperId}}</span></p>
        <p class="label">Wallpaper Name:<span class="value">{{$wallpaperName}}</span></p>
        <p class="label">Wallpaper Owner Name:<span class="value">{{$ownerName}}</span></p>
        <p class="label">Wallpaper Owner Email:<span class="value">{{$ownerEmail}}</span></p>
        <div class="footer">Thank you for reviewing this report.</div>
    </div>
</body>
</html>
