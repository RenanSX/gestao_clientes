$(function(){
    $(".btn_excluir").click(function(e){
      e.preventDefault();
      var href = $(this).attr('href');
      var r = confirm("Tem certeza que deseja excluir este registro?");
      if(r){
        location.href = href;
      }    
  });
});   
	
$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('(00) 0000-0000');
  $('.phone_with_ddd').mask('(00) 00000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});


$(function() {
  $('#staticParent').on('keydown', '#child', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
});


$(document).ready(function(e) {
  $('.selectpicker').selectpicker();
});


$(document).ready(function() {
$('form').validate({
      rules: {
        usu_cpf: {
              required: true,
              minlength: 11
          },
          usu_nome: {             
              required: true
          },
          usu_email: {              
              required: true,
              email: true
          },
          usu_senha: {              
              required: true
          },
          cli_cpfcnpj: {              
              required: true
          },
          cli_nomerazaosocial: {              
              required: true
          },
          cli_endereco: {              
              required: true
          },
          cli_endereco_numero: {              
              required: true
          },
          cli_endereco_complemento: {              
              required: true
          },
          cli_telefonecomercial: {              
              required: true
          },
          cli_telefonecelular: {              
              required: true
          },
          cli_nomedocontato: {              
              required: true
          },
          cli_email: {              
              required: true
          },
          cli_site: {              
              required: true
          },
          ramati_descricao: {
            required: true
          },
          meicon_descricao: {
            required: true
          },
          regcon_datadocontato: {
            required: true
          },
          regcon_horadocontato: {
            required: true
          },
          regcon_assuntodocontato: {
            required: true
          },
          regcon_descricao: {
            required: true
          },
          regcon_datadocontato_inicial: {
            required: true
          },
          regcon_datadocontato_final: {
            required: true
          }
      },
      highlight: function(element) {
          $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element) {
          $(element).closest('.form-group').removeClass('has-error');
      }
  });
});


function validacpfcnpj(){
  var value = $('#cli_cpfcnpj').val().replace(/[^a-zA-Z 0-9]+/g,'');

  if (value.length == 11) {
      $('input[name=cli_cpfcnpj]').mask('000.000.000-00', {reverse: true});
    }else if (value.length == 14) {
      $('input[name=cli_cpfcnpj]').mask('00.000.000/0000-00', {reverse: true});
    }else if (value.length >1 && value.length < 11 || value.length == 12 || value.length == 13 || value.length > 14) {
      document.getElementById('error-message-cpfcnpj').innerHTML="Favor informar um CPF ou CNPJ válido";
      $('#cli_cpfcnpj').val('');
    }
} 
