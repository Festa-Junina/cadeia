<?php
if(isset($_POST['submit'])){
    require_once __DIR__."/vendor/autoload.php";
    $carc = new Carcereiro($_POST['codCarc'],$_POST['nomeCarc'],$_POST['emailCarc'],$_POST['telCarc']);
    $carc->save();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Carcereiro</title>
</head>
<body>
<form action='formCad.php' method='POST'>
        Código do Carcereiro: <input name='codCarc' type='int' required>
        <br>
        Nome do Carcereiro: <input name='nomeCarc' type='String' required>
        <br>
        E-mail do Carcereiro: <input name='emailCarc' type='email' required>
        <br>
        Telefone do Carcereiro: <input name='telCarc' type='int' required>
        <input type="submit" value="Registrar Carcereiro" name='submit'>
</body>
</html>