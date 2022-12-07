<?php

// TODO: Develop the authentication of the login.
if (isset($_POST["button"])) {
    $user = new User();
    $user->constructLogin($_POST["email"], $_POST["password"]);
    
    if ($user->authenticate()) {
        header("location: ../home");
    } else {
        header("location: index.php");
    }
}