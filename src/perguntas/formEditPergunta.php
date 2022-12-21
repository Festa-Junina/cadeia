<?php
// session_start();
// if(!isset($_SESSION['idAdmin'])){
//     header("location:index.php");
// }
if(isset($_GET['id'])){
    require_once __DIR__."/vendor/autoload.php";
    $pergunta = Pergunta::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $pergunta = new pergunta($_POST['enunciado'],$_POST['alternativa1'],$_POST['alternativa2'],$_POST['alternativa3'],$_POST['resposta'],$_POST['categoria']);
    $pergunta->setId($_POST['id']);
    $pergunta->save();
    header("location: ListagemPergunta.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="editPergunta.css">
    <title>Editar Pergunta</title>
</head>
<body>
    <form action='formEditpergunta.php' method='POST'>
        <?php
            echo "<div class='form-group'><label for='enunciado'>Enunciado: </label><input name='enunciado' value='{$pergunta->getenunciado()}' type='text' required></div>";
        ?>
        <br>
        <?php
            echo "<div class='form-group'><label for='alternativa1'>Alternativa 1: </label> <input name='alternativa1' value='{$pergunta->getalternativa1()}' type='text' required></div>";
        ?>
        <br>
        <?php
            echo "<div class='form-group'><label for='alternativa2'>Alternativa 2: </label> <input name='alternativa2' value='{$pergunta->getalternativa2()}' type='text' required></div>";
        ?>
        <br>
        <?php
            echo "<div class='form-group'><label for='alternativa3'>Alternativa 3: </label> <input name='alternativa3' value='{$pergunta->getalternativa3()}' type='text' required></div>";
        ?>
        <br>
        <?php
            echo "<div class='form-group'><label for='resposta'>Resposta: </label> <input name='resposta' value='{$pergunta->getresposta()}' type='text' required></div>";
        ?>
        <br>
        <?php
            echo "<div class='form-group'><label for='categoria'>Categoria: </label> <input name='categoria' value='{$pergunta->getcategoria()}' type='text' required></div>";
       
        echo "<input name='id' value={$pergunta->getId()} type='hidden'>";
        ?>
        <br>
        <div class="submit">
            <input type='submit' name='botao' value="Salvar">
        </div>
    </form>
    <a href='sair.php'>Sair</a>
</body>
</html