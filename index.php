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
    <link rel="stylesheet" href="css/style_carcereiro.css">
    <title>Listar Carcereiros</title>
</head>
<body>
<div class="container-carcereiro">
    <div class="title-carcereiro">
            <h1>Listagem dos Carcereiros</h1>
    </div>
    <div class="links" >
        <div class="add">
            <a href="cadastrarCarc.php">+ Cadastrar Carcereiro</a>
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
                    
                    <label class='labels'>Situação:</label>";
                    if ($carcereiro->getAtivo() == 1){
                        echo "<div class='balls'><div class='ball-ativo'></div><p>Ativo</p></div>";
                    }else {
                        echo "<div class='balls'><div class='ball-inativo'></div><p>Inativo</p></div>";
                    }
                    echo "
                <div class='ops-carc'>
                    <a class='edit' href='editCarc.php?id={$carcereiro->getIdUsuario()}'><img src='icons/edit_ico.png'>Editar</a>
                    <a class='demit' href='excluirCarc.php?id={$carcereiro->getIdUsuario()}'><img src='icons/desativar_ico.png'>Demitir</a>
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