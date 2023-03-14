<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    @vite(['resources/js/app.js'])

</head>

<body class="loading" data-layout-color="dark">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <a href="/"><img src="assets/images/logo-milionarios.svg" alt="" height="80" class="mx-auto"> </a>
                    </div>
                    <div class="card">
                        <div class="card-body p-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    @stack('scripts')

</body>

</html>
