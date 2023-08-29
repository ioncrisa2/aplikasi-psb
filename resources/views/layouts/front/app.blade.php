<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('front/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('front/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <style>
        .custom-textarea {
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0;
            appearance: none;
        }

        .custom-select {
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0;
            appearance: none;
        }

        .custom-select::-ms-expand {
            display: none;
        }

        .custom-select option:checked {
            background-color: #f8f9fa;
        }

        .form-control{
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0;
            appearance: none;
        }
    </style>

</head>

<body>

    <div class="main">
        <div class="container">
            @yield('content')
        </div>

    </div>

    <!-- JS -->
    <script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('script')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
