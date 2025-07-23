<?php
include '../scripts/cnx.php';
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (isset($_SESSION['user_id'])) {
    $mostrar_perguntar = true;
    $mostrar_entrar_cadastrar = false;

    // Obtém o ID do usuário da sessão
    $user_id = $_SESSION['user_id'];

    // Consultar o banco de dados para obter as informações mais recentes do usuário
    $sql = "SELECT usuario, nome, genero, escolaridade, email FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Atualiza a sessão com as informações mais recentes
        $user_data = $result->fetch_assoc();
        $_SESSION['usuario'] = $user_data['usuario'];
        $_SESSION['nome'] = $user_data['nome'];
        $_SESSION['genero'] = $user_data['genero'];
        $_SESSION['escolaridade'] = $user_data['escolaridade'];
        $_SESSION['email'] = $user_data['email'];

        // Atribui as informações a variáveis
        $username = $_SESSION['username'];
        $nome = $_SESSION['nome'];
        $genero = $_SESSION['genero'];
        $escolaridade = $_SESSION['escolaridade'];
        $email = $_SESSION['email'];
    } else {
        // Caso não encontre o usuário no banco
        echo "Erro: usuário não encontrado.";
    }

} else {
    $mostrar_perguntar = false;
    $mostrar_entrar_cadastrar = true;
    // Redirecionar ou mostrar uma mensagem de erro, se necessário
    header('Location: ../html/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/12fea79a65.js" crossorigin="anonymous"></script>
    <title>Cranium</title>
    <link rel="stylesheet" href="../styles/accountstyle.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
</head>
<body>
    <header>
        <section id="title">
            <a href="../index.html" title="Cranium.com">
                <div class="logo">
                    <img id="logo" src="../img/txtlogo.png" alt="txtlogo">
                </div>
                <div class="logomobile">
                    <img id="logomobile" src="../img/logo.png" alt="Cranium">
                </div>
            </a>
        </section>
        
        <ul>
            <?php if ($mostrar_perguntar) { ?>
                        <a href="../html/questions.php" id="btn-perguntar" onclick="on()"><li>PERGUNTAR</li></a>
                <?php } ?>
                    
                <?php if ($mostrar_entrar_cadastrar) { ?>
                        <a href="../html/login.php" id="btn-entrar"><li>ENTRAR</li></a>
                <?php } ?>
            <a href="../html/perfil.php" id="btn-perfil"><img id="imgu" src="/img/semfoto.png" alt=""></a>   
        </ul>
    </header>

    <div id="content">
        <main class="container">
            <form action="" method="post">
                <div id="titlec">
                    <a id="v" href="../html/perfil.php">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a> 
                    Configurações
                </div>
                <div id="ccontent">
                    <div class="esq">
                        <div id="items">
                            <a class="items" href="../html/account.php">Conta</a>
                            <a class="items" href="../html/account_advanced.php">Configurações Avançadas</a>
                            <a id="lo" class="items" href="../scripts/logout.php">Sair</a>
                        </div>
                    </div>
                    <div id="c">
                        <div id="ctitle">
                            Conta   
                        </div>
                        <div id="textc">
                            <span>Conectado como</span>
                            <span><?php echo htmlspecialchars($email); ?></span>
                        </div>
                        <div id="conta">
                            Sua conta no Cranium
                        </div>
                        <p>
                            Esta é sua presença pública no Cranium. É preciso ter uma conta para fazer suas próprias perguntas, fazer comentários ou enviar resumos.
                        </p>
                        <div id="sc">
                            Sua conta
                        </div>
                        <div id="suaconta">
                            <div id="scc">
                                <img src="/img/semfoto.png" alt="">
                            </div>
                            <div id="scn">
                                <?php echo htmlspecialchars($nome); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <style>
    </style>
</body>
<script>
    // Obtém o caminho da URL atual
    const currentPage = window.location.pathname;

    // Seleciona todos os links de navegação
    const navLinks = document.querySelectorAll('.items');

    // Percorre os links e adiciona a classe "active" se o href corresponder ao caminho da URL atual
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
</script>
</html>
