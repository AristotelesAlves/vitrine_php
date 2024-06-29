<?php
namespace App\Controller;

use App\Model\ModelProdutos;

class ProdutosController {
    public function create() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $url_imagem = $_POST['url_imagem'];
            $valor = floatval($_POST['valor']);
            $categoria_id = intval($_POST['categoria_id']);

            $model = new ModelProdutos();

            $success = $model->create($nome, $url_imagem, $valor, $categoria_id);

            if ($success) {
                $_SESSION['success'] = 'Produto criado com sucesso';
            } else {
                $_SESSION['error'] = 'Erro ao criar produto';
            }

            header('Location: /');
            exit; 
        }

        $_SESSION['error'] = 'Preencha todo o formulário';
        header('Location: /');
        exit;
    }

    public function delete($id) {

        session_start();
    
        // Verifica se o método da requisição é POST (ideal para operações de deleção)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar e obter o ID do produto a ser excluído
            $id_produto = $id[0];
    
            $model = new ModelProdutos();
    
            $success = $model->delete($id_produto); // Supondo que exista um método delete em ModelProdutos
    
            if ($success) {
                $_SESSION['success'] = 'Produto excluído com sucesso';
                header('Location: /');
            } else {
                $_SESSION['error'] = 'Erro ao excluir produto';
                header('Location: /');
            }
    
            header('Location: /');
            exit;
        }
    
        $_SESSION['error'] = 'Requisição inválida para exclusão de produto';
        header('Location: /');
        exit;
    }

    
    public function update($id) {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $url_imagem = $_POST['url_imagem'];
            $valor = floatval($_POST['valor']);
            $categoria_id = intval($_POST['categoria_id']);
    
            $model = new ModelProdutos();
        
            $success = $model->update($nome, $url_imagem, $valor, $categoria_id, $id[0]);
        
            if ($success) {
                $_SESSION['success'] = 'Produto atualizado com sucesso';
            } else {
                $_SESSION['error'] = 'Erro ao atualizar produto';
            }
        }

    
        header('Location: /');
        exit;
    }

    
    public function showCategory($categoria_id) {
        $id_categoria = intval($categoria_id);
    
        $model = new ModelProdutos();
    
        $produtos = $model->getProdutosByCategoria($id_categoria);

        return $produtos;
    }
    
}
?>
