<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM clientes ORDER BY id DESC");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>

<h1>Lista de Clientes</h1>

<?php if (isset($_GET['msg']) && $_GET['msg'] == 'sucesso'): ?>
    <p style="color:green;">Cliente cadastrado com sucesso!</p>
<?php endif; ?>

<a href="create.php">Cadastrar Novo Cliente</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($clientes as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['nome'] ?></td>
            <td><?= $c['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $c['id'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $c['id'] ?>" onclick="return confirm('Excluir?');">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
