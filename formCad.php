<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $policial = new Policial($_POST['nome'],$_POST['email'],$_POST['senha']);
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
    <title>Adiciona Policial</title>
</head>
<body>
    <form action='formCad.php' method='POST'>
        Nome: <br><input name='nome' type='text' required>
        <br><br>
        Email: <br><input name='email' type='text' required>
        <br><br>
        Senha: <br><input name='senha' type='int' required>
        <br><br>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

