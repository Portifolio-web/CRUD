<?php
session_start();
require_once 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
$minEstoque = filter_input(INPUT_POST, 'minEstoque', FILTER_SANITIZE_NUMBER_INT);

if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['preco']) && !empty($_POST['preco'])) {

    //Tratar os dados para não deixar cadastrar mais de um mesmo produtos no banco de dados com o mesmo id.
    $sql = $cx_db->prepare("SELECT * FROM produtos WHERE nome = :nome");
    $sql->bindValue(':nome', $nome);
    $sql->execute();

    if($sql->rowCount() === 0) {

        // Nesse prepare eu mando um esboço de minha query afim de montar um template desse query.
        $sql = $cx_db->prepare("INSERT INTO produtos (nome, preco, estoque, minEstoque) VALUES(:nome, :preco, :estoque, :minEstoque)");
        // Aqui vai ser feita as associações de cada intes do template que foi montada na query acima.
        // O bindValue ele tem a função de substituir o valor dentro da função pela variável $nome, com isso o valor da query é mudado pra o valor da função.
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':preco', $preco);
        $sql->bindValue(':estoque', $estoque);
        $sql->bindValue(':minEstoque', $minEstoque);
        // só aqui ele executa os valores de inserção dentro do meu banco de dados
        $sql->execute();
        
        $_SESSION['alert_sucess'] = "Produtos Cadastrados com Sucesso!";

        //quano a query anterio e executado corretamente, ele volta para a mesma página.
        header("Location: add_users.php");
    } else {
        $_SESSION['alert_nao_cadast'] = "Produto já Cadastrado no Sistema!";
        header("Location: add_users.php");
        exit;  
    }

}else {
    $_SESSION['alert_campo'] = "Preenchar todos os Campos!";
    header("Location: add_users.php");
    exit;
}