function verifica_login() {
  $.ajax({
    type: 'POST',
    url: 'php/verifica_login_pag.php',
    dataType: 'JSON',
    success: function (retorno) {
      if (retorno == 'LOGADO') {
        window.location.replace('main.html')
      }
    }
  })
}

window.onload = verifica_login()

$(document).ready(function () {
  $('#button-acessar').click(function () {
    $('#senhaHash').val(CryptoJS.SHA256($('#senha').val()))
    var dados = {
      email: document.getElementById('email').value,
      senha: document.getElementById('senhaHash').value
    }
    var dadoscriptografado = cripto(JSON.stringify(dados))

    $.ajax({
      type: 'POST',
      url: 'php/login.php',
      dataType: 'JSON',
      data: {
        mensagem: dadoscriptografado
      },
      success: function (retorno) {
        if (retorno == 'Achou') {
          $.ajax({
            type: 'POST',
            url: 'php/Two-Factores.php',
            dataType: 'JSON'
          })
          window.location.href = './doisfatores.html'
        }
      }
    })
  })
})
