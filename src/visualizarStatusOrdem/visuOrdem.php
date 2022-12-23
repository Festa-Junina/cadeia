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
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../../globalStyles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>Visualizar Ordem de Prisão</title>

</head>
<body>
    <header class="header">
        <div class="container">
            <h1>Visualizar Ordem de Prisão</h1>
        </div>
    </header>
    <main class="main container">
        <a href="../../index.php" class='links'>🡄 Voltar à tela inicial</a>
        <form action ="visuOrdem.php" method="post" class="form">
            <label for="ticket">Insira o Ticket para a Consulta</label>
            <input type="number" id="ticket" name="ticket" placeholder="XXXXXX" required>
            <input type="submit" value="Consultar" name="submit" class="button">
        </form>

        <?php 
        if(isset($resultado)){
            if($resultado != false){
                echo "
                    <div class='statusOrdem'>
                        <h2>Nome Meliante</h2>
                        <span>{$resultado['nomeMeliante']}</span>
                        <h2>Status Ordem</h2>
                        <div class='flex_row'>";

                        if($resultado['statusordem'] == "Preso"){
                            echo "<div class='ball' id='ball2'></div>";
                       }else if($resultado['statusordem'] == "Perseguição") {
                            echo "<div class='ball' id='ball1'></div>";
                       }else{
                            echo "<div class='ball' id='ball3'></div>";
                        }

                        echo "<span>{$resultado['statusordem']}</span>
                        </div>";

                        if($resultado['statusprisao'] != "Ainda não foi preso"){
                           echo "<h2>Status Prisão</h2>";
                            echo "<span>{$resultado['statusprisao']}</span>
                            <h2>Tempo Prisão</h2> 
                            <span>{$resultado['tempoPreso']}</span>";
                        }
                echo "</div>";
    
            }else{
                echo "<span class='mensagemErro'>Ticket inválido</span>";
            }
        }
        ?>
    </main>
</body>
</html>