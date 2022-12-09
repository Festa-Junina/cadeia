<?php
session_start();
require 'dbcon.php';

if(isset($_GET['idCategoria']))
{

    $query = "DELETE FROM categoria WHERE idCategoria = {$_GET['idCategoria']}";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "A categoria foi excluida com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Não foi possivel excluir a categoria";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['editarcategoria']))
{
    $nome = mysqli_real_escape_string($con, $_POST['categ_nome']);
    
    $query = "UPDATE categoria SET categ_nome = '{$nome}' WHERE idCategoria = {$_POST['idCategoria']}";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "A categoria foi atualizada com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "A categoria não foi atualizada";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['cadastrarcategoria']))
{
    $nome = mysqli_real_escape_string($con, $_POST['categ_nome']);
       
    $query = "INSERT INTO categoria (categ_nome) VALUES ('$nome')";
    
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['mensagem'] = "A categoria foi cadastrada com sucesso!";
        header("Location: cadastrar.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "A categoria não foi cadastrado.";
        header("Location: cadastrar.php");
        exit(0);
    }
}
?>