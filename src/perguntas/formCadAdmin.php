<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $u = new Admin($_POST['senha'],$_POST['nome']);
    $u->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Admin</title>
</head>
<body>
    <form action='formCadAdmin.php' method='post'>
        <label for='Nome'>E-mail:</label>
        <input type='Nome' name='nome' id='nome' required>
        <label for='senha'>Senha:</label>
        <input type='password' name='senha' id=senha' required>
        <input type='submit' name='botao' value='Cadastrar'>
    </form>
</body>
</html>

