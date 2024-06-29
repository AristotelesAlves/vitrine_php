<?php
$isAdmin = false;
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'adm') {
    $isAdmin = true;
}

?>

<nav class="container_nav">
    <ul>
        <li>
            <a class="ancora" href="/">
                Inicíco
            </a>
        </li>
        <li>
            <a class="ancora" href="/brincos">
                Brincos
            </a>
        </li>
        <li>
            <a class="ancora" href="/colares">
                Colares
            </a>
        </li>
        <li>
            <a class="ancora" href="/pulseiras">
                Pulseiras
            </a>
        </li>

        <?php if ($isAdmin): ?>
            <li>
                <a class="ancora" href="/funcionarios">
                    Funcionarios
                </a>
            </li>
        <?php endif; ?>
        <li>
            <a href="/desconectar" class="ancora">
                Desconectar
            </a>
        </li>
    </ul>
</nav>

<style>
    * {
        font-family: sans-serif;
    }
    .container_nav {
        width: 100%;
    }

    .container_nav > ul {
        display: flex;
        list-style: none;
        width: 100%;
        justify-content: center;
        align-items:center;
        gap:10px;
        padding:16px 0px;
        margin:0;
    }

    .ancora {
        text-decoration: none;
        color: black;
        border-radius: 4px;
        padding: 8px;
    }

    .ancora:hover {
        background-color: rgba(0, 0, 0, 0.227);
        color:rgb(232, 54, 172);;
    }

</style>