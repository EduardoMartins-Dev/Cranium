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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/12fea79a65.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../styles/questionstyle.css">
    <script src="script.js" defer></script>
    <title>Cranium</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
</head>
<body>
    <div class="padding">
        <header>
            <section id="title">
                <a href="../index.html" title="Cranium.com">

                    <div class="logo">
                            <img id=logo src="../img/txtlogo.png" alt="txtlogo">
                    </div>

                    <div class="logomobile">
                            <img id=logomobile src="../img/logo.png" alt="Cranium">
                    </div>
                    
                </a>
            </section>
                
            <ul>
            <?php if ($mostrar_perguntar) { ?>
                <a id="btn-perguntar" onclick="on()"><li>PERGUNTAR</li></a>
            <?php } ?>
                
            <?php if ($mostrar_entrar_cadastrar) { ?>
                <a href="../html/login.php" id="btn-entrar"><li>ENTRAR</li></a>
            <?php } ?>
                <div id="me">
                    <input type="checkbox" class="checkbox" id="chk" />
                    <label class="label" for="chk">
                      <i class="fas fa-moon"></i>
                      <i class="fas fa-sun"></i>
                      <div class="ball"></div>
                    </label>
                </div> 
                <a href="../html/perfil.php" id="btn-perfil"><img id="imgu"src="/img/semfoto.png" alt=""></a>   
            </ul>

        </header>

        <div id="content">
            <main class="container">
                <form action="../html/questions.html" method="post">
                    <div id="carrossel">
                        <div id="materias">
                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Matematica">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/matematica.png" alt="Matematica" id="img">
                                    </div>
                                    <ma>Matematica</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Biologia">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/biologia.png" alt="Biologia" id="img">
                                    </div>
                                    <ma>Biologia</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Física">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/fisica.png" alt="Física" id="img">
                                    </div>
                                    <ma>Física</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Química">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/quimica.png" alt="Química" id="img">
                                    </div>
                                    <ma>Química</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Língua Portuguesa">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/LP.png" alt="Lingua Portuguesa" id="img">
                                    </div>
                                    <ma>Lingua Portuguesa</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Inglês">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/ingles.png" alt="Inglês" id="img">
                                    </div>
                                    <ma>Inglês</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Línguas Estrangeiras">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/Linguasestrangeiras.png" alt="Linguas Estrangeiras" id="img">
                                    </div>
                                    <ma>Linguas Estrangeiras</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Geografia">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/geografia.png" alt="Geografia" id="img">
                                    </div>
                                    <ma>Geografia</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="História">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/historia.png" alt="História" id="img">
                                    </div>
                                    <ma>História</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Filosofia">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/Filosofia.png" alt="Filosofia" id="img">
                                    </div>
                                    <ma>Filosofia</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Sociologia">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/Sociologia.png" alt="Sociologia" id="img">
                                    </div>
                                    <ma>Sociologia</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Artes">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/artes.png" alt="Artes" id="img">
                                    </div>
                                    <ma>Artes</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Informática">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/Informatica.png" alt="Informatica" id="img">
                                    </div>
                                    <ma>Informatica</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Lógica">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/logica.png" alt="Lógica" id="img">
                                    </div>
                                    <ma>Lógica</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Contabilidade">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/economia.png" alt="Contabilidade" id="img">
                                    </div>
                                    <ma>Contabilidade</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Psicologia">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/psicologia.png" alt="Psicologia" id="img">
                                    </div>
                                    <ma>Psicologia</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Pedagogia">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/pedagogia.png" alt="Pedagogia" id="img">
                                    </div>
                                    <ma>Pedagogia</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Direito">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/direito.png" alt="Direito" id="img">
                                    </div>
                                    <ma>Direito</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Administração">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/adm.png" alt="Administração" id="img">
                                    </div>
                                    <ma>Administração</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Ed. Física">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/ed fis.png" alt="Ed. Física" id="img">
                                    </div>
                                    <ma>Ed. Física</ma>
                                </a>
                            </div>

                            <div id="materia">
                                <a href="#" id="btn-materia" data-materia="Saúde">
                                    <div id="imgmateria">
                                        <img src="../img/CraniumMat/Saude.png" alt="Saúde" id="img">
                                    </div>
                                    <ma>Saúde</ma>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        <!-- container de pesquisa -->
            <main class="container2">
                <form class="form2" action="" method="post">
                    <div id="headbar">
                        <div id="tipo">
                            <select name="resmat" id="resmat" required="required" onchange="this.form.submit()">
                                <option id="perguntas" value="Perguntas" <?php echo isset($_POST['resmat']) && $_POST['resmat'] == 'Perguntas' ? 'selected' : ''; ?>>Perguntas</option>
                                <option id="resumos" value="Resumos" <?php echo isset($_POST['resmat']) && $_POST['resmat'] == 'Resumos' ? 'selected' : ''; ?>>Resumos</option>
                            </select>
                            <i class="fa-solid fa-angle-down" id="lpr"></i>
                        </div>

                        <div id="barra">
                            <input type="text" id="pesquisa" name="pesquisa" placeholder="Pesquisar">
                            <div id="search">
                                <button>
                                    <i class="fa fa-search" id="lp"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="perguntas">
                    <?php
    date_default_timezone_set('America/Sao_Paulo');
    include '../scripts/cnx.php';

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Inicializa as variáveis
    $search_text = '';
    $contString = 0;
    $tipo = isset($_POST['resmat']) ? $_POST['resmat'] : 'Perguntas'; // 'Perguntas' como padrão
    $materia = isset($_POST['materia']) ? $_POST['materia'] : ''; // Matéria selecionada

    // Verifica se veio uma pesquisa via GET (indexP da tela index.html)
    if (isset($_GET['indexP']) && !empty(trim($_GET['indexP']))) {
        $search_text = trim($_GET['indexP']);
        $contString = strlen($search_text);
    }

    // Verifica se veio uma pesquisa via POST (campo de pesquisa da tela questions.php)
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pesquisa'])) {
        $search_text = trim($_POST['pesquisa']);
        $contString = strlen($search_text);
    }

    // Processa a pesquisa se o texto tiver ao menos 4 caracteres
    if ($contString >= 4) {
        // Define a consulta SQL com base no tipo
        if ($tipo == 'Perguntas') {
            $sql = "SELECT p.*, u.nome, u.usuario, u.escolaridade 
                    FROM perguntas p
                    INNER JOIN usuarios u ON p.usuario_id = u.id
                    WHERE p.descricao LIKE '%$search_text%'";

            // Se a matéria foi selecionada, adiciona o filtro
            if ($materia !== '') {
                $sql .= " AND p.materia = '$materia'";
            }
        } elseif ($tipo == 'Resumos') {
            $sql = "SELECT r.*, u.nome, u.usuario, u.escolaridade 
                    FROM resumos r
                    INNER JOIN usuarios u ON r.id_usuario = u.id
                    WHERE r.descricao LIKE '%$search_text%'";

            // Se a matéria foi selecionada, adiciona o filtro
            if ($materia !== '') {
                $sql .= " AND r.materia = '$materia'";
            }
        }

        // Executa a consulta
        $result = $conexao->query($sql);

        // Exibe os resultados
        if ($result->num_rows > 0) {
            echo "<div class='resultados'>";
            while ($column = $result->fetch_assoc()) {
                echo "<div class='perguntas'>";
                echo "<div class='pergunta'>";

                echo "<div id='sup'>";
                echo "<div id='imgusuario'>";
                echo "<a href='../html/perfil.html'>";
                echo "<img src='../img/semfoto.png' alt='Imagem de usuário' id='imguser'>";
                echo "</a>";
                echo "</div>";

                echo "<div id='materiapergunta'>";
                echo "<div id='user'>";
                echo "<h4>" . $column['nome'] . "</h4>";
                echo "<a href=''>";
                echo "<h5>@" . $column['usuario'] . "</h5>";
                echo "</a>";
                echo "</div>";
                echo "<li class='pp'>" . date('Y/m/d', strtotime($column['data_postagem'])) . "</li>";
                echo "<li class='pp'>" . htmlspecialchars($column['materia']) . "</li>";
                echo "<li class='pp'>" . htmlspecialchars($column['escolaridade']) . "</li>";
                echo "</div>";
                echo "</div>";

                echo "<div id='conteudo'>";
                echo "<div id='usertext'>";
                // Link dinâmico baseado no tipo selecionado
                $link = $tipo == 'Perguntas' ? "specific.php?id=" . $column['id'] : "resumos.php?id=" . $column['id'];
                echo "<a href='" . htmlspecialchars($link) . "'>";
                echo "<h4>" . htmlspecialchars($column['descricao']) . "</h4>";
                echo "</a>";
                echo "</div>";
                echo "</div>";

                echo "<div id='responder'>";
                echo "<input type='button' value='Responder' id='btnresponder' data-id='" . $column['id'] . "'>";
                echo "</div>";

                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>Nenhum resultado encontrado para sua busca.</p>";
        }
    } elseif ($search_text !== '') {
        echo "<p>O termo de pesquisa deve ter pelo menos 4 caracteres.</p>";
    } else {
        // Mostra conteúdo recente com base no tipo selecionado
        if ($tipo == 'Perguntas') {
            $sql = "SELECT p.*, u.nome, u.usuario, u.escolaridade 
                    FROM perguntas p
                    INNER JOIN usuarios u ON p.usuario_id = u.id
                    WHERE 1"; // Filtro para todas as perguntas

            // Se a matéria foi selecionada, adiciona o filtro
            if ($materia !== '') {
                $sql .= " AND p.materia = '$materia'";
            }

            $sql .= " ORDER BY p.data_postagem DESC LIMIT 20";
        } elseif ($tipo == 'Resumos') {
            $sql = "SELECT r.*, u.nome, u.usuario, u.escolaridade 
                    FROM resumos r
                    INNER JOIN usuarios u ON r.id_usuario = u.id
                    WHERE 1"; // Filtro para todos os resumos

            // Se a matéria foi selecionada, adiciona o filtro
            if ($materia !== '') {
                $sql .= " AND r.materia = '$materia'";
            }

            $sql .= " ORDER BY r.data_postagem DESC LIMIT 20";
        }

        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='resultados'>";
            while ($column = $result->fetch_assoc()) {
                echo "<div class='perguntas'>";
                echo "<div class='pergunta'>";

                echo "<div id='sup'>";
                echo "<div id='imgusuario'>";
                echo "<a href='../html/perfil.html'>";
                echo "<img src='../img/semfoto.png' alt='Imagem de usuário' id='imguser'>";
                echo "</a>";
                echo "</div>";

                echo "<div id='materiapergunta'>";
                echo "<div id='user'>";
                echo "<h4>" . $column['nome'] . "</h4>";
                echo "<a href=''>";
                echo "<h5>@" . $column['usuario'] . "</h5>";
                echo "</a>";
                echo "</div>";
                echo "<li class='pp'>" . date('Y/m/d', strtotime($column['data_postagem'])) . "</li>";
                echo "<li class='pp'>" . htmlspecialchars($column['materia']) . "</li>";
                echo "<li class='pp'>" . htmlspecialchars($column['escolaridade']) . "</li>";
                echo "</div>";
                echo "</div>";

                echo "<div id='conteudo'>";
                echo "<div id='usertext'>";
                // Link dinâmico baseado no tipo selecionado
                $link = $tipo == 'Perguntas' ? "specific.php?id=" . $column['id'] : "resumos.php?id=" . $column['id'];
                echo "<a href='" . htmlspecialchars($link) . "'>";
                echo "<h4>" . htmlspecialchars($column['descricao']) . "</h4>";
                echo "</a>";
                echo "</div>";
                echo "</div>";

                echo "<div id='responder'>";
                echo "<input type='button' value='Responder' id='btnresponder' data-id='" . $column['id'] . "'>";
                echo "</div>";

                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>Não há conteúdos disponíveis.</p>";
        }
    }
?>

                    </div>
                </form>

            </main>
        </div>
    </div>

    <div id="overlay">
        <main class="overlaycontainer">
            <form action="../scripts/inserir.php" method="post" enctype="multipart/form-data">
                <div id="textos">
                    <div id="txt">
                        <h2 id="h22">Faça sua pergunta</h2>
                        <div id="trocar">
                            <i class="fa-solid fa-repeat" onclick="troca()"></i>
                        </div>
                    </div>
                    <div id="buttonoff">
                        <i class="fa-solid fa-x" onclick="off()"></i>
                    </div>
                </div>

                <div id="textopergunta">
                    <textarea name="pergunta" id="txtpergunta" maxlength="10000"></textarea>
                    <div id="contador">
                        <h3><span>0</span>/10000</h3>
                    </div>
                </div>

                <input type="file" id="arquivo" name="arquivo">

                <div class="footer">
                    <div id="selectmateria">
                        <select name="materia" id="mesnasc" required="required">
                            <option value="" selected disabled>Matéria</option>
                            <option value="Matematica">Matematica</option>
                            <option value="Biologia">Biologia</option>
                            <option value="Física">Física</option>
                            <option value="Química">Química</option>
                            <option value="Língua Portuguesa">Língua Portuguesa</option>
                            <option value="Inglês">Inglês</option>
                            <option value="Línguas Estrangeiras">Línguas Estrangeiras</option>
                            <option value="Geografia">Geografia</option>
                            <option value="História">História</option>
                            <option value="Filosofia">Filosofia</option>
                            <option value="Sociologia">Sociologia</option>
                            <option value="Artes">Artes</option>
                            <option value="Informática">Informática</option>
                            <option value="Lógica">Lógica</option>
                            <option value="Contabilidade">Contabilidade</option>
                            <option value="Psicologia">Psicologia</option>
                            <option value="Pedagogia">Pedagogia</option>
                            <option value="Direito">Direito</option>
                            <option value="Administração">Administração</option>
                            <option value="Ed. Física">Ed. Física</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    
                    <input type="hidden" name="tituloPergunta" id="tituloPergunta">
                    <div id="buttonenviar">
                        <button type="submit" onclick="setTitulo()">Enviar</button>
                    </div>
                </div>
            </form>
        </main>
    </div>

<script>
function setTitulo() {
    var titulo = document.getElementById('h22').innerText;
    document.getElementById('tituloPergunta').value = titulo;
}
</script>

</body>
</html>

<script>

    document.querySelectorAll('a[href^="specific.php"]').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = link.href;
        });
    });
    function on() {
      document.getElementById("overlay").style.display = "block";
    }
    
    function off() {
      document.getElementById("overlay").style.display = "none";
    }

    let textarea= document.querySelector('textarea'),
    character_in=document.querySelector('h3 span');

    textarea.onkeyup=function(){
        character_in.innerText=textarea.value.length
    }

    function continuar(event) {
    // Evita o comportamento padrão do botão (fechar o overlay)
    event.preventDefault();
    // Coloque aqui o código para continuar o processo após clicar no botão
}


