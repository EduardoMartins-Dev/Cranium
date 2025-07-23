<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../scripts/cnx.php';

    // Define o fuso horário padrão
    date_default_timezone_set('America/Sao_Paulo'); // Ajuste para o fuso horário desejado

    // Mapeamento dos meses para números
    $months = [
        "Janeiro" => 1,
        "Fevereiro" => 2,
        "Março" => 3,
        "Abril" => 4,
        "Maio" => 5,
        "Junho" => 6,
        "Julho" => 7,
        "Agosto" => 8,
        "Setembro" => 9,
        "Outubro" => 10,
        "Novembro" => 11,
        "Dezembro" => 12
    ];

    $dia = isset($_POST['dianasc']) ? $_POST['dianasc'] : '';
    $mes = isset($_POST['mesnasc']) ? $_POST['mesnasc'] : '';
    $ano = isset($_POST['anonasc']) ? $_POST['anonasc'] : '';

    // Verifica se a data de nascimento está completa
    if (!empty($dia) && !empty($mes) && !empty($ano)) {
        // Verifica se o mês é válido e converte para número
        if (isset($months[$mes])) {
            $mes_num = $months[$mes];
        } else {
            die("Mês inválido.");
        }

        // Verifica se a data é válida
        if (checkdate($mes_num, $dia, $ano)) {
            $idade = "$ano-$mes_num-$dia"; 
            
            $date = new DateTime($idade);
            $interval = $date->diff(new DateTime(date('Y-m-d')));
            $idade_formatada = $interval->format('%Y anos');
        } else {
            die("Data de nascimento inválida.");
        }
    } else {
        die("Data de nascimento incompleta.");
    }

    // Coleta os dados do formulário
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $escolaridade = isset($_POST['escolaridade']) ? $_POST['escolaridade'] : '';
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $usuario = isset($_POST['user']) ? $_POST['user'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['password']) ? $_POST['password'] : '';

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Protege contra SQL Injection usando prepared statements
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, usuario, email, senha, escolaridade, genero, idade) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nome, $usuario, $email, $senha_hash, $escolaridade, $genero, $idade_formatada);

    try {
        // Executa a query
        $stmt->execute();
        // Redireciona após o cadastro bem-sucedido
        header("Location: ../html/login.php");
        exit(); // Importante para garantir que o redirecionamento ocorra
    } catch (Exception $e) {
        // Exibe qualquer mensagem de erro que possa ocorrer
        echo "Erro: " . $e->getMessage();
    }

    // Fecha a conexão e o prepared statement
    $stmt->close();
    $conexao->close();
}
?>
