<?php
require 'conexao.php';

try {
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['email']]);

    header("Location: index.php?msg=sucesso");
    exit;

} catch (PDOException $e) {

    // 23000 = erro de chave duplicada (UNIQUE)
    if ($e->getCode() == 23000) {
        header("Location: create.php?erro=email_duplicado");
        exit;
    }

    // Exibe outros erros
    die("Erro: " . $e->getMessage());
}
?>
