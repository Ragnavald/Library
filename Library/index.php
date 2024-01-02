
<?php
echo "ola";
xdebug_info();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Library</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Library</a>
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

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/books.jpg" class="d-block w-100" style="object-fit: cover;
      height: 80vh;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/books1.jpg" class="d-block w-100" style="object-fit: cover;
      height: 80vh;" alt="...">
    </div>
    <div class="carousel-item">
    <img src="images/books2.jpg" class="d-block w-100" style="object-fit: cover;
      height: 80vh;" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container mt-5">
<blockquote class="blockquote text-center">
  <h6><p class="lead">"Em cada página, um novo universo se revela. Seja bem-vindo ao nosso oásis literário, onde cada livro é uma porta para a imaginação, cada palavra é uma semente para o conhecimento e cada história é uma jornada inesquecível. Navegue por nossas estantes virtuais e deixe-se envolver pelo poder das palavras. Na nossa biblioteca, os sonhos ganham asas e a sabedoria encontra seu lar. Descubra mundos, aprenda, sonhe e cresça conosco. A magia da leitura aguarda por você a cada virar de página. Embarque nesta aventura conosco e deixe sua mente viajar para além das palavras." </p></h6>
</blockquote>
</div>

<div class="container mt-5 text-center">
  <h2>Benefícios da Leitura</h2>
  <div class="row mt-5">
    <div class="col-md-4">
      <h5>Expansão do Conhecimento</h5>
      <p>A leitura expõe você a uma variedade de temas, culturas e ideias, expandindo seu conhecimento sobre o mundo.</p>
    </div>
    <div class="col-md-4">
      <h5>Melhora da Capacidade de Compreensão</h5>
      <p>Ler regularmente melhora as habilidades de compreensão, ajudando você a entender melhor textos complexos e contextos variados</p>
    </div>
    <div class="col-md-4">
      <h5>Aprimoramento do Vocabulário</h5>
      <p>A exposição a diferentes palavras e frases enriquece seu vocabulário, permitindo uma comunicação mais eficaz</p>
    </div>
  <div class="row mt-5">
    <div class="col-md-4">
      <h5>Redução do Estresse</h5>
      <p>Ler pode ser uma forma eficaz de escapar do estresse cotidiano, permitindo que você se transporte para mundos diferentes e se desconecte das preocupações do dia a dia.</p>
    </div>
    <div class="col-md-4">
      <h5>Estimulação Mental</h5>
      <p>Ler mantém seu cérebro ativo, o que pode ajudar a prevenir doenças mentais relacionadas à idade, como o Alzheimer.</p>
    </div>
    <div class="col-md-4">
      <h5>Inspiração e Criatividade</h5>
      <p>A exposição a diferentes estilos de escrita, gêneros e ideias pode inspirar sua criatividade e motivá-lo a explorar novas ideias e projetos.</p>
    </div>

  </div>

  </div>
</div>


</body>
</html>