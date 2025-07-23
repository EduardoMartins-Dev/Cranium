<?php
include '../scripts/cnx.php';
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailoruser = $_POST["emailoruser"];
    $password = $_POST["password"];

    // Prepare a consulta para evitar SQL Injection
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? OR usuario = ?");
    $stmt->bind_param("ss", $emailoruser, $emailoruser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        if (password_verify($password, $user_data["senha"])) {
            // Armazena os dados do usuário na sessão
            $_SESSION["user_id"] = $user_data["id"];
            $_SESSION["nome"] = $user_data["nome"];
            $_SESSION["usuario"] = $user_data["usuario"];
            $_SESSION["email"] = $user_data["email"];
            $_SESSION["genero"] = $user_data["genero"];
            $_SESSION["escolaridade"] = $user_data["escolaridade"];

            // Redireciona para a página de perguntas
            header("Location: ../html/questions.php");
            exit;
        } else {
            // Mensagem de erro para senha incorreta
            $_SESSION['error'] = "Senha incorreta";
            header("Location: ../html/login.php");
            exit;
        }
    } else {
        // Mensagem de erro para usuário não encontrado
        $_SESSION['error'] = "Usuário não encontrado";
        header("Location: ../html/login.php");
        exit;
    }
}

// Fecha a conexão
$stmt->close();
$conexao->close();
?>
