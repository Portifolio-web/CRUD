<?php
require_once 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
$minEstoque = filter_input(INPUT_POST, 'minEstoque', FILTER_SANITIZE_NUMBER_INT);

if(isset($_POST['nome']) && !empty($_POST['nome'])) {

    // atualizar as informações dos dados editar
    $sql = $cx_db->prepare("UPDATE produtos SET nome = :nome, preco = :preco, estoque = :estoque, minEstoque = :minEstoque WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':preco', $preco);
    $sql->bindValue(':estoque', $estoque);
    $sql->bindValue(':minEstoque', $minEstoque);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;

}else {
    header("Location: add_users.php");
    exit;
}