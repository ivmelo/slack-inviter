<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Entrar para {{ env('SLACK_HOST_NAME') }} no Slack.</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>

    <style type="text/css">
        body {
            background-color: #f9f9f9;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            /*margin-top: -100px;*/
            width: 100%;
        }
        .column {
            max-width: 450px;
        }

        .simple.text {
            color: #95a5a6;
        }
    </style>

</head>
<body>
    @yield('content')

    @yield('scripts')
</body>

</html>
