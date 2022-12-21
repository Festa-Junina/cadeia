<?php
    //session_start();
    //if(!isset($_SESSION['idUsuario'])){
    //    header("location:index.php");
    //}
    //require_once __DIR__."/vendor/autoload.php";

    //$contatos = Pessoa::findallByUsuario($_SESSION['idUsuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
            <div class="user">
                <p>Admin</p>
            </div>
    </div>

    <div class="main-content">
            <div class="row">
                <div class="card">
                    <a href="#">
                        <h2>Policiais</h2>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <h2>Carcereiros</h2>
                    </a>
                </div>
                <div class="card">
                    <a href="ListagemPergunta.php">
                        <h2>Perguntas</h2>
                    </a>
                </div>
                <div class="card">
                    <a href="#">
                        <h2>Categorias</h2>
                    </a>
                </div>
            </div>
<a href='sair.php'>Sair</a>
</body>
</html>

