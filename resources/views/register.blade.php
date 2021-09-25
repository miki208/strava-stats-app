<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration page</title>

    <style>
        #image-wrapper
        {
            width: 300px;
            height: 95px;
            background: #eee;
            text-align: center;
            line-height: 95px;
        }

        #strava-logo {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div id="image-wrapper">
        {{ HTML::image('img/strava_logo.png', 'Strava external account sync', array('id' => 'strava-logo')) }}
    </div>
</body>

</html>
