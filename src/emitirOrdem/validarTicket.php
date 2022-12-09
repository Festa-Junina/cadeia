

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
    <main class="main">
    <div class="containerMeio">


    <h1 class="insira">Insira seu <br> Ticket</h1>
    <div class="meio">
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

            <input type="number" id="ticket" name="ticket" required>
            <input type="submit" value="Validar Ticket" name="submit" class="button">
        </form>
    </div>

</div>
    </main>
</body>
</html>