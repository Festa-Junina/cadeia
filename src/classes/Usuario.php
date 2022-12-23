<?php
namespace classes;

use db\ActiveRecord;
use db\MySQL;

class Usuario implements  ActiveRecord
{
    private int $idUsuario;
    private int $idFuncao;
    private string $login;
    private string $senha;
    private string $nome;
    private string $telefone;
    private bool $ativo;

    public function __construct() {}

    public function constructorCreate(
        int $idFuncao,
        string $login,
        string $senha,
        string $nome,
        string $telefone,
        bool $ativo
    ): void
    {
        $this->setIdFuncao($idFuncao);
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setTelefone($telefone);
        $this->setNome($nome);
        $this->setAtivo($ativo);
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

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setAtivo(bool $ativo): void {
        $this->ativo = $ativo;
    }

    public function getAtivo(): bool {
        return $this->ativo;
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

    public function getTelefone(): string
    {
        return $this->telefone;
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
        $senha = password_hash($this->senha, PASSWORD_BCRYPT);
        $ativo = intval($this->ativo);

        if (isset($this->idUsuario)) {
            // Update
            $sql = "UPDATE `usuario` SET `login`='{$this->login}',`senha`='{$senha}',`nome`='{$this->nome}',`telefone`='{$this->telefone}',`ativo`={$ativo} WHERE `idUsuario` = {$this->idUsuario}";
        } else {
            // Create
            $sql = "INSERT INTO usuario (idFuncao,login,senha,nome,telefone,ativo) VALUES ({$this->idFuncao},'{$this->login}','{$senha}','{$this->nome}','{$this->telefone}',{$ativo})";
        }
        
        return $connection->executa($sql);
    }

    public function delete(): bool
    {
        $connection = new MySQL();
        $sql = "DELETE FROM usuario WHERE idUsuario = {$this->idUsuario}";
        
        return $connection->executa($sql);
    }

    public static function find($id): Usuario
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM usuario WHERE idUsuario = {$id}";
        $res = $connection->consulta($sql);
        $user = new Usuario();
        $user->constructorCreate(
            $res[0]['idFuncao'],
            $res[0]['login'],
            $res[0]['senha'],
            $res[0]['nome'],
            $res[0]['telefone'],
            $res[0]['ativo']
        );
        $user->setIdUsuario($res[0]['idUsuario']);

        return $user;
    }

    public static function findall(): array
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM usuario";
        $results = $connection->consulta($sql);
        $users = array();

        foreach($results as $result) {
            $user = new Usuario();
            $user->constructorCreate(
                $result['idFuncao'],
                $result['login'],
                $result['senha'],
                $result['nome'],
                $result['telefone'],
                $result['ativo']

            );
            $user->setIdUsuario($result['idUsuario']);
            $users[] = $user;
        }

        return $users;
    }

    public static function findallPorFuncao(string $funcao): array
    {
        $connection = new MySQL();
        $sql = "SELECT * FROM usuario WHERE idFuncao = (SELECT idFuncao FROM funcao F WHERE F.nome = '$funcao')";
        $results = $connection->consulta($sql);
        $users = array();

        foreach($results as $result) {
            $user = new Usuario();
            $user->constructorCreate(
                    $result['idFuncao'],
                    $result['login'],
                    $result['senha'],
                    $result['nome'],
                    $result['telefone'],
                    $result['ativo']

            );
            $user->setIdUsuario($result['idUsuario']);
            $users[] = $user;
        }

        return $users;
    }

    public static function findIdFuncaoPeloNomeDaFuncao(string $nomeFuncao): int
    {
        $connection = new MySQL();
        $sql = "select f.idFuncao as idFuncao from funcao f where f.nome = '{$nomeFuncao}';";
        $res = $connection->consulta($sql);
        return $res[0]["idFuncao"];
    }

    public function authenticate(): bool
    {
        $connection = new MySQL();
        $sql = "SELECT idUsuario, login, idFuncao, senha, nome, ativo FROM usuario WHERE login = '{$this->login}'";
        $results = $connection->consulta($sql);

        if (!$results[0]["ativo"]) {
            return false;
        }

        $funcao_sql = "SELECT nome FROM funcao WHERE idFuncao = {$results[0]["idFuncao"]}";
        $funcao_nome = $connection->consulta($funcao_sql);

        if (password_verify($this->senha, $results[0]["senha"])) {
            session_start();
            $_SESSION['idUsuario'] = $results[0]['idUsuario'];
            $_SESSION['login'] = $results[0]['login'];
            $_SESSION['senha'] = $results[0]['senha'];
            $_SESSION['funcao'] = $funcao_nome[0]["nome"];
            $_SESSION['nome'] = $results[0]["nome"];
            return true;
        } else {
            return false;
        }
    }

    public static function existeLogin($login): bool
    {
        $conexao = new MySQL();
        $sql = "select count(1) as qtde from usuario where login = '{$login}'";
        $resultados = $conexao->consulta($sql);
        
        if ($resultados[0]["qtde"]) {
            return true;
        } 

        return false;
    }

}