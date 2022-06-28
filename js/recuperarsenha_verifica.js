$(document).ready(function () {
    $("#button_recuperar").click(function () {
      
      var email = $("#email").serialize();

      $.ajax({
        type: "POST",
        url: "php/recuperarsenha-mandaemail.php",
        dataType: "JSON",
        data: email,
        success: function (retorno) {
            if (retorno == 'OK') {
                alert('email de verificacao enviado!')
            }else{
                alert('email invalido!')
            }
        }
      })
  })
})