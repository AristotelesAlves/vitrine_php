<?php

require_once __DIR__ . '/../../vendor/autoload.php'; 
use App\DataBase\ConexaoDB;

class Migrations {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }


    public function Usuarios() {
        $sql = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            senha VARCHAR(255) NOT NULL,
            tipo ENUM('funcionario', 'adm') NOT NULL
        )";
        $stm = $this->conexao->prepare($sql);
        if($stm->execute() == 'TRUE'){
            echo 'tabelas criada com sucesso!';
        }else {
            echo 'erro ao criar tabelas';
        }

    }

    public function Categorias() {
        $sql = "CREATE TABLE IF NOT EXISTS categorias (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL
        )";
        $stm = $this->conexao->prepare($sql);
        if($stm->execute() == 'TRUE'){
            echo 'tabelas criada com sucesso!';
        }else {
            echo 'erro ao criar tabelas';
        }

    }

    public function Produtos() {
        $sql = "CREATE TABLE IF NOT EXISTS produtos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            url_imagem VARCHAR(255) NOT NULL,
            valor DECIMAL(10, 2) NOT NULL,
            categoria_id INT,
            FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        )";
        $stm = $this->conexao->prepare($sql);
        if($stm->execute() == 'TRUE'){
            echo 'tabelas criada com sucesso!';
        }else {
            echo 'erro ao criar tabelas';
        }

    }

    public function adm(){
        $sql = "INSERT INTO usuarios (nome, emai, senha, tipo,) VALUES ('adm', 'adm@gmail.com', 'adm', 'adm')";
        $stm = $this->conexao->prepare($sql);
        if($stm->execute() == 'TRUE'){
            echo 'Usuario adm criado com sucesso!';
        }else {
            echo 'erro ao criar usuario';
        }
    }

}

$conexao = ConexaoDB::getConexao();

$migracoes = new Migrations($conexao);

$migracoes->Usuarios();
$migracoes->Categorias();
$migracoes->Produtos();
$migracoes->adm();

?>
