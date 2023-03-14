@extends('layouts.register')

@section('title', 'Novo Registro')

@section('content')
    <form action="#" class="parsley-example">
        <div class="mb-4">
            <h4 class="d-flex justify-content-start align-items-center mt-0">
                <div class="circle bg-warning text-black">1</div>
                <div class="title">Meus dados pessoais</div>
            </h4>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nome completo</label>
            <input class="form-control" id="name" name="name" type="text" parsley-trigger="change"  required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" id="email" name="email" type="email" required>
            <small class="text-warning"><i class="fa fa-exclamation-triangle"></i> Sua senha será enviada para o e-mail informado</small>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Celular</label>
            <div class="form-group">
                <input type="tel" class="form-control w-100" id="phone" name="phone">
              </div>    
        </div>
        <hr>
        <div class="mb-3">
            <h4 class="d-flex justify-content-start align-items-center mt-0">
                <div class="circle bg-warning  text-black">2</div>
                <div class="title">Selecione a forma de pagamento</div>
            </h4>
        </div>

        <div class="mb-4">
            <ul class="payment-methods">
                <li class="payment-method boleto">
                    <input name="payment_methods" type="radio" id="boleto" value="1">
                    <label for="boleto">Boleto</label>
                </li>
                <li class="payment-method creditCard">
                    <input name="payment_methods" type="radio" id="creditCard" value="2">
                    <label for="creditCard">Cartão credito</label>
                </li>
                <li class="payment-method pix">
                    <input name="payment_methods" type="radio" id="pix" value="3">
                    <label for="pix">PIX</label>
                </li>
            </ul>
        </div>
        <div style="height: 80px;"></div>

        <div class="row">
            
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="document" class="form-label">CPF</label>
                    <input class="form-control" id="document" name="document" type="text" required>
                </div>
            </div>            
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="holder_name" class="form-label">Nome que consta no cartão</label>
                    <input class="form-control" id="holder_name" name="holder_name" type="text" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="number" class="form-label">Número do cartão</label>
                    <input class="form-control" id="number" name="number" type="tel" required>
                </div>
            </div>
            <div class="col-md-6">   
                <div class="mb-3">                 
                    <label for="date_expire" class="form-label">Data da validade </label>
                    <input class="form-control" id="date_expire" name="date_expire" type="text" required>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="mb-3">                   
                    <label for="cvv" class="form-label">CVV</label>
                    <input class="form-control" id="cvv" name="cvv" type="tel" required>
                </div>
            </div>
        </div>

        <button class="btn w-100 btn-warning"><i class="fa fa-check"></i> Efetuar pagamento</button>       
    </form>
    @push('scripts')
        <script>
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                onlyCountries: ["br", "us"],
                preferredCountries: ["br"],
                separateDialCode: true,
                utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });
            $(input).addClass("form-control").attr('placeholder', '');
        </script>        
    @endpush
@endsection