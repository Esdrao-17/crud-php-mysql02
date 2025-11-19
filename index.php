<?php
require 'conexao.php';
<?php if (isset($_GET['msg']) && $_GET['msg'] == 'sucesso'): ?>
    <p style="color:green;">Cliente cadastrado com sucesso!</p>
<?php endif; ?>


$stmt = $pdo->query("SELECT * FROM clientes");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html><body>
<h1>Lista de Clientes</h1>
<a href="create.php">Novo Cliente</a>
<ul>
<?php foreach($clientes as $c): ?>
<li><?= $c['nome'] ?> - <?= $c['email'] ?></li>
<?php endforeach; ?>
</ul>
</body></html>