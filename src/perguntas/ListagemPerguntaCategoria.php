<?php
// session_start();
// if(!isset($_SESSION['idUsuario'])){
//     header("location:index.php");
// }
require_once __DIR__."/vendor/autoload.php";

$perguntas = Pergunta::findallByCategoria($_GET['idCategoria']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de perguntas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="ListagemPergunta.php">Perguntas</a>
                </div>
                <div class="user">
                    <p>Admin</p>
                </div>
            </div>
        
        <div class="main-content">
            <div class="row">
            <?php
            foreach($perguntas as $pergunta){
                echo"<div class='card'>
                    <a href='visualizarPergunta.php?id={$pergunta->getId()}'>
                        <h2>{$pergunta->getEnunciado()}</h2>
                        <p>{$pergunta->getalternativa1()}</p>
                        <p>{$pergunta->getalternativa2()}</p>
                        <p>{$pergunta->getalternativa3()}</p>
                        <h3>{$pergunta->getResposta()}</h3>
                        <a href='formEditPergunta.php?id={$pergunta->getId()}' class='teste'>Editar</a>
                        <a href='excluirPergunta.php?id={$pergunta->getId()}'>Excluir</a>
                    </a>
                </div>";
            }
            ?>
            </div>
            <div class="options">
                <a href='formCadPergunta.php'>Adicionar Pergunta</a> | 
                <a href='sair.php'>Sair</a>
            </div>
            
        </div>
    </div>
</body>
</html>






