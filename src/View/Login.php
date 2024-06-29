<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/view/Css/login.css">
    <title>Login</title>
</head>
<body>
    <h1>MEMBER LOGIN</h1>
    <figure>
        <img src="/src/View/Figure/users.svg" alt="User Icon">
    </figure>
    <form action="/login" method="post">
        <?php if (isset($_SESSION['error'])): ?>
            <p style="color:red;"><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']);?>
        <?php endif; ?>
        <label for="email">Email</label>
        <div class="container_input">
            <img src="src/View/Figure/user.svg" alt="User Icon">
            <input type="email" id="email" name="email" required>
        </div>
        <label for="senha">Senha</label>
        <div class="container_input">
            <img src="src/View/Figure/lock-simple.svg" alt="Lock Icon">
            <input type="password" id="senha" name="senha" required>
        </div>
        <div class="container_radios">
            <div>
                <input type="radio" name="tipo" id="tipo" value="funcionario" required>
                <label>Funcionário</label>
            </div>
            <div>
                <input type="radio" name="tipo" id="tipo" value="adm" required>
                <label>Administrador</label>
            </div>
        </div>
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>
