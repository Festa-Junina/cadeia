<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $u = new Policial($_POST['email'],$_POST['senha'],$_POST['funcao'],$_POST['status']);
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
    <title>Registrar policial</title>
</head>
<body>
    <p>Registrar policial</p>

    <label for='email'>E-mail:</label>
    <input type='email' name='email' id='email' required>

    <label for='senha'>Senha:</label>
    <input type='password' name='senha' id='senha' required>

    <select name="funcao" id="funcao">
        <option value="funcao">Policial</option>
    </select>

    <select name="status" id="status">
        <option value="status">Ativo</option>
    </select>

    <input  type='submit' name='botao' value='Cadastrar'>

    <a href='index.php'>voltar ao inicio </a>
</body>
</html>

