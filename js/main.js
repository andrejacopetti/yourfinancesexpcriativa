$(document).ready(function () {
    $("#ganhos-button").click(function () {
      
      var dados = $("#ganhos").serialize();

      $.ajax({
        type: "POST",
        url: "php/funcionalidade.php",
        dataType: "JSON",
        data: dados,
      })
  })
})


  $(document).ready(function () {
    $("#despesas-button").click(function () {
  
      var dados = $("#despesas").serialize();
  
      $.ajax({
        type: "POST",
        url: "php/funcionalidade.php",
        dataType: "JSON",
        data: dados,
      })
  })
})