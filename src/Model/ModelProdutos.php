<?php
namespace App\Model;

use App\DataBase\ConexaoDB;

class ModelProdutos {
    public function create($nome, $url_imagem, $valor, $categoria_id) {
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('INSERT INTO produtos (nome, url_imagem, valor, categoria_id) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssdi', $nome, $url_imagem, $valor, $categoria_id); 
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function showOne($id) {
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('SELECT * FROM produtos WHERE id = ?');
        $stmt->bind_param('i', $id); 
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
        return $produto;
    }

    public function list() {
        $db = ConexaoDB::getConexao();
        $stmt = $db->prepare('SELECT * FROM produtos');
        $stmt->execute();
        $result = $stmt->get_result();
        $produtos = $result->fetch_all(MYSQLI_ASSOC);
        return $produtos;
    }

    public function delete($id) {
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('DELETE FROM produtos WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($nome, $url_imagem, $valor, $categoria_id, $id) {
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('UPDATE produtos SET nome = ?, url_imagem = ?, valor = ?, categoria_id = ? WHERE id = ?');
        $stmt->bind_param('ssdii', $nome, $url_imagem, $valor, $categoria_id, $id); 
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function showCategory($categoria_id) {
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('SELECT * FROM produtos WHERE categoria_id = ?');
        $stmt->bind_param('i', $categoria_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produtos = $result->fetch_all(MYSQLI_ASSOC);
        return $produtos;
    }
}
?>
