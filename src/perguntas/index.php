<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $u = new Admin($_POST['nome'],$_POST['senha']);
    if($u->authenticate()){
        header("location: restrita.php");
    }else{
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuário</title>
</head>
<body>
    <form action='index.php' method='post'>
        <label for='nome'>Nome:</label>
        <input type='text' name='nome' id='nome' required>
        <label for='senha'>Senha:</label>
        <input type='password' name='senha' id=senha' required>
        <input type='submit' name='botao' value='Acessar'>
    </form>
    <a href='formCadAdmin.php'>Cadastrar Admin</a>
</body>
</html>