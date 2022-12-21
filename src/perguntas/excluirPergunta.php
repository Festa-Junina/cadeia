<?php
session_start();
// if(!isset($_SESSION['idUsuario'])){
//     header("location:index.php");
// }
require_once __DIR__."/vendor/autoload.php";
$Pergunta = Pergunta::find($_GET['id']);
$Pergunta->delete();
header("location:ListagemPergunta.php");