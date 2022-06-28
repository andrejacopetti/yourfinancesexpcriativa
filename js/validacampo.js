$(document).ready(function () {
  $('#telefone').mask('(00) 00000-0000')
  $('#button-registro').click(function () {
    $('#senhaHash').val(CryptoJS.SHA256($('#senha').val()))
    var dados = {
      email: document.getElementById('email').value,
      senha: document.getElementById('senhaHash').value,
      telefone: document.getElementById('telefone').value
    }

    var dadoscriptografado = cripto(JSON.stringify(dados))

    var dados_email = $('#email').serialize()

    email = document.getElementById('email')
    senha = document.getElementById('senha')
    oksenha = document.getElementById('oksenha')
    telefone = document.getElementById('telefone')

    let senhaok = false

    var regexemail = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/

    var regexsenha =
      /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#\.\,])[0-9a-zA-Z$*&@#\.\,]{8,}$/

    var regextelefone = /(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/g

    if (oksenha.value == senha.value) {
      senhaok = true
    } else {
      senhaok = false
    }

    if (
      regexemail.test(email.value) == true &&
      regexsenha.test(senha.value) == true &&
      regextelefone.test(telefone.value) == true &&
      senhaok == true
    ) {
      $.ajax({
        type: 'POST',
        url: 'php/bd_registro.php',
        dataType: 'JSON',
        data: {
          mensagem: dadoscriptografado
        },
        success: function (retorno) {
          if (retorno == 'OK') {
            $.ajax({
              type: 'POST',
              data: dados_email,
              url: 'php/confirmar-email-envio.php'
            })
            alert(
              'Conta criada com sucesso! Por favor, verificar caixa de email!'
            )
            window.location.href = 'login.html'
          } else {
            alert('Email ja cadastrado!')
          }
        }
      })
    } else {
      alert('Dados errados!')
    }

    // deve conter ao menos um dígito
    // deve conter ao menos uma letra minúscula
    // deve conter ao menos uma letra maiúscula
    // deve conter ao menos um caractere especial
    //deve conter ao menos 8 dos caracteres mencionados
  })
})
