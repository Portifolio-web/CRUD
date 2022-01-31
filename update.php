<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <?php 
        require_once 'config.php';
        
        $info = [];//variável vai ter a informação do produto
        $id = filter_input(INPUT_GET, 'id');

        if($id) {
            // aqui fazemos a consulta dentro do bd de todos os IDs e guarda dentro de uma variável sql, para ser usada depois.
            $sql = $cx_db->prepare("SELECT * FROM produtos WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            //verificar se existe esse id dentro do banco de dados
            if($sql->rowCount() > 0) {
                //aqui pego uma informação especifica que é o id do produto específico   
                $info = $sql->fetch(PDO::FETCH_ASSOC);

            } else {
                header("Location: index.php");
                exit;
            }

        } else {
            header("Location: index.php");
            exit;
        }
    ?>
    <h1>Editar Produtos</h1>
    
    <section class="section_add_user">
        <h3>Edite os Dados dos Produtos Corretamentes</h3>
        
        <form class="form_user" action="update_action.php" method="post">
            <!-- campo oculto -->
            <input type="hidden" name="id" value="<?=$info['id'];?>">

            <div class="inputBox">
                <label id="nome" class="labelIput">Atualizar Nome do Produto:</label>
                <input type="text" name="nome" id="nome" class="iputUser" value="<?=$info['nome'];?>">
            </div>

            <div class="inputBox">
                <label id="preco" class="labelIput">Atualizar Preço:</label>
                <br/>
                <input type="text" name="preco" id="preco" class="iputUser" value="<?=$info['preco'];?>">
            </div>

            <div class="inputBox">
                <label id="estoque" class="labelIput">Atualizar Estoque:</label>
                <input type="text" name="estoque" id="estoque" class="iputUser" value="<?=$info['estoque'];?>">
            </div>

            <div class="inputBox">
                <label id="minEstoque" class="labelIput">Atualizar Estoque Mínimo:</label>
                <input type="text" name="minEstoque" id="minEstoque" class="iputUser" value="<?=$info['minEstoque'];?>">
            </div>

            <div class="inputBox">
                <label id="id_fornecedor" class="labelIput">ID Fornecedor:</label>
                <input type="text" name="id_fornecedor" id="id_fornecedor" class="iputUser" value="<?=$info['id_fornecedor'];?>">
            </div>
            <br>
            <input class="iputButton" type="submit" name="submit" id ="submit">
            <div class="btn-index"><a href="index.php">Voltar Home</a></div>
    </section>    
</body>
</html>