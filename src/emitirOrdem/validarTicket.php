

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="styleValidarTicket.css">
    <link rel="stylesheet" href="../../globalStyles.css">
    <title>Insira seu Ticket</title>

</head>
<body class="container">
    <header class="header">
        <!-- ALGO -->
    </header>
    <main class="main">
        <form action="validarTicket.php" method="post" class="form">

            <?php 
            require_once "../classes/Ticket.php";

            if(isset($_POST['submit'])){
                $ticket = new Ticket($_POST['ticket']);

                if($ticket->autenticar()){
                    header("location: emitirOrdem.php");
                }else{
                    echo "<span class='mensagemErro'>Ticket invalido ou já utilizado</span>";
                }
            }
            ?>

            <label for="ticket" class="insira">Insira seu Ticket</label>
            <input type="number" id="ticket" name="ticket" required>
            <input type="submit" value="Validar Ticket" name="submit" class="button">
        </form>
    </main>
</body>
</html>