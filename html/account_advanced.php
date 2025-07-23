<?php
// Inicie a sessão
session_start();

// Verifique se o usuário está logado
if (isset($_SESSION['user_id'])) {
    $mostrar_perguntar = true;
    $mostrar_entrar_cadastrar = false;
} else {
    $mostrar_perguntar = false;
    $mostrar_entrar_cadastrar = true;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/12fea79a65.js" crossorigin="anonymous"></script>
    <title>Cranium</title>
    <link rel="stylesheet" href="../styles/account_advancedstyle.css">
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
                <!-- <div id="me">
                    <input type="checkbox" class="checkbox" id="chk" />
                    <label class="label" for="chk">
                      <i class="fas fa-moon"></i>
                      <i class="fas fa-sun"></i>
                      <div class="ball"></div>
                    </label>
                </div>
                -->
                <a href="../html/perfil.php" id="btn-perfil"><img id="imgu"src="/img/semfoto.png" alt=""></a>   
            </ul>
        </header>
        
        <div id="content">
            <main class="container">
                <form action="../scripts/update.php" method="post">
                    <div id="titlec">
                        <a id="v" href="perfil.php">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a> 
                        Configurações
                    </div>
                    <div id="ccontent">
                    <div class="esq">
                        <div id="items">
                            <a id="ac" class="items" href="../html/account.php">Conta</a>
                            <a id="ca" class="items" href="../html/account_advanced.php">Configurações Avançadas</a>
                            <a id="lo" class="items" href="../scripts/logout.php">Sair</a>
                        </div>
                    </div>
                    <div id="c">
                        <div id="ctitle">
                            Configurações Avançadas
                        </div>
                        <div id="seujeito">
                            Configure o Cranium do seu jeito
                        </div>
                        <div id="info">
                       <div id="nome">
                        <div id="tnome">
                            Nome
                        </div>
                        <div id="cnome">
                                <input type="text" name="nome" id="ccnome">
                            </div>
                        </div>

                    <div id="usuario">
                        <div id="tnome">
                            Usuário
                        </div>
                        <div id="cusuario">
                            <input type="text" name="usuario" id="ccusuario">
                        </div>
                    </div>

                    <div id="email">
                        <div id="temail">
                            Email
                        </div>
                        <div id="cemail">
                            <input type="email" name="email" id="ccemail">
                        </div>
                    </div>

                    <div id="senha">
                        <div id="tsenha">
                            Senha
                        </div>
                        <div id="csenha">
                            <input type="password" name="senha" id="ccsenha">
                        </div>
                    </div>

                        <div id="escolaridade">
                            <div id="tescolaridade">
                                Escolaridade
                            </div>
                            <div id="cescolaridade">
                                <select name="escolaridade" id="escolariedade" required="required">
                                    <option value="" selected disabled>Escolaridade</option>
                                    <option value="Ensino Fundamental I Completo">Ensino Fundamental I Completo</option>
                                    <option value="Ensino Fundamental II Completo">Ensino Fundamental II Completo</option>
                                    <option value="Ensino médio Completo">Ensino médio Completo</option>
                                    <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                                    <option value="Pós Graduação Completa">Pós Graduação Completa</option>
                                    <option value="Mestrado Completo">Mestrado Completo</option>
                                    <option value="Doutorado Completo">Doutorado Completo</option>
                                </select>
                            </div>
                        </div>
                    
                        <div id="genero">
                            <div id="tgenero">
                                Gênero
                            </div>
                            <div id="cgenero">
                                <select name="genero" required="required">
                                    <option value="" selected disabled>Gênero</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Outros">Prefiro não dizer</option>
                                    </select>
                            </div>
                        </div>
                        <input type="submit" id="sc" value="Salvar Configurações">
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