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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src = "js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src = "js/requisicao.js"></script>
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

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">DataEmprestimo</th>
      <th scope="col">DataRecebida</th>
      <th scope="col">DataVencimento</th>
      <th scope="col">Cliente</th>
      <th scope="col">Livro</th>
      <th scope="col">CodBarra</th>
      <th scope="col">Receber</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql = "SELECT * FROM listaEmprestimosDevolver";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

  foreach ($resultados as $emprestimo){
    ?>

 <tr>
   <?php $checkAtrasado =  $emprestimo->DataRecebida == null && strtotime(date('Y-m-d')) > strtotime($emprestimo->DataVencimento) ? TRUE : FALSE;?>
      <th scope="row"><?php echo $emprestimo->idEmprestimo ?></th>
      <td><?php echo $emprestimo->DataEmprestimo ?></td>
      <td class="<?php echo $checkAtrasado ? 'atrasado' : ''; ?>"><?php echo  $checkAtrasado ? 'ATRASADO': ''?></td>
      <td><?php echo $emprestimo->DataVencimento ?></td>
      <td><?php echo $emprestimo->Cliente ?></td>
      <td><?php echo $emprestimo->Livro ?></td>
      <td><?php echo $emprestimo->CodBarras ?></td>
      <td><button class="btn btn-success receber" data-id="<?php echo $emprestimo->idEmprestimo?>"><i class="fa fa-check-square"></i></button></td>

  </tr>

<?php
  }
?>

  </tbody>
</table>
</div>
    
</body>
</html>