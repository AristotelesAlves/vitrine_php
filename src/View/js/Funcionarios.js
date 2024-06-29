function showModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

function showEditModal(id, nome, email, tipo ) {
    document.getElementById('nome').value = nome;
    document.getElementById('email').value = email;
    document.getElementById('tipo').value = tipo;
    showModal('editModal');

    document.getElementById('editForm').action = '/usuario/update/'+id;

}

function showNewModal(fullName, username, role) {
    showModal('newModal');
}


window.onclick = function(event) {
    var modals = document.getElementsByClassName('modal');
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
}
