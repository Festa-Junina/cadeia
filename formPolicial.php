<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $u = new Policial($_POST['email'],$_POST['senha']);
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
    <title>Register User</title>
</head>
<body>
    <p>Registrar policial</p>

    <label for='email'>E-mail:</label>
    <input type='email' name='email' id='email' required>

    <label for='senha'>Password:</label>
    <input type='password' name='senha' id='senha' required>

    <input class="botao-login" type='submit' name='botao' value='Cadastrar'>

    <a class="link-cadastro" href='index.php'>voltar ao inicio </a>
</body>
</html>

