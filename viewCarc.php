<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Carcereiro</title>
</head>
<body>

    <main>
        <div class='container'>
            <?php
                echo "

                <div>
                    <div class='div-nome-carc'>
                        <h2>{$carc->getnome()}</h1>
                    </div>
                    <div class='div-id-carc'>
                        <h4>{$carc->getidFuncao()}</h4>
                    </div>
                    <div class='div-email-carc'>
                        <h3>{$carc->getlogin()}</h3>
                    </div>
                    <div class='div-tel-carc'>
                        <h3>{$carc->gettelefone()}</h3>
                    </div>
                    <a href='editCarc.php'>Editar</a>
                </div>
                ";
                ?>
        </div>
    </main>

</body>
</html>