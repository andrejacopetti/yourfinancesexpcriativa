function confirmaremail(){
  $.ajax({
    type: "POST",
    url: "php/confirmar-email.php",
  })
  window.location.replace("login.html");
}


window.onload = confirmaremail()