
$(document).ready(function() {

$(".remove").click(function(){
var data = $(this).data("id").split("-");

var id = data[0];
var table = data[1];

 if(confirm('Tem certeza que deseja excluir?'))
    {
        $.ajax({
           url: '../webservice.php',
           type: 'GET',
           data: {id: id, table:table},
           error: function() {
              alert('Ocorreu um erro');
           },
           success: function(data) {
                alert("Deletado");
                window.location.href = table+'.php';
           }
        });
    }
});

$("#btnCadLivro").click(function(){

var nome = $("#nomeLivro").val();
var autor = $("#autorLivro").val();
var cod = $("#codBarra").val();


if (nome !== null && autor !== null && cod !== null){

    if (confirm('Tem certeza que deseja cadastrar?'))
    {
       $.ajax({
        url: '../webservice.php',
        type: 'POST',
        data: {nome:nome, autor:autor, cod:cod},
        error: function() {
           alert('Ocorreu um erro');
        },
        success: function(data) {
             alert("cadastrado");
             window.location.href = 'livros.php';
        }
       });


    }
}

});

$(".btnUpLivro").click(function(){
   var id = $(this).data("id");

   $("#id").val("");
   $("#nomeLivro2").val("");
   $("#autorLivro2").val("");
   $("#codBarra2").val("");

   $.ajax({

      url: '../webservice.php',
        type: 'GET',
        data: {idL:id},
        dataType: 'json',
        error: function() {
           alert('Ocorreu um erro');
        },
        success: function(data) {

            $("#id").val(data.id);
            $("#nomeLivro2").val(data.nome);
            $("#autorLivro2").val(data.autor);
            $("#codBarra2").val(data.cod);
            $("#UpLivro").modal('show');

        }

   });

});

$("#btnUpLivroSubmit").click(function(){

  var id =  $("#id").val();
  var nome = $("#nomeLivro2").val();
  var autor = $("#autorLivro2").val();
  var codBarras = $("#codBarra2").val();

  $.ajax({
   url: '../webservice.php',
        type: 'POST',
        data: {
         idL:id,
         nome:nome,
         autor:autor,
         codBarras:codBarras
      },
        error: function() {
           alert('Ocorreu um erro');
        },
        success: function(data) {

         alert("atualizado");
         window.location.href = 'livros.php';

        }

  });


});

$("#btnCadCliente").click(function(){

   var nome = $("#nomeCliente").val();
   var idade = $("#idade").val();
   var cpf = $("#cpf").val();
   
   console.log(nome,idade,cpf)
   
   if (nome !== null && idade !== null && cpf !== null){
   
       if (confirm('Tem certeza que deseja cadastrar?'))
       {
          $.ajax({
           url: '../webservice.php',    
           type: 'POST',
           data: {nome:nome, idade:idade, cpf:cpf},
           error: function() {
              alert('Ocorreu um erro');
           },
           success: function(data) {
                alert("cadastrado");
                window.location.href = 'clientes.php';
           }
          });
   
   
       }
   }
   
   });

$(".btnUpCliente").click(function(){
   var id = $(this).data("id");

   $("#id").val("");
   $("#nomeCliente2").val("");
   $("#idade2").val("");
   $("#cpf2").val("");
   

   $.ajax({

      url: '../webservice.php',    
        type: 'GET',
        data: {idC:id},
        dataType: 'json',
        error: function() {
           alert('Ocorreu um erro');
        },
        success: function(data) {

            $("#id").val(data.id);
            $("#nomeCliente2").val(data.nome);
            $("#idade2").val(data.idade);
            $("#cpf2").val(data.cpf);
            $("#UpCliente").modal('show');

        }

   });
   
});

$("#btnUpClienteSubmit").click(function(){

   var id =  $("#id").val();
   var nome = $("#nomeCliente2").val();
   var idade = $("#idade2").val();
   var cpf = $("#cpf2").val();
 
   $.ajax({
    url: '../webservice.php',    
         type: 'POST',
         data: {
          idC:id,
          nome:nome,
          idade:idade,
          cpf:cpf
       },
         error: function() {
            alert('Ocorreu um erro');
         },
         success: function(data) {
 
          alert("atualizado");
          window.location.href = 'clientes.php';
 
         }
 
   });
 
 
 });

$(".receber").click(function(){
   var id = $(this).data("id");
   $.ajax({
      url:'../webservice.php',
      type: 'GET',
      data: {idEmp: id},
      error: function() {
         alert('Ocorreu um erro');
      },
      success: function(data) {
       alert("Livro recebido!");
       window.location.href = 'receber.php';

      }         

   });

});

$("#emprestar").click(function(){

   var cod = $("#cod").val();
   var cpf = $("#cpf").val();

   if($.isNumeric(cod) && $.isNumeric(cpf) ){
      $.ajax({
         url:'../webservice.php',
         type: 'POST',
         data: {cod: cod, cpf:cpf},
         dataType: 'json',
         error: function() {
            alert('Ocorreu um erro');
         },
         success: function(data) {  
            if(data.resultado == 2){
               //Efetuar Emprestimo

               $.ajax({
                  url: '../webservice.php',
                  type: 'POST',
                  data: {codCad: cod, cpfCad:cpf},
                  error: function() {
                     alert('Ocorreu um erro');
                  },
                  success: function(data) {
                  }
               });



            }else{
               alert("Verifique se o código de barras ou cpf estão na base de dados! Ou Se esse livro já foi emprestado para essa pessoa");
            }
   
         }        
   
      });
   }else{
      alert("Digite apenas números!");
   }

});

});


