<?php
require_once __DIR__."/ActiveRecord.php";
require_once __DIR__."/MySQL.php";

class Policial implements ActiveRecord{

    private int $idUsuario;
    
    public function __construct(
        private string $login,
        private string $senha,
        private string $telefone,
        private string $nome,
        private int $idFuncao,
        private bool $ativo
        ){
    }

    public function setIdUsuario(int $idUsuario):void{
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario():int{
        return $this->idUsuario;
    }

    public function setLogin(string $login):void{
        $this->login = $login;
    }

    public function getLogin():string{
        return $this->login;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function setTelefone(string $telefone):void{
        $this->telefone = $telefone;
    }

    public function getTelefone():string{
        return $this->telefone;
    }

    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setIdFuncao(int $idFuncao):void{
        $this->idFuncao = $idFuncao;
    }

    public function getIdFuncao():int{
        return $this->idFuncao;
    }

    public function setAtivo():void{
        $this->ativo = $ativo;
    }

    public function getAtivo():bool{
        return $this->ativo;
    }

    public function save():bool{
        $conexao = new MySQL();
        $this->senha = password_hash($this->senha,PASSWORD_BCRYPT); 
        if(isset($this->idUsuario)){
            $sql = "UPDATE usuario SET login = '{$this->login}', senha = '{$this->senha}', telefone = '{$this->telefone}', nome = '{$this->nome}', idFuncao = '{$this->idFuncao}', ativo = '{$this->ativo}' WHERE idUsuario = {$this->idUsuario}";
        }else{
            $sql = "INSERT INTO usuario (login,senha,telefone,nome,idFuncao,ativo) VALUES ('{$this->login}','{$this->senha}','{$this->telefone}', '{$this->nome}', '{$this->idFuncao}', '{$this->ativo}')";
        }
        return $conexao->executa($sql);
    }

    public static function find($idUsuario):Policial{
        $conexao = new MySQL();
        $sql = "SELECT * FROM usuario WHERE idUsuario = {$idUsuario}";
        $resultado = $conexao->consulta($sql);
        $u = new Policial($resultado[0]['login'],$resultado[0]['senha'],$resultado[0]['telefone'],$resultado[0]['nome'],$resultado[0]['idFuncao'],$resultado[0]['ativo']);
        $u->setIdUsuario($resultado[0]['idUsuario']);
        return $u;
    }

    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM usuario WHERE idUsuario = {$this->idUsuario}";
        return $conexao->executa($sql);
    }

    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM usuario";
        $resultados = $conexao->consulta($sql);
        $policial = array();
        foreach($resultados as $resultado){
            $u = new Policial($resultado['login'],$resultado['senha'],$resultado['telefone'],$resultado['nome'],$resultado['idFuncao'],$resultado['ativo']);
            $u->setIdUsuario($resultado['idUsuario']);
            $policial[] = $u;
        }
        return $policial;
    }

    public function authenticate():bool{
        $conexao = new MySQL();
        $sql = "SELECT idUsuario, senha FROM usuario WHERE login = '{$this->login}'";
        $resultados = $conexao->consulta($sql);
        if(password_verify($this->senha,$resultados[0]['senha'])){
            session_start();
            $_SESSION['idUsuario'] = $resultados[0]['idUsuario'];
            $_SESSION['senha'] = $resultados[0]['senha'];
            $_SESSION['login'] = $resultados[0]['login'];
            return true;
        }else{
            return false;
        }
    }
}
