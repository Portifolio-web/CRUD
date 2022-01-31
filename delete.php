<?php
require_once 'config.php';
// aqui o id do produtos vem via get na url será filtrado e guardado em uma variável $id.
$id = filter_input(INPUT_GET, 'id');

if($id) {
    // essa query faz uma exclusão de um item dentro do banco na tabela produtos dos produtos com $id igual ao valor recebido via get.
    $sql = $cx_db->prepare("DELETE FROM produtos WHERE id = :id");

    $sql->bindValue(':id', $id);
    $sql->execute();
}
// volta para a página Home.
header("Location: index.php");
exit;