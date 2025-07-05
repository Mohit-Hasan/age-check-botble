<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ theme_option('age_check_denied_title', 'Access Denied') }}</title>
    <style>
        body {
            background: #111;
            color: #fff;
            font-family: sans-serif;
            text-align: center;
            padding: 100px 20px;
        }

        h1 {
            font-size: 48px;
        }

        a {
            color: #f00;
            text-decoration: underline;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>{{ theme_option('age_check_denied_title', 'Access Denied') }}</h1>
    <p>{{ theme_option('age_check_denied_message', 'Sorry, this website is only for visitors over 18 years old.') }}</p>
    <a href="{{ url()->previous() }}">Go back</a>
</body>
</html>
