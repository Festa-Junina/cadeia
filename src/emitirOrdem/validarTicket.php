<?php

require_once "../../vendor/autoload.php";

use classes\Ticket;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="styleValidarTicket.css">
    <link rel="stylesheet" href="../assets/styles/globalStyles.css">
    <title>Insira seu Ticket</title>

    </head>
<body>
    <header class="header">
        <div class="container">
            <h1>Validar Ticket</h1>
        </div>
    </header>
    <main class="main container">
        <a href="../../index.php" class='links'>🡄 Voltar à tela inicial</a>
        <form action="validarTicket.php" method="post" class="form">
            <?php
            ini_set ( 'display_errors' , 1); error_reporting (E_ALL);

            if(isset($_POST['submit'])){
                $ticket = new Ticket($_POST['ticket']);
                if($ticket->autenticar()){
                    header("location: emitirOrdem.php");
                }else{
                    echo "<span class='mensagemErro'>Ticket invalido ou já utilizado</span>";
                }
            }
            ?>
            <label for="ticket">Insira seu Ticket</label>
            <input type="number" id="ticket" name="ticket" placeholder="XXXXXX" required>
            <input type="submit" value="Validar" name="submit" class="button">
            <img src="ticket.png" alt="ticket imagem" class="ticket-img">

        </form>
    </main>
</body>
</html>