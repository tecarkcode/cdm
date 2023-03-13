<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    @vite(['resources/js/app.js'])
</head>

<body class="loading" data-layout-color="dark">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center mb-4">
                        <a href="/"><img src="assets/images/logo-milionarios.svg" alt="" height="80" class="mx-auto"> </a>
                    </div>
                    <div class="card">
                        <div class="card-body p-4">
                            <form action="#">
                                <div class="mb-4">
                                    <h4 class="d-flex justify-content-start align-items-center mt-0">
                                        <div class="circle bg-warning text-black">1</div>
                                        <div class="title">Meus dados pessoais</div>
                                    </h4>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome completo</label>
                                    <input class="form-control" id="name" name="name" type="text" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" id="email" name="email" type="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Celular</label>
                                    <input class="form-control" id="phone" name="phone" type="text" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Senha</label>
                                    <input class="form-control" id="password" name="password" type="password" required>
                                </div>
                                <div class="mb-4">
                                    <label for="confirm_password" class="form-label">Confirmar Senha</label>
                                    <input class="form-control" id="confirm_password" name="confirm_password"
                                        type="password" required>
                                </div>
                                <div class="mb-4">
                                    <h4 class="d-flex justify-content-start align-items-center mt-0">
                                        <div class="circle bg-warning  text-black">2</div>
                                        <div class="title">Selecione a forma de pagamento</div>
                                    </h4>
                                </div>

                                <div class="mb-4">
                                    <ul class="payment-methods">
                                        <li class="payment-method boleto">
                                            <input name="payment_methods" type="radio" id="boleto">
                                            <label for="boleto">Boleto</label>
                                        </li>
                                        <li class="payment-method creditCard">
                                            <input name="payment_methods" type="radio" id="creditCard">
                                            <label for="creditCard">Cartão credito</label>
                                        </li>
                                        <li class="payment-method pix">
                                            <input name="payment_methods" type="radio" id="pix">
                                            <label for="pix">PIX</label>
                                        </li>
                                    </ul>
                                </div>
                                <div style="height: 100px;"></div>
                                <button class="btn w-100 btn-warning">Criar conta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>

</html>
