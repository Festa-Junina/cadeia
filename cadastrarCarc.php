<?php
require_once __DIR__."/vendor/autoload.php";
if(isset($_POST['submit'])){
    

    $carc = new Carcereiro($_POST['email']);
    $carc->setnomeCarc($_POST['name']);
    $carc->settelCarc($_POST['int']);
    $carc = new Carcereiro();
    $carc->setnomeCarc($_POST['name']);
    $carc->setemailCarc($_POST['email']);
    $carc->settelCarc($_POST['varchar']);
    $carc->setcodCarc($_POST['int']);
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
-------------------------------------------------------------------------------------------------------------
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="style.form.scss">
    <title>Registrar carcereiro</title>
</head>

<body>
    <section>
        <div class="divTitulo">
            <h1 class="titulo">Registrar carcereiro</h1><br>
        </div>
    </section>
    <section class="formulario"> 
        <div class="divform">
            <form class="formCad" action="formPolicial.php" method="POST">
                <label for='email'>E-mail:</label><br>
                <input type='email' name='email' id='email' required><br>
                <label for='senha'>Senha:</label><br>
                <input type='password' name='senha' id='senha' required><br>
                <div class="selects">
                    <label for="funcao">Função:</label><br>
                    <select name="funcao" id="funcao">
                        <option value="Policial">Policial</option>
                    </select><br>
                    <label for="status">Status:</label><br>
                    <select name="status" id="status">
                        <option value="Ativo">Ativo</option>
                    </select><br>
                </div>
                <div class="botaoCad">
                    <button name='botao' value='Cadastrar'>Cadastrar</button>
                </div>
            </form>
            <a href='index.php'>voltar ao inicio </a>
        </div>
    </section>
</body>
</html>

