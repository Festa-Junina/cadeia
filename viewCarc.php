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
                        <h2>{$carc->getnomeCarc()}</h1>
                    </div>
                    <div class='div-id-carc'>
                        <h4>{$carc->getcodCarc()}</h4>
                    </div>
                    <div class='div-email-carc'>
                        <h3>{$carc->getemailCarc()}</h3>
                    </div>
                    <div class='div-tel-carc'>
                        <h3>{$carc->gettelCarc()}</h3>
                    </div>
                </div>
                ";
                ?>
        </div>
    </main>
    
</body>
</html>