function showModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

function showEditModal(id, nome, preco, imagem, categoria_id) {
    document.getElementById('editProdutoNome').value = nome;
    document.getElementById('editProdutoPreco').value = preco;
    document.getElementById('editProdutoImagem').value = imagem;
    document.getElementById('editProdutoImagemPreview').src = imagem;
    document.getElementById('editTipoProduto').value = categoria_id;


    document.getElementById('editForm').action = '/produto/' + id;

    showModal('editModal');
}


function updatenovoPreview(){
    const imagem = document.getElementById('novoProdutoImagem').value
    document.getElementById('novoProdutoImagemPreview').src = imagem;
}


function showNewModal() {
   
    showModal('novoProdutoModal');
}

window.onclick = function(event) {
    var modals = document.getElementsByClassName('modal');
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
}