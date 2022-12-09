<?php
if(isset($_GET['id'])){
    require_once __DIR__."/src/Policial.php";
    $policial = Policial::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/src/Policial.php";
    $policial = new Policial($_POST['login'],$_POST['telefone'],$_POST['nome'],$_POST['senha'],$_POST['idFuncao']);
    $policial->setIdUsuario($_POST['id']);
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
    <link rel="stylesheet" href="style.form.scss">
    <title>Edita policial</title>
</head>
<body>
    <section>   
        <div class="divTitulo">
            <h1 class="titulo">Editar policial</h1><br>
        </div>
    </section>
        <br>
    <section class="formulario"> 
        <div class="divform">
            <form class="formCad" action="formEdit.php" method="POST">
                <?php
                    echo "<label for='email'>E-mail:</label><br>";
                    echo "<input name='login' id='login' value='{$policial->getLogin()}' type='text' required>";
                    echo "<br>";
                    echo "<label for='telefone:</label><br>";
                    echo "<input name='telefone' id='telefone' value='{$policial->getTelefone()}' type='text' required>";
                    echo "<br>";
                    echo "<label for='nome'>Nome:</label><br>";
                    echo "<input name='nome' id='nome' value='{$policial->getNome()}' type='text' required>";
                    echo "<br>";
                    echo "<input name='id' value={$policial->getIdUsuario()} type='hidden'>";
                ?>
                <label for='senha'>Senha:</label><br>
                <input type='password' name='senha' id='senha' required><br>
                <div class='selects'>
                    <select name="idFuncao" id="idFuncao">
                        <option value="0">Administrador</option>
                        <option value="1">Carcereiro</option>
                        <option value="2">Policial</option>
                    </select>
                </div>
                <div class="botaoCad">
                    <button name='botao' value='Cadastrar'>Cadastrar</button>
                </div>
            </form>
            <a href='index.php'>voltar ao inicio </a>
        </div>
    </section>
    </form>
</body>
</html>

