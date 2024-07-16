<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $loginUsuario = $_POST['loginUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];
    include_once ("controller/Usuario/UsuarioController.php");
    $res = UsuarioController::resgataPorLogin($loginUsuario);
    $user = $res->fetch(PDO::FETCH_OBJ);

    if ($user && password_verify($senhaUsuario, $user->senhaUsuario)) {
        
        $_SESSION['login_Usuario'] = $loginUsuario;
        $_SESSION['username'] = $user->nomeUsuario;
        $_SESSION['perfil'] = $user->idPerfil;
        
        header('Location: view/menuIndex.php');
        exit();
    } else {
        
        $error = 'Nome de usuário ou senha inválidos';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Login do usuário:</label>
        <input type="text" name="loginUsuario" required>
        <br>
        <label>Senha:</label>
        <input type="password" name="senhaUsuario" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
