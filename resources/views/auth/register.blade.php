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
            
                <input type="radio" class="btn-check" name="payment" id="payment1" autocomplete="off">
                <label class="btn btn-warning p-3" for="payment1"><i class="fas fa-list"></i> <b class="ms-2">Boleto</b></label>
              
                <input type="radio" class="btn-check" name="payment" id="payment2" autocomplete="off">
                <label class="btn btn-warning p-3" for="payment2"><i class="fas fa-credit-card"></i> <b class="ms-2">Cartão de crédito</b></label>
              
                <input type="radio" class="btn-check" name="payment" id="payment3" autocomplete="off">
                <label class="btn btn-warning p-3" for="payment3"><i class="fas fa-money-bill-wave"></i> <b class="ms-2">PIX</b></label>
        </div>
        {{-- <div style="height: 80px;"></div> --}}

        <div class="row d-none">            
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

        <button class="btn w-100 btn-warning p-2" onclick="notification()"><i class="fa fa-check"></i> Efetuar pagamento</button>       
    </form>

    @push('scripts')
        <script>
            const id = 10;
            function notification()
            {
                console.log('[Notification] Initialize...');
                
                Echo.channel('channel-public').listen('PaymentStatusUpdated', e => {
                    alert(e.status);
                });

                console.log('[Notification] Initialized.');
            }            
        </script>
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