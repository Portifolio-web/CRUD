<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastros de Produtos</h1>
    <section class="section_add_user">
        <h3>Preencha os Dados dos Produtos Corretamentes</h3>

        <form class="form_user" action="add_user_action.php" method="post">
            <div class="inputBox">
                <label id="nome" class="labelIput">Nome do Produto:</label>
                <input type="text" name="nome" id="nome" class="iputUser">
            </div>

            <div class="inputBox">
                <label id="preco" class="labelIput">Preço:</label>
                <br/>
                <input type="text" name="preco" id="preco" class="iputUser">
            </div>

            <div class="inputBox">
                <label id="estoque" class="labelIput">Estoque:</label>
                <input type="number" name="estoque" id="estoque" class="iputUser">
            </div>

            <div class="inputBox">
                <label id="minEstoque" class="labelIput">Estoque Mínimo:</label>
                <input type="number" name="minEstoque" id="minEstoque" class="iputUser">
            </div>
            <br>
            <input class="iputButton" type="submit" name="submit" id ="submit">
            <div class="btn-index"><a href="index.php">Voltar Home</a></div>
    </section> 
    <div class="alert">
        <?php 
            if($_SESSION['alert_sucess']) {
                echo "<p>".$_SESSION['alert_sucess']."</p>";
                $_SESSION['alert_sucess']='';
             }else if($_SESSION['alert_nao_cadast']) {
                echo "<p>".$_SESSION['alert_nao_cadast']."</p>";
                $_SESSION['alert_nao_cadast']='';
             }else {
                echo "<p>".$_SESSION['alert_campo']."</p>";
                $_SESSION['alert_campo']=''; 
             }
        ?>
    </div>   
</body>
</html>