<?php
namespace classes;

use db\ActiveRecord;
use db\MySQL;
use enum;

class Usuario implements ActiveRecord
{
    private int $idUsuario;
    private int $idFuncao;
    private string $login;
    private string $senha;
    private string $telefone;
    
}