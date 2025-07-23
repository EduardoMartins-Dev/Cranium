<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $mostrar_perguntar = true;
    $mostrar_entrar_cadastrar = false;
} else {
    $mostrar_perguntar = false;
    $mostrar_entrar_cadastrar = true;
}

$pergunta_id = isset($_GET['id']) ? intval($_GET['id']) : null; // Certifique-se de que o ID seja um inteiro

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/12fea79a65.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/resumostyles.css">
    <title>Cranium - O melhor jeito de aprender é ensinando</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
</head>
<body>
    <div class="padding">
        <header id="header">
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
                <!-- 

                MODO ESCURO

                <div id="me">
                    <input type="checkbox" class="checkbox" id="chk" />
                    <label class="label" for="chk">
                      <i class="fas fa-moon"></i>
                      <i class="fas fa-sun"></i>
                      <div class="ball"></div>
                    </label>
                </div> 

                -->
                <a href="../html/perfil.php" id="btn-perfil"><img id="imgu" src="/img/semfoto.png" alt=""></a>   
            </ul>
        </header>

        <div id="content">
        <!-- container de pesquisa -->
            <main class="container">
            <div id="headbar">
                        <div id="barra">
                            <input type="text" id="pesquisa" name="pesquisa" placeholder="Pesquisar">
                            <div id="search">
                                <button> 
                                    <i class="fa fa-search" id="src"></i>
                                </button>
                            </div>
                        </div>
                    </div>
<div class="tudo">
                <form action=" method="POST"> 
                    <div class="perguntas">
                        <?php
                            // Conecte-se ao banco de dados
                            include '../scripts/cnx.php';

                            // Verifique se o ID foi passado via GET
                            if ($pergunta_id) {
                                // Execute a consulta para recuperar os dados da pergunta e do usuário
                                $sql = "SELECT r.*, u.nome, u.usuario, u.escolaridade 
                                        FROM resumos r
                                        INNER JOIN usuarios u ON r.id_usuario = u.id 
                                        WHERE r.id = ?";

                                // Preparar a consulta para evitar SQL Injection
                                if ($stmt = $conexao->prepare($sql)) {
                                    $stmt->bind_param("i", $pergunta_id); // Vincula o ID como parâmetro
                                    $stmt->execute(); // Executa a consulta
                                    $result = $stmt->get_result(); // Obtém o resultado da consulta
                                    
                                    // Verifique se a consulta retornou resultados
                                    if ($result->num_rows > 0) {
                                        // Exiba os dados da pergunta
                                        $column = $result->fetch_assoc();
                        ?>
                    <div class="pergunta">
                        <div id="sup">
                            <div id="imgusuario">
                                <a href="../html/perfil.html">
                                    <img src="../img/semfoto.png" alt="Pergunta" id="imguser">
                                </a>
                            </div>
                            <div id="materiapergunta">
                                <div id="user">
                                    <h6><?php echo htmlspecialchars($column['nome']); ?></h6> <!-- Nome do usuário -->
                                    <a href="perfil.html">
                                        <h5>@<?php echo htmlspecialchars($column['usuario']); ?></h5> <!-- Nome de usuário -->
                                    </a>
                                </div>
                                <li class="pp"><?php echo date('d/m/Y', strtotime($column['data_postagem'])); ?></li> 
                                <li class="pp"><?php echo htmlspecialchars($column['materia']); ?></li> 
                                <li class="pp"><?php echo htmlspecialchars($column['escolaridade']); ?></li> 
                            </div>
                        </div>
                        <div id="conteudo">
                            <div id="usertext">
                                <h4 id="txt"><?php echo htmlspecialchars($column['descricao']); ?></h4> 
                            </div>
                            <?php 
                            // Verifique se há um caminho de imagem na coluna 'arquivo' do banco de dados
                            if (!empty($column['arquivo'])) { 
                                $imagem_caminho = "../uploads/" . htmlspecialchars($column['arquivo']); // Caminho completo da imagem na pasta 'uploads'
                            } elseif (!empty($column['imagem'])) { 
                                $imagem_caminho = htmlspecialchars($column['imagem']); // Caminho da imagem se armazenado em 'imagem'
                            } else {
                                 
                            }
                            ?>
                            <div class="img">
                                <?php if (!empty($imagem_caminho)) { ?>
                                    <img class="panda" src="<?php echo $imagem_caminho; ?>" alt="<?php echo htmlspecialchars($column['descricao']); ?>"> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                                } else {
                                    echo "Pergunta não encontrada."; 
                                }
                                $stmt->close();
                            }
                        } else {
                            echo "ID da pergunta não informado."; 
                        }
                        $conexao->close();
                    ?>
                </div>

                </form>
                </div>
            </main>
        </div>
    </div>

    <script>
    /*
        document.getElementById("chk").addEventListener("click", function() {
  if (this.checked) {
    document.querySelector("link[rel='stylesheet']").href = "../styles/dark-mode.css";
  } else {
    document.querySelector("link[rel='stylesheet']").href = "../styles/specificstyle.css";
  }
});
*/

</script>