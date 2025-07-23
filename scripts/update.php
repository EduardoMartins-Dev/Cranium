<?php
session_start();
include '../scripts/cnx.php';

// Verifique se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Obtenha o ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Receba os dados do formulário, com verificações para evitar SQL injection
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
$usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) ? password_hash(trim($_POST['senha']), PASSWORD_DEFAULT) : null;
$escolaridade = isset($_POST['escolaridade']) ? trim($_POST['escolaridade']) : null;
$genero = isset($_POST['genero']) ? trim($_POST['genero']) : null;

// Verifique se todos os dados obrigatórios estão preenchidos
if (!$nome || !$usuario || !$email || !$senha || !$escolaridade || !$genero) {
    echo "Por favor, preencha todos os campos obrigatórios.";
    exit();
}

// Atualize os dados do usuário no banco de dados
$sql = "UPDATE usuarios SET nome = ?, usuario = ?, email = ?, senha = ?, escolaridade = ?, genero = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssssssi", $nome, $usuario, $email, $senha, $escolaridade, $genero, $user_id);

// Execute a atualização e verifique o resultado
if ($stmt->execute()) {
    // Após a atualização, atualize os dados na sessão para refletir as mudanças
    $_SESSION['user_nome'] = $nome;
    $_SESSION['user_usuario'] = $usuario;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_escolaridade'] = $escolaridade;
    $_SESSION['user_genero'] = $genero;

    // Se a senha foi alterada, atualize também a sessão (não altere diretamente, apenas recarregue os dados)
    // O login precisa ser feito novamente para atualizar a senha na sessão
    // Caso contrário, você pode apenas redirecionar
    header("Location: ../html/account_advanced.php");
    exit(); // Pare o script após o redirecionamento
} else {
    echo "Erro ao atualizar configurações: " . $stmt->error;
}

// Feche a conexão
$stmt->close();
$conexao->close();
?>
