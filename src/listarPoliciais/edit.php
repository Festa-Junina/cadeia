<?php

require_once "../login/sessions/sessaoAdmin.php";

if (!isset($_GET["id"])) {
    header("location: ../listarPolicias");
}

if (isset($_POST["button"])) {
    var_dump($_POST);
    die();
}

use classes\Usuario;

$policia = Usuario::find($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../admin/styles.css">
    <link rel="stylesheet" href="../listarOrdensdePrisao/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <link rel="stylesheet" href="styles.css">
    <title>Policiais</title>
</head>

<body>
<div class="container">
    <div class="header">
        <div class="logo">
            Policiais
        </div>
        <div class="user">
            <p>Administrador</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="../login/logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <form method="post" action="edit.php">
            <label>
                <p>Nome</p>
                <input type="text" name="nome" value="<?php echo $policia->getNome() ?>">
            </label>

            <label>
                <p>Login</p>
                <input type="text" name="login" value="<?php echo $policia->getLogin() ?>">
            </label>

            <label>
                <p>Telefone</p>
                <input type="tel" name="telefone" value="<?php echo $policia->getTelefone() ?>">
            </label>

            <label>
                <p>Ativo</p>
                <select name="ativo">
                    <?php
                    if ($policia->getAtivo()) {
                        echo "<option selected value='1'>Sim</option>";
                        echo "<option value='0'>Não</option>";
                    } else {
                        echo "<option value='1'>Sim</option>";
                        echo "<option selected value='0'>Não</option>";
                    }
                    ?>
                </select>
            </label>

            <input type="submit" name="button" value="Salvar">
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script>
    $('.user').on("click", function () {
        $('.user-opt').toggleClass('displayed');
    });
</script>
</body>

</html>
