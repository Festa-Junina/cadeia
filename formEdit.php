<?php
if(isset($_GET['id'])){
    require_once __DIR__."/src/Policial.php";
    $policial = Policial::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/src/Policial.php";
    $policial = new Policial($_POST['login'],$_POST['senha'],$_POST['status'],$_POST['funcao']);
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
                    echo "<input name='id' value={$policial->getIdUsuario()} type='hidden'>";
                ?>
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
    </form>
</body>
</html>

