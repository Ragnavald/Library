<?php
require 'Conexao.php';
$conexao = new Conexao();
$pdo = $conexao->getConexao();

// cadLivro
if (isset($_POST['nome']) && isset($_POST['autor']) && isset($_POST['cod'])){
    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    $cod = $_POST['cod'];
    $sql = "INSERT INTO Livros (nome, CodBarras, Autor)
    VALUES (:nome, :cod, :autor)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome); //bindParam('Referência', $var) //bindValue('Referência', 'valor')
    $stmt->bindParam(':cod',$cod);
    $stmt->bindParam(':autor',$autor);
    $stmt->execute();

}

//selectLivros
if(isset($_GET['idL'])){
    $sql = "SELECT * FROM Livros WHERE IdLivro = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id',$_GET['idL']);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC); //fetch por associação 
    //retorna True se houver retorno do banco

    if($resultado){
    $dados = array(
        'id' => $resultado['IdLivro'],
        'nome' => $resultado['nome'],
        'cod' => $resultado['CodBarras'],
        'autor' => $resultado['Autor']
    );
    echo json_encode($dados);
    }

}

//UpLivros
if(isset($_POST['idL']) && isset($_POST['nome']) && isset($_POST['autor']) && isset($_POST['codBarras'])){

    $sql = "UPDATE Livros SET nome = :nome, CodBarras = :cod, Autor = :autor WHERE IdLivro = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['idL']);
    $stmt->bindParam(':nome', $_POST['nome']);
    $stmt->bindParam(':cod', $_POST['codBarras']);
    $stmt->bindParam(':autor', $_POST['autor']);
    $stmt->execute();
}

// cadCliente
if (isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['cpf'])){
    
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $sql = "INSERT INTO Clientes (nome, idade, cpf)
    VALUES (:nome, :idade, :cpf)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':idade',$idade);
    $stmt->bindParam(':cpf',$cpf);
    $stmt->execute();

}

//selectClientes
if(isset($_GET['idC'])){
    $sql = "SELECT * FROM Clientes WHERE IdCliente = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id',$_GET['idC']);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($resultado){
    $dados = array(
        'id' => $resultado['IdCliente'],
        'nome' => $resultado['nome'],
        'idade' => $resultado['idade'],
        'cpf' => $resultado['cpf']
    );
    echo json_encode($dados);
    }

}

//UpClientes
if(isset($_POST['idC']) && isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['cpf'])){

    $sql = "UPDATE Clientes SET nome = :nome, idade = :idade, cpf = :cpf WHERE IdCliente = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['idC']);  
    $stmt->bindParam(':nome', $_POST['nome']);
    $stmt->bindParam(':idade', $_POST['idade']);
    $stmt->bindParam(':cpf', $_POST['cpf']);
    $stmt->execute();
}

// delete
if (isset($_GET['id']) && isset($_GET['table'])){

    $id = $_GET['id'];
    $table = $_GET['table'];
    if($table == "livros"){
        $sql = "delete from Livros where IdLivro = :id";
        }else{
        $sql = "delete from Clientes where IdCliente = :id";
        }
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}

//receberLivro  (set dataRecebida)
if(isset($_GET['idEmp'])){
    $sql = "UPDATE Emprestimos SET DataRecebida = :today WHERE IdEmprestimo = :id";
    $today = date('Y-m-d');
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':today',$today);
    $stmt->bindParam(':id',$_GET['idEmp']);
    $stmt->execute();
}

// verificar se existe o cpf e o cod
if(isset($_POST['cod']) && isset($_POST['cpf'])){
    $sql = "SELECT (SELECT COUNT(*) FROM Clientes WHERE cpf = :cpf) + (SELECT COUNT(*) FROM Livros WHERE CodBarras = :cod)
    + (SELECT COUNT(*) FROM Emprestimos WHERE FkCliente = (SELECT IdCliente FROM Clientes WHERE cpf = :cpf) AND FkLivro = (SELECT IdLivro FROM Livros WHERE CodBarras = :cod) AND DataRecebida IS NULL )
     AS result";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cpf',$_POST['cpf']);
    $stmt->bindParam(':cod',$_POST['cod']);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $dados = array(
        'resultado' => $resultado['result']
    );
    
    
    echo json_encode($dados);
    
}

//efetuar emprestimo
if(isset($_POST['codCad']) && isset($_POST['cpfCad'])){
   $sql = "INSERT INTO Emprestimos (FKCliente, FKLivro, DataEmprestimo, DataRecebida, DataVencimento)
    VALUES ((SELECT IdCliente FROM Clientes WHERE cpf = :cpf), 
            (SELECT IdLivro FROM Livros WHERE CodBarras = :cod), 
            CURDATE(), 
            null, 
            DATE_ADD(CURDATE(), INTERVAL 15 DAY))";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cpf',$_POST['cpfCad']);
    $stmt->bindParam(':cod',$_POST['codCad']);
    $stmt->execute();
}


?>