document.getElementById("chk").addEventListener("click", function() {
    console.log("Checkbox clicked: ", this.checked);
  if (this.checked) {
    document.querySelector("link[rel='stylesheet']").href = "../stylesdark/q_dark.css";
  } else {
    document.querySelector("link[rel='stylesheet']").href = "../styles/questionstyle.css";
  }
});

    let textoAtual = "Faça sua pergunta";

    function troca() {
        const h2Element = document.getElementById("h22");
        textoAtual = (textoAtual === "Faça sua pergunta") ? "Disponibilize seu resumo" : "Faça sua pergunta";
        h2Element.innerText = textoAtual;
    }

    function setTituloPergunta() {
        // Atribui o valor do texto do h2 ao campo oculto antes de enviar o formulário
        document.getElementById("tituloPergunta").value = textoAtual;
    }
/*
document.getElementById("chk").addEventListener("click", function() {
  if (this.checked) {
    document.querySelector("link[id='style']").href = "../stylesdark/q_dark.css";
    document.getElementById("imat").innerHTML = "..img/matematicaesc.png";
    document.getElementById("ibio").innerHTML = "..img/biologiaesc.png"
    document.getElementById("ifis").innerHTML = "..img/fisicaesc.png"
    document.getElementById("iqui").innerHTML = "..img/quimicaesc.png"
    document.getElementById("ipor").innerHTML = "..img/portuguesesc.png"
    document.getElementById("iing").innerHTML = "..img/inglesesc.png"
    document.getElementById("ilin").innerHTML = "..img/linguasestrangeirasesc.png"
    document.getElementById("igeo").innerHTML = "..img/geografiaesc.png"
    document.getElementById("ihis").innerHTML = "..img/historiaesc.png"
    document.getElementById("ifil").innerHTML = "..img/filosofiaesc.png"
    document.getElementById("isoc").innerHTML = "..img/sociologiaesc.png"
    document.getElementById("iart").innerHTML = "..img/artesesc.png"
    document.getElementById("iinf").innerHTML = "..img/informaticaesc.png"
    document.getElementById("ilog").innerHTML = "..img/logicaesc.png"
    document.getElementById("icon").innerHTML = "..img/contabilidadeesc.png"
    document.getElementById("ipsi").innerHTML = "..img/psicologiaesc.png"
    document.getElementById("iped").innerHTML = "..img/pedagogiaesc.png"
    document.getElementById("idir").innerHTML = "..img/direitoesc.png"
    document.getElementById("iadm").innerHTML = "..img/admistraçãoesc.png"
    document.getElementById("iedf").innerHTML = "..img/edfisicaesc.png"
    document.getElementById("isau").innerHTML = "..img/saudeesc.png"
  } else {
    document.querySelector("link[id='style']").href = "../styles/questionsstyle.css";
  }
});
*/


// Adiciona event listener a cada link
document.querySelectorAll('#btn-materia').forEach(a => {
    a.addEventListener('click', function(e) {
        e.preventDefault();
            const materia = this.getAttribute('data-materia');
                                    
        // Envia a matéria via POST
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = ''; // Ação pode ser a própria página
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'materia';
        input.value = materia;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });
});



</script>

