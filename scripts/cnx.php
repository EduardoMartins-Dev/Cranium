<?php
$host = "sql208.infinityfree.com";
$user = "if0_37235662";
$pass = "ratogordo123";
$banco = "if0_37235662_cranium";
try {
    // Tentar estabelecer a conexão
    $conexao = @mysqli_connect($host, $user, $pass, $banco);
    // Verificar se a conexão foi bem-sucedida
    if (!$conexao) {
        throw new Exception("Problemas com a conexão do Banco de Dados: " . mysqli_connect_error());
    }

} catch (Exception $e) {
    // Capturar a exceção e exibir a mensagem de erro
    echo "erro:". $e->getMessage();
}
?>
