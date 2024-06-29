<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/view/Css/Home.css">
    <title>Document</title>
</head>
<body>
    <?php include(__DIR__ . "/components/nav.php"); ?>
    <section>
        <h2><?php echo $title;?></h2>
        <ul class="container_card">
            <?php foreach ($produtos as $produto): ?>
                <li class="card">
                    <div class="card-header">
                        <img src="<?= isset($produto['url_imagem']) ? $produto['url_imagem'] : 'path/to/default/image.jpg'; ?>" alt="">
                        <div class="dropdown">
                            <button class="dropbtn">⋮</button>
                            <div class="dropdown-content">
                                <a href="#" onclick="showEditModal('<?= $produto['id']; ?>','<?= $produto['nome']; ?>', '<?= $produto['valor']; ?>', '<?= $produto['url_imagem']; ?>','<?= $produto['categoria_id']; ?>')">Editar</a>
                                
                                <?php if ($isAdmin): ?>
                                    <form action="/produto/apagar/<?= $produto['id']; ?>" method="post">
                                        <button class="btn_dropDown" type="submit">Excluir</button>
                                    </form>
                                <?php endif; ?>
                                

                            </div>
                        </div>
                    </div>
                    <div class="descricao">
                        <h4><?= $produto['nome']; ?></h4>
                        <span>R$<?= isset($produto['valor']) ? number_format($produto['valor'], 2, ',', '.') : '0,00'; ?></span>
                        <div class="info_parcelamento">
                            <span><strong>3x</strong> de <strong>R$<?= isset($produto['valor']) ? number_format($produto['valor'] / 3, 2, ',', '') : '0,00'; ?></strong> sem juros</span>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <button class="add_produto" onclick="showNewModal()">
            <img src="src/View/Figure/botao-adicionar.png" alt="">
        </button>
    </section>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <h2>Editar Produto</h2>
            <form id="editForm" method="post" class="container_modal">
                <div>
                    <img src="" id="editProdutoImagemPreview" alt="">
                </div>
                <div class="container_form_modal">
                    <div class="form_modal_input">
                        <label for="editProdutoNome">Produto</label>
                        <input type="text" id="editProdutoNome" name="nome">
                    </div>
                    <div class="form_modal_input">
                        <label for="editProdutoImagem">Url da imagem do produto</label>
                        <input type="text" id="editProdutoImagem" name="url_imagem" oninput="updateEditPreview()">
                    </div>
                    <div class="form_modal_input">
                        <label for="editProdutoPreco">Preço</label>
                        <input type="text" id="editProdutoPreco" name="valor">
                    </div>
                    <div class="form_modal_input">
                        <label for="editTipoProduto">Tipo de Produto</label>
                        <select id="editTipoProduto" name="categoria_id">
                            <option value="1">Colar</option>
                            <option value="2">Brinco</option>
                            <option value="3">Pulseira</option>
                        </select>
                    </div>
                    <div class="container_buttons">
                        <a onclick="closeModal('editModal')">Cancelar</a>
                        <button>Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div id="novoProdutoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('novoProdutoModal')">&times;</span>
            <h2>Novo Produto</h2>
            <form action="/produto" method="post" class="container_modal">
                <div>
                    <img src="" id="novoProdutoImagemPreview" alt="">
                </div>
                <div class="container_form_modal">
                    <div class="form_modal_input">
                        <label for="novoProdutoNome">Produto</label>
                        <input type="text" id="novoProdutoNome" name="nome">
                    </div>
                    <div class="form_modal_input">
                        <label for="novoProdutoImagem">Url da imagem do produto</label>
                        <input type="text" id="novoProdutoImagem" name="url_imagem" oninput="updatenovoPreview()">
                    </div>
                    <div class="form_modal_input">
                        <label for="novoProdutoPreco">Preço</label>
                        <input type="text" id="novoProdutoPreco" name="valor">
                    </div>
                    <div class="form_modal_input">
                        <label for="novoTipoProduto">Tipo de Produto</label>
                        <select id="novoTipoProduto" name="categoria_id">
                            <option value="1">Colar</option>
                            <option value="2">Brinco</option>
                            <option value="3">Pulseira</option>
                        </select>
                    </div>
                    <div class="container_buttons">
                        <a onclick="closeModal('novoProdutoModal')">Cancelar</a>
                        <button onclick="adicionarNovoProduto()">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="src/view/Js/Home.js"></script>
</body>
</html>
