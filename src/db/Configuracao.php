<?php

// Veja "../../banco/estruturaCadeiaBancoDeDados.sql";

define("HOST","localhost");
define("USUARIO","root"); // Definido como aluno pois será o usuário que irá acessar o MySQL.
define("SENHA","");
define("BANCO","cadeia-app");

// Em caso que no banco de desenvolvimento não esteja criado o usuário aluno, execute o seguinte script:
/*
-- Script SQL

-- Cria o usuário `aluno` com senha `aluno`
CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';

-- Garante os privilégios ao usuário criado
GRANT ALL PRIVILEGES ON cadeia-app.* TO 'aluno'@'localhost';

 */
