function verifica_login(){
  $.ajax({
    type: "POST",
    url: "php/verifica_acesso_2fatores.php",
    dataType: "JSON",
    success: function (retorno) {
      if (retorno == "NO") {
        alert("Faca login antes! Redirecionando para a pagina de login!");
        window.location.replace("login.html");
      }
    }
  })
}

window.onload = verifica_login()


$(document).ready(function () {
  $("#button_codigo").click(function () {
    var codigo = $("#codigo").serialize();

    $.ajax({
      type: "POST",
      url: "php/verifica-codigo.php",
      dataType: "JSON",
      data: codigo,
      success: function (retorno) {
        if (retorno == "OK") {
          window.location.replace("./main.html");
        } else if (retorno == "NO") {
          alert("Faca login antes! Redirecionando para a pagina de login!");
          window.location.replace("login.html");
        } else {
          alert("Codigo incorreto");
        }
      },
    });
  });
});


$(document).ready(function () {
  $("#button_reenviar-codigo").click(function () {
    $.ajax({
      type: "POST",
      url: "php/Two-Factores.php",
      dataType: "JSON",
      success: function (retorno) {
        if (retorno == "NO") {
          alert("Faca login antes! Redirecionando para a pagina de login!");
          window.location.replace("login.html");
        }else{
          alert("Codigo reenviado para caixa de email!");
        }
      }
    })
  });
});