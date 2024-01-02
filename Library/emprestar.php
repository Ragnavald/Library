<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Library</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<form id="formEmprestar">
  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" minlength="11" maxlength="11" class="form-control" id="cpf" require>
  </div>
  <div class="mb-3">
    <label for="cod" class="form-label">Código de Barras</label>
    <input type="text" minlength="11" maxlength="11" class="form-control" id="cod" require>
  </div>
  <div class="form-text mb-3">A data para devolução é 15 dias a partir da data do empréstimo.</div>
  <button type="submit" class="btn btn-primary" id="emprestar">Emprestar</button>
</form>
</div>

</body>
</html>