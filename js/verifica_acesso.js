function verifica_acesso(){
    $.ajax({
      type: "POST",
      url: "php/verifica_acesso_novasenha.php",
      dataType: "JSON",
      success: function (retorno) {
        if (retorno == "NO") {
          alert("Verifique o email antes! Redirecionando para a pagina de login!");
          window.location.replace("login.html");
        }
      }
    })
}


window.onload = verifica_acesso()