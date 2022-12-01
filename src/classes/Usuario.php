<?php
namespace classes;

use db\ActiveRecord;
use db\MySQL;
use enum;

class Usuario implements  ActiveRecord
{
    private int $idUsuario;
    private int $idFuncao;
    private string $login;
    private string $senha;
    private string $telefone;

    public function __construct() {}

    public function constructorCreate(
        int $idUsuario,
        int $idFuncao,
        string $login,
        string $senha,
        string $telefone
    ): void
    {
        $this->setIdUsuario($idUsuario);
        $this->setIdFuncao($idFuncao);
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setTelefone($telefone);
    }

    public function constructLogin(string $login, string $senha): void
    {
        $this->setLogin($login);
        $this->setSenha($senha);
    }

    public function setIdUsuario(int $idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario(): int {
        return $this->idUsuario;
    }


    public function setLogin(string $login): void {
        $this->login = $login;
    }

    public function getLogin(): string {
        return $this->login;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }


    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function getSenha(): string {
        return $this->senha;
    }
    public function setIdFuncao(int $funcao): void {
        $this->idFuncao = $funcao;
    }

    public function getFuncao(): int {
        return $this->idFuncao;
    }


    public function save(): bool
    {
        $connection = new MySQL();

        $this->senha = password_hash($this->senha,PASSWORD_BCRYPT);

        if(isset($this->idUsuario)){
            $sql = "UPDATE usuario SET login = '{$this->login}', senha = '{$this->senha}', idUsuario = '{$this->idUsuario}', idFuncao = '{$this->idFuncao}', telefone = '{$this->telefone}'  WHERE idUsuario = {$this->idUsuario}";
        }else{
            $sql = "INSERT INTO usuario (idUsuario,idFuncao,login, senha, telefone) VALUES ('{$this->idUsuario}','{$this->idFuncao}','{$this->login}','{$this->senha}','{$this->telefone}')";
        }
        return $connection->execute($sql);
    }

    public function delete(): bool
    {
        $connection = new MySQL();
        $sql = "DELETE FROM usuario WHERE idUsuario = {$this->idUsuario}";


        return $connection->execute($sql);
    }

    public static function find($id): Usuario
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM usuario WHERE idUsuario = {$id}";
        $res = $connection->query($sql);
        $user = new Usuario();
        $user->constructorCreate(
            $res[0]['idUsuario'],
            $res[0]['idFuncao'],
            $res[0]['login'],
            $res[0]['senha'],
            $res[0]['telefone']
        );
        $user->setIdUsuario($res[0]['idUsuario']);

        return $user;
    }

    public static function findall(): array
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM user";
        $results = $connection->query($sql);
        $users = array();

        foreach($results as $result) {
            $user = new Usuario();
            $user->constructorCreate(
                $result[0]['idUsuario'],
                $result[0]['idFuncao'],
                $result[0]['login'],
                $result[0]['senha'],
                $result[0]['telefone']
            );
            $user->setIdUsuario($result[0]['idUsuario']);
            $users[] = $user;
        }

        return $users;
    }

    public function authenticate(): bool
    {
        $connection = new MySQL();
        $sql = "SELECT idUsuario, login, idFuncao, password FROM usuario WHERE login = '{$this->login}'";
        $results = $connection->query($sql);

        if (password_verify($this->senha, $results[0]["senha"])) {
            session_start();
            $_SESSION['idUsuario'] = $results[0]['idUsuario'];
            $_SESSION['login'] = $results[0]['login'];
            $_SESSION['senha'] = $results[0]['senha'];
            return true;
        } else {
            return false;
        }
    }
}