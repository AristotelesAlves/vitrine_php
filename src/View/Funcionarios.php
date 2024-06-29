<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela com Modal</title>
    <link rel="stylesheet" href="src/view/Css/Funcionarios.css">
</head>
<body>
    <script src="src/view/js/Funcionarios.js"></script>
    <?php
        include(__DIR__ . "/../View/components/nav.php");
    ?>
    <div class="container_cabecalho">
        <h1>Lista de usuários</h1>
        <button  onclick="showNewModal()">
            Adicionar usuario
        </button>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Função</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['tipo'] ?></td>
                    <td>
                        <div class="acao">
                            <button onclick="showEditModal('<?= $usuario['id'] ?>','<?= $usuario['nome'] ?>', '<?= $usuario['email'] ?>', '<?= $usuario['tipo'] ?>')">
                                <img  src="src/View/Figure/edit.svg" alt="">
                            </button>
                            <form action="/usuario/delete/<?= $usuario['id'] ?>" method="post">
                                <button>
                                    <img src="src/View/Figure/delete.svg" alt="">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <h2>Editar Usuário</h2>
            <form id="editForm" method="post" class="container_modal">
                <label for="editFullName">Nome Completo</label>
                <input type="text" id="nome" name="nome"><br>
                <label for="editUsername">Email</label>
                <input type="text" id="email" name="email"><br>
                <label for="editRole">Função</label>
                <select name="tipo" id="tipo">
                    <option value="funcionario">Funcionario</option>
                    <option value="adm">adm</option>
                </select>
                <button type="submit">Editar</button>
            </form>
        </div>
    </div>

    <div id="newModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('newModal')">&times;</span>
            <h2>Update Usuário</h2>
            <form action="/usuario" method="post" id="updateForm" class="container_modal">
                <label for="updateFullName">Nome Completo</label>
                <input type="text" id="updateFullName" name="nome"><br>
                <label for="updateUsername">Email</label>
                <input type="text" id="updateUsername" name="email"><br>
                <label for="updateUsername">Senha</label>
                <input type="password" id="updateUsername" name="senha"><br>
                <select name="tipo" id="tipo">
                    <option value="funcionario">Funcionario</option>
                    <option value="adm">adm</option>
                </select>
                <button type="submit">Criar</button>
            </form>
        </div>
    </div>

    </body>
</html>
