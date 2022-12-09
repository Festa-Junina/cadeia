<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/src/Policial.php";
    $u = new Policial($_POST['email'],$_POST['senha'],$_POST['telefone'],$_POST['nome'],$_POST['idFuncao'],$_POST['ativo']);
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
    <link rel="stylesheet" href="style.form.scss">
    <title>Registrar policial</title>
</head>

<body>
    <section>
        <div class="divTitulo">
            <h1 class="titulo">Registrar policial</h1><br>
        </div>
    </section>
    <section class="formulario"> 
        <div class="divform">
            <form class="formCad" action="formPolicial.php" method="POST">
                <label for='email'>E-mail:</label><br>
                <input type='email' name='email' id='email' required><br>
                <label for='senha'>Senha:</label><br>
                <input type='password' name='senha' id='senha' required><br>
                <label for='telefone'>Telefone:</label><br>
                <input type='text' name='telefone' id='telefone' required><br>
                <label for='nome'>Nome</label><br>
                <input type='text' name='nome' id='nome' required><br>
                <div class='selects'>
                    <select name="idFuncao" id="idFuncao">
                        <option value="0">Administrador</option>
                        <option value="1">Carcereiro</option>
                        <option value="2">Policial</option>
                    </select>
                    <select name="ativo" id="ativo">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

                <div class="botaoCad">
                    <button name='botao' value='Cadastrar'>Cadastrar</button>
                </div>
            </form>
            <a href='index.php'>voltar ao inicio</a>
        </div>
    </section>
</body>
</html>

