<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD de tabelas</title>
</head>
<body>
    <?php 
        require_once 'config.php';
        $lista = [];
        $sql = $cx_db->query("SELECT * FROM produtos");

        if($sql->rowCount() > 0) {
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>
    <div class="sectionHead">
        <h1>Listas de Itens dos Produtos</h1>
    </div>
    <section class="section_show">
    <div class="btn_add-user">
        <p><a href="add_users.php">Cadastrar Produtos</a></p>
    </div>
        <table class= "table_list">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preços</th>
                <th>Total Estoque</th>
                <th>Estoque Mínimo</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php foreach($lista as $itens): ?>
                <tr>
                <td><?=$itens['id'];?></td>
                <td><?=$itens['nome'];?></td>
                <td>R$ <?=$itens['preco'];?></td>
                <td><?=$itens['estoque'];?></td>
                <td><?=$itens['minEstoque'];?></td>
                <td><a href="update.php?id=<?=$itens['id'];?>">Editar</a></td>
                <td><a href="delete.php?id=<?=$itens['id'];?>">Deletar</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
    
</body>
</html>