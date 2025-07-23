<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redireciona para a página 'specific.php' com um parâmetro de erro
    header("Location: ../html/specific.php?error=Você precisa estar logado para responder.");
    exit; // Certifique-se de que o script pare após o redirecionamento
}

include '../scripts/cnx.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['user_id'];
    $pergunta_id = isset($_POST['pergunta_id']) ? intval($_POST['pergunta_id']) : null; // Corrigido para buscar do POST
    $resposta = isset($_POST['txtresp']) ? htmlspecialchars(trim($_POST['txtresp'])) : '';
    $data_resp = date('Y-m-d H:i:s');

    // Verifica se o ID da pergunta ou a resposta estão inválidos
    if (!$pergunta_id) {
        header("Location: ../html/specific.php?error=ID da pergunta não encontrado.");
        exit;
    }
    if (empty($resposta)) {
        header("Location: ../html/specific.php?id=" . $pergunta_id . "&error=Resposta não pode estar vazia.");
        exit;
    }

    if ($pergunta_id && !empty($resposta)) {
        $sql = "INSERT INTO respostas (pergunta_id, usuario_id, resposta, data_resp) VALUES (?, ?, ?, ?)";
        if ($stmt = $conexao->prepare($sql)) {
            $stmt->bind_param("iiss", $pergunta_id, $usuario_id, $resposta, $data_resp);

            if ($stmt->execute()) {
                // Redirecionamento após a inserção bem-sucedida
                header("Location: ../html/specific.php?id=" . $pergunta_id);
                exit;
            } else {
                echo "Erro ao inserir a resposta: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conexao->error;
        }
    }
}

$conexao->close();
?>
