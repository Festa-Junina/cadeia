<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $carc = new Carcereiro($_POST['email']);
    $carc->setSenhaCarc($_POST['senhaCarc']);
    if($carc->authenticate()){
        header("location: listarCarc.php");
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
    <title>Carcereiro</title>
</head>
<body>
    <div class="formulario">
        <form action="index.php" method='post'>
                <label for='email'>E-mail:</label>
                <br>
                <input type='email' name='email' id='email' required>
                <br>
                <label for='senha'>Senha:</label>
                <br>
                <input type='password' name='senha' id='senha' required>
                <br>
                <input type='submit' name='botao' value='Entrar'>
                <br>
            </form>
            <div class="botao">
                <a href="CadastrarCarc.php">Cadastrar</a>
            </div>

            <div class="botao">
                <a href="editCarc.php">Editar CARC teste</a>
            </div> 
</body>
</html>




Skip to content
Search or jump to…
Pull requests
Issues
Codespaces
Marketplace
Explore
 
@NicolasIFRS 
Festa-Junina
/
cadeia
Public
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
cadeia/index.php /
@CaueMayolo
CaueMayolo Refatoração segundo o banco de dados
Latest commit ffe26d1 in 5 hours
 History
 1 contributor
50 lines (48 sloc)  1.65 KB

<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Policial.php";
$policiais = Policial::findall();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>main policial</title>
</head>

<body>
    <article>
        <div>
            <a class="link-cadastro" href='formPolicial.php'>Registrar policial</a>
        </div>
    </article>
    <article>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($policiais as $policial){
                    echo "<tr>";
                    echo "<td>{$policial->getLogin()}</td>";
                    echo "<td>{$policial->getTelefone()}</td>";
                    echo "<td>{$policial->getNome()}</td>";
                    echo "<td>
                            <a href='formEdit.php?id={$policial->getIdUsuario()}'>Editar</a>
                            <a href='excluir.php?id={$policial->getIdUsuario()}'>Excluir</a> 
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
    </article>
</body>
</html>
Footer
© 2022 GitHub, Inc.
Footer navigation
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
cadeia/index.php at omega_crud-policial · Festa-Junina/cadeia