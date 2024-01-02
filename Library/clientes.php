<?php
require 'Conexao.php';
$conexao = new Conexao();
$pdo = $conexao->getConexao();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Library</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src = "js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src = "js/requisicao.js"></script>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gerenciar
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="livros.php">Livros</a></li>
              <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>        
      </ul>
      </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Opções
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="receber.php">Receber Livro</a></li>
              <li><a class="dropdown-item" href="emprestar.php">Efetuar Emprestimo</a></li>        
      </ul>
      </li>
    </div>
  </div>
</nav>
<div class="container mt-3">
 

<!-- INICIO modal CadCliente -->
<div class="modal" tabindex="-1" id="cadCliente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Novo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="nomeCliente">Nome:</label>
    <input type="text" class="form-control" id="nomeCliente" aria-describedby="nome" placeholder="Digite o nome">
  </div>
  <div class="form-group mt-3">
    <label for="idade">Idade:</label>
    <input type="number" min="1" max="120" class="form-control" id="idade" placeholder="Idade">
  </div>
  <div class="form-group mt-3">
    <label for="cpf">CPF:</label>
    <input type="text" minlength="11" maxlength="11" class="form-control" id="cpf" placeholder="Digite o cpf">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnCadCliente" type="button" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>
<div class="container d-flex flex-row-reverse">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadCliente"><i class="fa fa-plus-square"></i></button>
</div>   
<!-- FIM modal CadCliente -->

<!-- INICIO modal UpCliente -->
<div class="modal" tabindex="-1" id="UpCliente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="id">Id:</label>
    <input type="text" class="form-control" id="id" aria-describedby="id" disabled>
  </div>
  <div class="form-group">
    <label for="nomeCliente">Nome:</label>
    <input type="text" class="form-control" id="nomeCliente2" aria-describedby="nome" placeholder="Digite o nome">
  </div>
  <div class="form-group mt-3">
    <label for="idade2">Idade:</label>
    <input type="number" min="1" max="120" class="form-control" id="idade2">
  </div>
  <div class="form-group mt-3">
    <label for="codBarra">CPF:</label>
    <input type="text" minlength="11" maxlength="11" class="form-control" id="cpf2">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnUpClienteSubmit" type="button" class="btn btn-primary">Atualizar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIM modal UpCliente -->




<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Idade</th>
      <th scope="col">CPF</th>
      <th scope="col">Excluir</th>
      <th scope="col">Editar</th>

    </tr>
  </thead>
  <tbody>

  <?php
  $sql = "SELECT * FROM clientesDisponiveis";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
  throw new Exception("ERRORRR");
  foreach ($resultados as $cliente){
    ?>

 <tr>
      <th scope="row"><?php echo $cliente->IdCliente ?></th>
      <td><?php echo $cliente->nome ?></td>
      <td><?php echo $cliente->idade ?></td>
      <td><?php echo $cliente->cpf ?></td>
      <td><button class="btn btn-danger remove" data-id="<?php echo $cliente->IdCliente."-"."clientes"?>"><i class="fa fa-trash"></i></button></td>
      <td><button class="btn btn-primary btnUpCliente" data-id="<?php echo $cliente->IdCliente?>"><i class="fa fa-pencil-square-o"></i></button></td>
  </tr>

<?php
  }
?>

  </tbody>
</table>
</div>
    
</body>
</html>