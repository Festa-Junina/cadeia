<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/534/534102.png" type="image/png">
    <title>Login</title>
</head>
<body>
    <div class="login-page">
        <div class="login-page-util">
            <div class="login-form">
                <form action="login.php" method="post">
                    <h1>Login</h1>
                    <div class="login-form-camps">
                        <input type="text" name="login" id="login" placeholder="Insira o seu login" class="login-input">
                        <input type="password" name="password" id="password" placeholder="Insira a sua senha" class="login-input">
                    </div>
                    <div class="recover-password-area">

                        <a href="../../" class="recover-password-area">voltar</a>
                    </div>
                    <div class="form-submit-button">
                        <input type="submit" value="Enviar" name="button" id="button" class="submit-button">
                    </div>

                </form>
            </div>
        </div>
        <footer class="login-page-footer">
            <div class="footer-login-util-area">
                <h1 class="login-page-footer-text">Feito pelo 3º ano do curso Técnico em Informática de 2022.</h1>
            </div>
        </footer>
    </div>
</body>
</html>