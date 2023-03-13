<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
		<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
		<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        @vite(['resources/js/app.js'])
    </head>

    <body class="loading" data-layout-color="dark">

        <div class="account-pages my-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">   
                            <a href="index.html">
                                <img src="assets/images/logo-dark.png" alt="" height="22" class="mx-auto">
                            </a>
                            <p class="text-muted mt-2 mb-4">~</p>
                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Acessar Plataforma</h4>
                                </div>

                                <form action="#">
                                    <div class="mb-3">
                                        <label for="email_cnpj" class="form-label">CNPJ/E-mail</label>
                                        <input class="form-control" type="email" id="email_cnpj" name="email_cnpj" placeholder="Digite seu e-amil ou CNPJ">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Senha</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Digite sua senha">
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                            <label class="form-check-label" for="checkbox-signin">Lembrar-me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-lock-open  me-1"></i> Entrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ms-1"><i class="fa fa-lock me-1"></i> Esqueci minha senha!</a></p>
                                <p class="text-muted">Não tem uma conta? <a href="pages-register.html" class="text-dark ms-1"><b>Criar conta</b></a></p>
                            </div> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
        
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>
</html>