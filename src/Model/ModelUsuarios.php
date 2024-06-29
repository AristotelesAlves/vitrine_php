<?php

namespace App\Model;
use App\DataBase\ConexaoDB;

class ModelUsuarios{
    public function create($nome, $email, $senha, $tipo){
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $nome, $email, $senha, $tipo);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function showOne($id){
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('SELECT * FROM usuarios WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return ['erro' => 'Usuário não encontrado'];
        }
    }

    public function list() {
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('SELECT id, nome, email, tipo FROM usuarios');
        $stmt->execute();
        $result = $stmt->get_result();
        
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        
        return $usuarios;
    }

    public function delete($id){
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('DELETE FROM usuarios WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $nome, $email, $tipo){
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('UPDATE usuarios SET nome = ?, email = ?, tipo = ? WHERE id = ?');
        $stmt->bind_param('sssi', $nome, $email, $tipo, $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha, $tipo) {
        $sql = ConexaoDB::getConexao();
        $stmt = $sql->prepare('SELECT * FROM usuarios WHERE email = ? AND senha = ? AND tipo = ?');
        $stmt->bind_param('sss', $email, $senha, $tipo);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return ['sucesso' => $result->fetch_assoc()];
        } else {
            return ['erro' => 'Credenciais inválidas'];
        }
    }
}


