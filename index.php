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

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Carcereiro.php";
$carcereiros = Carcereiro::findall();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Home Carcereiro</title>
</head>

<body>
    <article>
        <div>
            <a class="link-cadastro" href='cadastrarCarc.php'>Registrar Carcereiro</a>
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
                foreach($carcereiros as $carcereiro){
                    echo "<tr>";
                    echo "<td>{$carcereiro->getLogin()}</td>";
                    echo "<td>{$carcereiro->getTelefone()}</td>";
                    echo "<td>{$carcereiro->getNome()}</td>";
                    echo "<td>
                            <a href='formEdit.php?id={$carcereiro->getIdUsuario()}'>Editar</a>
                            <a href='excluir.php?id={$carcereiro->getIdUsuario()}'>Excluir</a> 
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
    </article>
</body>
</html>
?>