<?php

require_once "../login/sessions/sessaoAdmin.php";

use classes\Usuario;

$policias = Usuario::findallPoliciais();

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
        <a href="../listarPoliciais">
            <div class="logo">
                Policiais
            </div>
        </a>
        <div class="user">
            <p>Administrador</p>
            <span class="material-symbols-outlined">
                    local_police
                </span>
            <div class="user-opt">
                <a href="../admin">Página Inicial</a>
                <a href="../login/logout.php">Sair</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class='new-button-area'>
            <a href='new.php'>Novo Policial</a>
        </div>
        <table>
            <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>Telefone</th>
                <th>Ativo</th>
                <th>Opções</th>
            </tr>
            <?php
            foreach ($policias as $policia) {
                echo "<tr>";
                echo "<td>{$policia->getNome()} </td>";
                echo "<td>{$policia->getLogin()}</td>";
                echo "<td>{$policia->getTelefone()}</td>";
                if ($policia->getAtivo()) {
                    echo "<td>Sim</td>";
                } else {
                    echo "<td>Não</td>";
                }
                echo "<td class='opts'>".
                        "<a href='edit.php?id={$policia->getIdUsuario()}'>editar</a> ".
                        "<a href='delete.php?id={$policia->getIdUsuario()}'>excluir</a> ".
                        "</td>";
                echo "</tr>";
            }
            ?>
        </table>
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
