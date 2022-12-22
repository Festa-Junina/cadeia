<?php

require_once "../login/sessions/sessaoAdmin.php";

use classes\Usuario;

$carcereiros = Usuario::findallPorFuncao("Carcereiro");

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
    <link rel="stylesheet" href="../listarPoliciais/styles.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/534/534102.png" type="image/png">
    <title>Carcereiros</title>
</head>

<body>
<div class="container">
    <div class="header">
        <a href="../listarCarcereiros">
            <div class="logo">
                Carcereiros
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
            <a href='new.php'>Novo Carcereiro</a>
        </div>
        <div class="box-dados-carc">
        <?php
        foreach($carcereiros as $carcereiro){
            echo "
                <div class='box-all'>
                <div class='centro'>
                <div class='dados-carc'>
                <div class='ops-carc-edit'>
                    <a class='edit' href='edit.php?id={$carcereiro->getIdUsuario()}'>Editar<img src='icons/edit_ico.png'></a>
                </div>
                    <label class='labels'>Nome:</label>
                    <p>{$carcereiro->getNome()}</p>
                    
                    <label class='labels'>Email:</label>
                    <p class='email'>{$carcereiro->getLogin()}</p>
                    
                    <label class='labels'>Telefone:</label>
                    <p>{$carcereiro->getTelefone()}</p>
                    
                    <label class='labels'>Status:</label>";
                    if ($carcereiro->getAtivo() == 1){
                        echo "<div class='balls'><div class='ball-ativo'></div><p>Ativo</p></div>";
                    }else {
                        echo "<div class='balls'><div class='ball-inativo'></div><p>Inativo</p></div>";
                    }
                    echo "
                <div class='ops-carc'>
                    <a class='admit' href='admitirCarc.php?id={$carcereiro->getIdUsuario()}'><img src='icons/admit_ico.png'>Contratar</a>
                    <a class='demit' href='desativar.php?id={$carcereiro->getIdUsuario()}'><img src='icons/desativar_ico.png'>Demitir</a>
                    </div>
                </div>
                </div>
                </div>";
        }
        ?>
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
                if (count($carcereiros) > 0) {
                    foreach ($carcereiros as $carcereiro) {
                        echo "<tr>";
                        echo "<td>{$carcereiro->getNome()} </td>";
                        echo "<td>{$carcereiro->getLogin()}</td>";
                        echo "<td>{$carcereiro->getTelefone()}</td>";
                        if ($carcereiro->getAtivo()) {
                            echo "<td>Sim</td>";
                        } else {
                            echo "<td>Não</td>";
                        }
                        echo "<td class='opts'>".
                                "<a href='edit.php?id={$carcereiro->getIdUsuario()}'>editar</a> ".
                                "<a href='desativar.php?id={$carcereiro->getIdUsuario()}'>desativar</a> ".
                                "</td>";
                        echo "</tr>";
                    }
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
<style>@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
@import url("../globalStyles.css");
*{
    margin: 0px;
    padding: 0px;
}
html,body{
    font-family: 'Mulish';
}

/*INDEX/listarCarc----------*/
.title-carcereiro{
    padding: 0.5em 0em;
    margin: none;
    display: flex;
    background-color: #3CC47C;
    height: 4em;
    align-items: center;
    justify-content: left;
}
.title-carcereiro h1{
    color: white;
    margin-left: 2em;
    display: flex;
    text-align: center;
    justify-content: center;
}
.box-dados-carc{
    display: flex;
    flex-wrap: wrap;
    gap: 3rem;
    justify-content: center;
}
.box-all{
    align-items: center ;
    width: 285px;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: .8rem;
}
.dados-carc{
    display: flex;
    flex-direction: column;
    min-width: 280px;
    text-align: left;
    padding: 0em 0.5em 1em 0.5em;
}
.dados-carc p{
    margin-bottom: 2em;
}
.dados-carc a{
    justify-content: center;
}
.centro{
    color: var(--black);
    display: flex;
    justify-content: center;
    border: 2px solid var(--primaryVariant);
    background-color: var(--withe);
    border-radius: .6rem;
    margin-bottom: 0.5em;
    box-shadow: 8px 8px 8px var(--blackOpacity);
}
.labels{
    font-weight: bold;
    font-size: 1.1em;
}
.email{
    word-break: break-all;
}
.ops-carc{
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
.ops-carc a{
    display: flex;
    align-items: center;
    flex-direction: row;
    width: 40%;
    background-color: rgb(228, 228, 228);
    border: solid 1px rgb(199, 199, 199);
    color: black;
    padding: 5px;
    transition: 200ms;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    margin: 0em 0.5em;
}
.ops-carc-edit{
    margin-right: 1.2em;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: right;
}
.ops-carc-edit a{
    font-size: 1.1em;
    flex-direction: row;
    display: flex;
    text-decoration: none;
}
.ops-carc-edit a:hover{
    text-decoration: underline;
}
.ops-carc-edit img{
    margin-left: 0.1em;
    margin-top: 0.2em;
    width: 1em;
    height: 0.8em;
}
.edit{
    margin-top: 0.5em;
    width: 8%;
    color: black;
    transition: 200ms;
    border-radius: 5px;
}
.edit:hover{
    cursor: pointer;
    border-radius: 3px;
}
.admit:hover{
    border: solid 1px rgb(255, 255, 255);
    background-color: rgb(163, 224, 168);
}
.demit:hover{
    border: solid 1px rgb(255, 255, 255);
    background-color: rgb(224, 163, 163);
}
.linha{
    text-decoration: underline;
}
.links{
    display: flex;
    flex-direction: column;
}
.add{
    display: flex;
    justify-content: center;
    text-align: center;
    margin: 2em 0em;
}
.add a{
    border: solid 1px rgb(255, 255, 255);
    text-align: center;
    background-color: var(--green);
    color: #fafafafa;
    text-decoration: none;
    padding: 1em;
    border-radius: 5px;
}
.add a:hover{
    border: solid 1px var(--primaryVariant);
    box-shadow: var(--blackOpacity) 3px 3px 3px ;
}
.balls{
    display: flex;
    flex-direction: row;
    align-items: center;
    text-align: center;
    margin-bottom: 2em;
}
.balls p{
    margin: 0;
}
.ball-ativo{
    width: 1em;
    height: 1em;
    border-radius: 50%;
    background-color: rgb(2, 190, 27);
    margin-right: 0.3em;
}
.ball-inativo{
    width: 1em;
    height: 1em;
    border-radius: 50%;
    background-color: rgb(221, 0, 0);
    margin-right: 0.3em;
}

/*editCarc----------*/
.box-edit-carc{
    flex-direction: column;
    display: flex;
    width: 100%;
    justify-content: center;
}
.box-edit{
    flex-direction: column;
    display: flex;
    justify-content: center;
    align-items: center ;
    width: 100%;
}
.delete{
    display: flex;
    justify-content: right;
}
.delete a{
    flex-direction: row;
    display: flex;
    text-decoration: none;
    color: black;
}
.delete a:hover{
    text-decoration: underline;
}
.delete img{
    margin-left: 0.1em;
    margin-top: 0.2em;
    width: 1em;
    height: 1em;
}
.edit-carc{
    display: flex;
    flex-direction: column;
    min-width: 280px;
    text-align: left;
    padding: 1em 1em;
}
.edit-carc p{
    margin-bottom: 2em;
}
.edit-carc a{
    justify-content: center;
}
.centro-edit{
    display: flex;
    justify-content: center;
    border-radius: 5px;
    margin-bottom: 2em;
}
.centro-edit input{
    height: 2.5em;
    border-radius: 5px;
    border: gray 1px solid;
    margin-bottom: 2em;
    padding: 0px 5px;
    font-family: Open Sans;
    font-weight: bold;
}
input:focus{
    box-shadow: 0 0 0 0;
    outline: 0;
}
.botaoCad{
    align-items: center;
    display: flex;
    flex-direction: column;
    width: 100%;
}
.botaoCad button{
    width: 7em;
    align-items: center;
    justify-content: center;
    display: flex;
    background-color: rgb(228, 228, 228);
    border: solid 1px rgb(199, 199, 199);
    color: black;
    height: 2em;
    cursor: pointer;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    margin-bottom: 1em;
    font-family: Open Sans, sans-serif;
}
.botaoCad button:hover{
    background: #83bcce;
    border: solid 1px #638d97;
}
.botaoCad a{
    width: 7em;
    text-decoration: none;
    align-items: center;
    justify-content: center;
    display: flex;
    background-color: rgb(228, 228, 228);
    border: solid 1px rgb(199, 199, 199);
    color: black;
    height: 2em;
    cursor: pointer;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    font-family: Open Sans, sans-serif;
}
.botaoCad a:hover{
    background: #cf7979;
    border: solid 1px #965d5d;
}
.edit-carc select{
    height: 2.7em;
    border-radius: 5px;
    -webkit-appearance: none;
    padding: 0px 5px;
    font-family: Open Sans;
    font-weight: bold;
}

/*cadastrarCarc----------*/
.botaoCad input{
    width: 7em;
    align-items: center;
    justify-content: center;
    display: flex;
    background-color: rgb(228, 228, 228);
    border: solid 1px rgb(199, 199, 199);
    color: black;
    height: 2em;
    cursor: pointer;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    margin-bottom: 1em;
}
.botaoCad input:hover{
    background: #83bcce;
    border: solid 1px #638d97;
}
</style>
</body>

</html>
