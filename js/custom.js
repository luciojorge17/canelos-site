let hoje = new Date();
let ano = hoje.getFullYear();
document.getElementById('ano').innerHTML = ano;

$(function () {
  if ($(window).width() >= 1024) {
    $("#carrosel img").each(function () {
      $(this).attr("src", $(this).attr("src").replace("mobile", "desktop"));
    });
  }
});

$('#btn-menu').on('click', function () {
  $('aside').toggleClass('d-none');
  $(this).toggleClass('active');
  if ($(this).hasClass('active')) {
    $(this).html(`<i class="far fa-times text-danger"></i>`);
    $('#link-delivery').hide();
    $('section').hide();
    $('footer').hide();
  } else {
    $(this).html(`<i class="fal fa-bars"></i>`);
    $('#link-delivery').show();
    $('section').show();
    $('footer').show();
  }
})

$('#form-contato').on('submit', function (e) {
  e.preventDefault();
  let form = new FormData($(this)[0]);
  $.ajax({
    url: 'email/enviar.php',
    type: 'post',
    data: form,
    processData: false,
    cache: false,
    contentType: false,
    beforeSend: function () {
      $('#form-contato button').html(`Enviando<span class="float-right"><i class = "fas fa-spinner fa-spin"></i></span>`);
      $('#form-contato button').prop('disabled', true);
      $('#form-contato button').addClass('disabled');
    }
  }).done(function (data) {
    console.log(data);
    $('#form-contato button').html(`Enviado<span class="float-right"><i class = "fal fa-check"></i></span>`);
    $('#form-contato button').removeClass('btn-danger');
    $('#form-contato button').addClass('btn-success');
    setTimeout(() => {
      limparFormContato();
    }, 1500);
  }).fail(function () {
    limparFormContato();
  });
});

function limparFormContato() {
  $('#form-contato input').val("");
  $('#form-contato textarea').val("");
  $('#form-contato button').html(`Enviar<span class="float-right"><i
  class="fal fa-paper-plane"></i></span>`);
  $('#form-contato button').prop('disabled', false);
  $('#form-contato button').removeClass('disabled');
  $('#form-contato button').removeClass('btn-success');
  $('#form-contato button').addClass('btn-danger');
}