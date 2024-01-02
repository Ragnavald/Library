<?php

class Conexao {
    private $host = "db";
    private $usuario = "user";
    private $senha = "12345";
    private $db = "Library";
    private $con;

    public function __construct() {
        try {
            $this->con = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->usuario, $this->senha);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function getConexao() {
        return $this->con;
    }

    public function fecharConexao() {
        $this->con = null;
    }
}

?>