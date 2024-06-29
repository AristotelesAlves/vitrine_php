<?php 

namespace App\Controller;

use App\Model\ModelUsuarios;
use App\Config\View;

class UserController {
    
    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $tipo = $_POST['tipo'];

        
            if (!empty($email) && !empty($senha)) {
                $usuario = new ModelUsuarios();
                $resultado = $usuario->login($email, $senha, $tipo);
            
                if (isset($resultado['sucesso'])) {
                    $_SESSION['user_logged_in'] = true;
                    $_SESSION['user_id'] = $resultado['sucesso']['id'];
                    $_SESSION['user_name'] = $resultado['sucesso']['nome'];
                    $_SESSION['user_email'] = $resultado['sucesso']['email'];
                    $_SESSION['user_type'] = $resultado['sucesso']['tipo'];
                
                    header('Location: /');
                    exit();
                } else {
                    $_SESSION['error'] = 'Credenciais inválidas';
                    header('Location: /login');
                }
            } else {
                $_SESSION['error'] = 'Preencha todos os campos';
                header('Location: /login');
                exit();
            }
        }
    }
    

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
        exit();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $tipo = $_POST['tipo'];
            
            $model = new ModelUsuarios();
            $response = $model->create($nome, $email, $senha, $tipo);

            if ($response) {
                $_SESSION['success'] = 'Produto excluído com sucesso';
                header('Location: /funcionarios');
            } else {
                $_SESSION['error'] = 'Erro ao excluir produto';
                header('Location: /funcionarios');
            }
    
            header('Location: /funcionarios');
            exit;
        }
    
        $_SESSION['error'] = 'Requisição inválida para exclusão de produto';
        header('Location: /funcionarios');
        exit;
    }

    public function delete($id) {
        $model = new ModelUsuarios();
        $response = $model->delete($id[0]);
        if ($response) {
            header('Location: /funcionarios');
        } else {
            header('Location: /funcionarios');
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $tipo = $_POST['tipo'];

            $model = new ModelUsuarios();
            $response = $model->update($id[0], $nome, $email, $tipo);

            if ($response) {
                header('Location: /funcionarios');
            } else {
                header('Location: /funcionarios');
            }
        }
    }


}
