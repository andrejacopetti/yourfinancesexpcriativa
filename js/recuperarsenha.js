$(document).ready(function () {
  $("#button_recuperar").click(function () {
    $('#senhaHash').val(CryptoJS.SHA256($('#senha').val()))

    var dados = {
      senha: document.getElementById('senhaHash').value
    }

    var dadoscriptografado = cripto(dados)

    senha = document.getElementById("senha");
    oksenha = document.getElementById("oksenha");

    let senhaok = false;

    var regexsenha =
      /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#\.\,])[0-9a-zA-Z$*&@#\.\,]{8,}$/;

    if (oksenha.value == senha.value) {
      senhaok = true;
    } else {
      senhaok = false;
    }

    if (regexsenha.test(senha.value) == true && senhaok == true) {
      $.ajax({
        type: "POST",
        url: "php/bd_recuperar-senha.php",
        dataType: "JSON",
        data: {
          mensagem: dadoscriptografado
        },
        success: function (retorno) {
          if (retorno == "OK") {
            alert("Senha alterada com sucesso!");
            window.location.href = "login.html";
          } else {
            alert('Erro, confirme o email primeiro!')
          }
        },
      });
    } else {
      alert("Dados errados!");
    }
  });
});
