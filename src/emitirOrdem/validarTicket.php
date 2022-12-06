<?php 


require_once "../classes/Ticket.php";

if(isset($_POST['submit'])){
    $ticket = new Ticket($_POST['ticket']);
    
    if($ticket->autenticar()){
        header("location: emitirOrdem.php");
    }else{
        echo "Ticket invalido ou já utilizado";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insira se Ticket</title>
</head>
<body>
    <main>
        <form action="validarTicket.php" method="post">
            <label for="ticket">Insira seu Ticket</label>
            <input type="number" id="ticket" name="ticket" required>
            <input type="submit" value="Validar Ticket" name="submit">
        </form>
    </main>
</body>
</html>