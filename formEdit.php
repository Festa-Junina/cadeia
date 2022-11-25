<?php
if(isset($_GET['id_policial'])){
    require_once __DIR__."/vendor/autoload.php";
    $policial = Policial::find($_GET['id_policial']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $policial = new Policial($_POST['nome'],$_POST['email'],$_POST['senha']);
    $policial->setIdPolicial($_POST['id_policial']);
    $policial->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Policial</title>
</head>
<body>
    <form action='formEdit.php' method='POST'>
        <?php
            echo "Nome: <input name='nome' value='{$policial->getNome()}' type='text' required>";
            echo "<br>";
            echo "Email: <input name='email' value='{$policial->getEmail()}' type='text' required>";
            echo "<br>";
            echo "Senha: <input name='senha' value='{$policial->getSenha()}' type='text' required>";
            echo "<br>";
            echo "<input name='id' value={$policial->getIdPolicial()} type='hidden'>";
        ?>
        <br>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

