<?php 

require_once "../classes/Ticket.php";


if(isset($_POST['submit'])){
    $ticket = new Ticket($_POST['ticket']);
    $resultado = $ticket->findOrdem();    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Visualizar Ordem de Prisão</title>
</head>
<body>
    <main>
        <form action ="visuOrdem.php" method="post">
            <label for="ticket">Insira o Ticket para a Consulta</label>
            <input type="number" id="ticket" name="ticket" required>
            <input type="submit" value="Consultar Ordem" name="submit">
        </form>

        <?php 

        if(isset($resultado)){
            if($resultado != false){

                echo "
                    <div class='statusOrdem'>
                        <span>Nome Meliante: {$resultado['nomeMeliante']}</span>
                        <span>Status Ordem: {$resultado['statusOrdem']}</span>
                        <span>Status Prisão: {$resultado['statusprisao']}</span>
                    </div>        
                ";
    
            }else{
                echo "Ticket inválido";
            }
        }
        ?>
    </main>
</body>
</html>