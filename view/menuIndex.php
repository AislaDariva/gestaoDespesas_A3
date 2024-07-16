<?php
    session_start();
    if (!isset($_SESSION['login_Usuario'])) {
        header('Location: ../index.php');
        exit();
    }
    const PERFIL_ADMINISTRADOR = 14;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Despesas</title>
</head>
<body>
    <h2>Gestão Despesas</h2>


    <?php if ($_SESSION['perfil'] == PERFIL_ADMINISTRADOR): ?>
        <button onclick="location.href='PerfilAcesso/index.html'">Cadastro de Perfis de Acesso</button>
        <button onclick="location.href='Usuario/index.html'">Cadastro de Usuários</button>
    <?php endif; ?>

    <button onclick="location.href='TipoDespesa/index.html'">Cadastro de Tipos de Despesas</button>
    <button onclick="location.href='Base/index.html'">Cadastro de Bases Físicas</button>
    <button onclick="location.href='Credor/index.html'">Cadastro de Credores</button>
    <button onclick="location.href='LancamentoDespesa/index.html'">Lançamentos de Despesas</button>
    <button onclick="location.href='Relatorio/Relatorio.php'">Relatório com filtro</button>
    <button onclick="location.href='menuIndex.php?logout=true'" >Sair</button>
</body>
</html>
<?php
function logout(){
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../index.php');
    exit();
}
    
if (isset($_GET['logout'])) {
    logout();
}
?>