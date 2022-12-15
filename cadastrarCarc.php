<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/src/Carcereiro.php";
    $carcereiro = new Carcereiro(1,$_POST['login'],$_POST['senha'],$_POST['nome'],$_POST['telefone'],$_POST['ativo']);
    $carcereiro->save();
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="css/style_carcereiro.css">
    <title>Cadastrar Carcereiro</title>
</head>
<body>
<div class="container">
    <div class="title-carcereiro">
            <h1>Cadastrar Carcereiro</h1>
    </div>
    <div class="box-cad-carc">
        <div class="div-form">
            <form action="cadastrarCarc.php" method="POST">
            <div class='box-edit'>
                    <div class='centro-edit'>
                    <div class='edit-carc'>
                        Nome: <input name='nome' type="text" required>
                        Email: <input name='login' type='email' required>
                        Senha: <input name='senha' type="password" required>
                        Telefone: <input name='telefone' type="int" required>
                        Ativo: <input name='ativo' type="int" required>
                    <div class="botaoCad">
                        <input type='submit' value="Cadastrar" name='botao'>
                        <a href='index.php'>Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>    
</body>
</html>