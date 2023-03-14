$(function () {
    var baseUrl = $("meta[name='base-url']").attr("content");    
    // Date Mask
    $('[data-plugin="birthday_mask"]').mask('99/99/9999');
    // CPF Mask
    $('[data-plugin="cpf_mask"]').mask("999.999.999-99");
    // RG Mask
    $('[data-plugin="rg_mask"]').mask("99.999.999-9");
    // Telephone Mask
    $('[data-plugin="telephone_mask"]').mask("(99) 9999-9999");
    // Celphone Mask
    $('[data-plugin="celphone_mask"]').mask("(99) 9.9999-9999");
    // CEP Mask
    $('[data-plugin="cep_mask"]').mask("99.999-999");

    $("[data-plugin='select2']").select2({
        allowClear: !0
    });

    $("[data-plugin='select2-no-search']").select2({
        minimumResultsForSearch: -1
    });

    $("input[name='image_type']").on('change', function () {
        if ($(this).val() == 2) {
            $("input[name='thumb'], input[name='banner']").attr('type', 'text');
        } else {
            $("input[name='thumb'], input[name='banner']").attr('type', 'file');
        }
    });

    $(document).on("click", ".modal-call", function (e) {
        var modal = new Modal();
        var fullscreen = $(this).data("fullscreen") ? $(this).data("fullscreen") : false;

        if (fullscreen) {
            modal.setFullscreen(fullscreen);
        }

        modal.setParams({ id: $(this).data("id") });
        modal.setUrl($(this).data("url") ? $(this).data("url") : $(this).attr("href"));
        modal.execute();

        e.preventDefault();
    });

    $('[data-toggle="tooltip"]').tooltip(); 

    $('input[required]').keyup(function() {
        var empty = false;
        $('input[required]').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {
            $('button[type="submit"]').prop('disabled', true);
        } else {
            $('button[type="submit"]').prop('disabled', false);
        }
    });

    $('input[name="cep"], input[name="cep_commercial"').on('blur', function() {
        if(!Default.isEmpty($(this).val())){

            var street = $(this).data("cep-street");
            var district = $(this).data("cep-district");
            var state = $(this).data("cep-state");
            var city = $(this).data("cep-city");
            var focus = $(this).data("focus");

            var ajax = new Ajax(baseUrl + "ajax/cep");
            ajax.setParams({
                cep: $(this).val()
            });
            ajax.setDataType("json");
            ajax.setSuccess(function(response) {
                $("input[name="+street+"]").val(response.street);
                $("input[name="+district+"]").val(response.district);
                $("input[name="+city+"]").val(response.city);
                $("input[name="+state+"]").val(response.state);
                $("input[name="+focus+"]").focus();
            });
            ajax.getError(function(response) {
                Default.message('Erro!', 'error', 'Erro ao consultar CEP, tente novamente.');
            });
            ajax.execute();
        }
    });

    // Copy the Student Address
    var address_inputs = {"cep": "CEP", "street": "Endereço", "number": "Número", "complement": "Complemento", "district": "Bairro", "city": "Cidade", "state": "Estado", "country": "País"};
    $(document).on('change', 'input[name="same_address"]', function(e) {
        var input, input_value, isChecked;
        isChecked = $(this).is(':checked');
        $.each(address_inputs, function(key, value) {
            input_value = $('input[name="' + key + '"]').val();
            if(isChecked && input_value == "")
            {
                Swal.fire(
                    'Erro!',
                    'Você precisará preencher todos os campos do Endereço do Aluno para copiarmos!<br>O campo ' + value + ' está em branco.',
                    'warning'
                );
                $(document).attr("checked", false);
                return false;
            }
            input = $('input[name="' + key + '_commercial"]');
            input.val(input_value).attr('readonly', isChecked ?? true);
        });
    });
});

function confirmToAction(title, text, icon, rota) {
    console.log("Rota: " + rota)
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = rota;
        }
    });
}

function confirmToDeleteActivity(title, text, icon, rota) {
    console.log("Rota: " + rota)
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteMissingActivity(rota)
        }
    });
}

$.validator.addMethod("validaCPF", function(value, element) {
    value = value.replace(/[^\d]+/g,'');
  
    if (value.length !== 11 || !/^\d{11}$/.test(value)) return false;
  
    if (/^(\d)\1{10}$/.test(value)) return false;
  
    var sum = 0;
    var rest;
  
    for (var i = 1; i <= 9; i++) {
      sum = sum + parseInt(value[i-1]) * (11 - i);
    }
  
    rest = (sum * 10) % 11;
  
    if ((rest === 10) || (rest === 11)) {
      rest = 0;
    }
  
    if (rest !== parseInt(value[9])) {
      return false;
    }
  
    sum = 0;
  
    for (i = 1; i <= 10; i++) {
      sum = sum + parseInt(value[i-1]) * (12 - i);
    }
  
    rest = (sum * 10) % 11;
  
    if ((rest === 10) || (rest === 11)) {
      rest = 0;
    }
  
    if (rest !== parseInt(value[10])) {
      return false;
    }
  
    return true;
  }, "Por favor, informe um CPF válido.");
  
  $.validator.addMethod("matchPassword", function(value, element) {
    return value === $('input[name="password"]').val();
  }, "As senhas não correspondem.");