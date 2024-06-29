<?php
namespace App\Controller;
use App\Model\ModelProdutos;
use App\Model\ModelUsuarios;
use App\Config\View;

class PagViw{
    
    public function home() {
        session_start();

        $model = new ModelProdutos();
        $produtos = $model->list();
    
        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
            header('Location: /login');
            exit();
        }
    
        $isAdmin = false;
    
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'administrador') {
            $isAdmin = true;
        }



        View::render('Home', ['produtos' => $produtos, 'isAdmin' => $isAdmin, 'title' => 'Mais vendidos']);
    }

    public function brinco() {
        session_start();

        $model = new ModelProdutos();
        $produtos = $model->showCategory(2);
    
        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
            header('Location: /login');
            exit();
        }
    
        $isAdmin = false;
    
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'administrador') {
            $isAdmin = true;
        }



        View::render('Home', ['produtos' => $produtos, 'isAdmin' => $isAdmin, 'title' => 'Brincos']);

    }

    public function colar() {
        session_start();

        $model = new ModelProdutos();
        $produtos = $model->showCategory(1);
    
        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
            header('Location: /login');
            exit();
        }
    
        $isAdmin = false;
    
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'administrador') {
            $isAdmin = true;
        }



        View::render('Home', ['produtos' => $produtos, 'isAdmin' => $isAdmin, 'title' => 'Colares']);

    }

    public function pulseira() {
        session_start();

        $model = new ModelProdutos();
        $produtos = $model->showCategory(3);
    
        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
            header('Location: /login');
            exit();
        }
    
        $isAdmin = false;
    
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'administrador') {
            $isAdmin = true;
        }



        View::render('Home', ['produtos' => $produtos, 'isAdmin' => $isAdmin, 'title' => 'Pulseiras']);
    }
    
    public function login() {
        session_start();
    
        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
            View::render('Login');
            exit();
        }
    
        header('Location: /');
        exit();
    }

    public function funcionarios() {
        session_start();

        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
            header('Location: /login');
            exit();
        }
    
        
        if(!isset($_SESSION['user_type']) || $_SESSION['user_type'] === 'funcionario'){
            echo 'sabidinho você ne!';
            exit;
        }
    

        $model = new ModelUsuarios();
        $usuarios = $model->list();
    
        View::render('Funcionarios', ['usuarios' => $usuarios]);
    }
}