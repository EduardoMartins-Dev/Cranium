<?php
// Iniciar a sessão no início do arquivo PHP
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION["user_id"])) {
    // Se já estiver logado, redireciona para a página de perguntas
    header("Location: ../html/questions.php");
    exit;
}

// Verifica se há uma mensagem de erro na sessão
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // Remove o erro da sessão após carregar
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Cranium</title>
    <link rel="stylesheet" href="../styles/loginstyle.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
</head>
<body>
    <div id="content">
        <main class="container">
            <form action="../scripts/login.php" method="post">
                <div id="textos">
                    <img src="../img/logo.png">
                    <h2>Fazer <t>login</t></h2>
                    <h6>Entre com seu email ou usuário</h6>
                </div>

                <div id="formcolumn">
                    <div class="input-field">
                        <input type="text" name="emailoruser" id="emailoruser"
                        placeholder="Email ou Usuário" required>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" id="password"
                        placeholder="Senha" required>
                        <img src="../svg/eye-solid.svg" title="Ocultar/Mostrar Senha" id="button">
                    </div>

                    <!-- Exibe a mensagem de erro como texto pequeno, se houver -->
                    <?php if (!empty($error)) { ?>
                        <small class="text-danger d-block mt-2 text-center">
                            <?= htmlspecialchars($error) ?>
                        </small>
                    <?php } ?>    

                    <div class="footer">
                        <input type="submit" value="Continuar">
                        <span>Não tem uma conta?<span> <a href ="../html/tela.html" >Crie uma</a>
                    </div>
                </div><!-- fim formcolumn -->
            </form>
        </main>
    </div>
</body>
<script>
    // Alternar visibilidade da senha
    $(document).ready(function(){
        $('#button').on('click', function(){
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            var img = $('#button');
                    
            if(passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
                img.attr('src', '../svg/eye-slash-solid.svg');
            } else {
                passwordField.attr('type', 'password');
                img.attr('src', '../svg/eye-solid.svg');
            }
        });
    });
</script>
</html>
