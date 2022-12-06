<?php 

require_once "../classes/Ticket.php";

if(isset($_POST['submit'])){
    $ticket = new Ticket($_POST['ticket']);
    $resultado = $ticket->consultar();
    if($resultado != false){

        header("location: emitirOrdem.php?nome={$resultado['nomeMeliante']}&status={$resultado['statusOrdem']}&andamento={$resultado['andamento']}");
        
    }else{
        echo "Ticket inválido";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Ordem de Prisão</title>
</head>
<body>
    <main>
        <form action ="validarTicketConsulta.php" method="post">
            <label for="ticket">Insira o Ticket para a Consulta</label>
            <input type="number" id="ticket" name="ticket" required>
            <input type="submit" value="Consultar Ordem" name="submit">
        </form>

        <?php 
        
        
        ?>
    </main>
</body>
</html>