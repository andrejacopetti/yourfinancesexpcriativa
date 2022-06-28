function checaSessao() {
  $.ajax({
    type: "POST",
    url: "php/sessao_verificando.php",
    dataType: "JSON",
    success: function (retorno) {
      if (retorno != "OK") {
        window.location.replace("login.html");
      }
    },
  });
}

window.onload = checaSessao();

$(document).ready(function () {
  $("#deslogar").click(function () {
    $.ajax({
      type: "POST",
      url: "php/sessao_deslogar.php",
      dataType: "JSON",
      success: function (retorno) {
        if (retorno == "OK") {
          window.location.replace("login.html");
        }
      }
    });
  });
});
