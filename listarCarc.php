<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Carcereiro.php";
$carcereiros = Carcereiro::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Listar Carcereiros</title>
</head>
<body>
<div class="container-carcereiro">
    <div class="title-carcereiro">
        <hr>
            <h1>Listagem dos Carcereiros</h1>
        <hr>
    </div>

    <div class="links" >
        <div class="add">
            <a href="cadastrarCarc.php">Cadastrar Carcereiro</a>
        </div>
    </div>
    <div class="box-dados-carc">
        <?php
        foreach($carcereiros as $carcereiro){
            echo "
                <div class='box-all'>
                <div class='centro'>
                <div class='dados-carc'>
                    <label class='labels'>Nome:</label>
                    <p>{$carcereiro->getNome()}</p>
                    
                    <label class='labels'>Email:</label>
                    <p class='email'>{$carcereiro->getLogin()}</p>
                    
                    <label class='labels'>Telefone:</label>
                    <p>{$carcereiro->getTelefone()}</p>
                
                <div class='ops-carc'>
                    <a href='editCarc.php?id={$carcereiro->getIdUsuario()}'>Editar</a>
                    <a href='excluirCarc.php?id={$carcereiro->getIdUsuario()}'>Excluir</a>
                    </div>
                </div>
                </div>
                </div>";
        }
        ?>
    </div>
</div>
</body>
</html>