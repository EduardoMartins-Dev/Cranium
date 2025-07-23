<?php
include '../scripts/cnx.php';
session_start();

// Verifique se a sessão do usuário está ativa
if (!isset($_SESSION['user_id'])) {
    // Redirecionar para a página de login se o usuário não estiver logado
    header("Location: ../html/login.php");
    exit();
}

if (isset($_SESSION['user_id'])) {
    $mostrar_perguntar = true;
    $mostrar_entrar_cadastrar = false;
} else {
    $mostrar_perguntar = false;
    $mostrar_entrar_cadastrar = true;
}

// Recupere as informações do usuário da sessão
$user_id = $_SESSION['user_id'];
$username = $_SESSION['usuario'];
$nome = $_SESSION['nome'];
$genero = $_SESSION['genero'];
$escolaridade = $_SESSION['escolaridade'];


// Instrução SQL para buscar as perguntas feitas pelo usuário
$sql = "SELECT * FROM perguntas WHERE usuario_id = ? ORDER BY data_postagem DESC";

// Preparar e executar a consulta SQL
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $user_id);  // "i" indica que o parâmetro é um inteiro
$stmt->execute();
$result = $stmt->get_result();

// Verificar se há resultados
$perguntas = [];
while ($row = $result->fetch_assoc()) {
    $perguntas[] = $row;
}

// Fechar a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/12fea79a65.js" crossorigin="anonymous"></script>
    <title>Cranium</title>
    <link rel="stylesheet" href="../styles/perfilstyle.css">
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
                <a href="../html/perfil.php" id="btn-perfil"><img id="imgu"src="/img/semfoto.png" alt=""></a>   
            </ul>
    </header>

    <div id="content">
        <main class="container">
            <form action="" method="post">
                <div id="userinfo">
                    <div id="fotousuario">
                        <img id="img" src="../img/semfoto.png" alt="">
                    </div>

                    <div id="row">
                        <div id="user">
                            <h1>@<?= htmlspecialchars($username) ?></h1>
                        </div>

                        <div id="nome">
                            <h1><?= htmlspecialchars($nome) ?></h1>
                        </div>

                        <div id="tipo">
                            <h3><?= htmlspecialchars($genero) ?></h3>
                        </div>

                        <div id="grau">
                            <h3><?= htmlspecialchars($escolaridade) ?></h3>
                        </div>
                    </div>

                    <div id="config">
                        <a id="cc" href="account.php">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                    </div>
                </div>

                <div id="userdata">
                    <input type="button" id="boto" value="Perguntas feitas e respondidas">
                    <div class="perguntas">
                        <?php if (!empty($perguntas)): ?>
                            <?php foreach ($perguntas as $pergunta): ?>
                                <div class="pergunta">
                                    <div id="sup">
                                        <div id="imgusuario">
                                            <a href="../html/perfil.php">
                                                <img src="../img/semfoto.png" alt="Pergunta" id="imguser">
                                            </a>
                                        </div>

                                        <div id="materiapergunta">
                                            <div id="user">
                                                <h4><?= htmlspecialchars($nome) ?></h4>
                                                <a href="">
                                                    <h5>@<?= htmlspecialchars($username) ?></h5>
                                                </a>
                                            </div>

                                            <ul>
                                                <li class="pp"><?= date('d/m/Y', strtotime($pergunta['data_postagem'])) ?></li>
                                                <li class="pp"><?= htmlspecialchars($pergunta['materia']) ?></li>
                                                <li class="pp"><?= htmlspecialchars($escolaridade) ?></li> <!-- A escolaridade aqui -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div id="conteudo">
                                        <div id="usertext">
                                            <h4><?= htmlspecialchars($pergunta['descricao']) ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Você ainda não fez nenhuma pergunta.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
