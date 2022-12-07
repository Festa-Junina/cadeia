<?php
require_once __DIR__."/ActiveRecord.php";
require_once __DIR__."/MySQL.php";

class Policial implements ActiveRecord{

    private int $idUsuario;
    
    public function __construct(
        private string $login,
        private string $senha,
        private string $funcao,
        private string $status
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

    public function setFuncao(string $funcao):void{
        $this->funcao = $funcao;
    }

    public function getFuncao():string{
        return $this->funcao;
    }

    public function setStatus(string $status):void{
        $this->status = $status;
    }

    public function getStatus():string{
        return $this->status;
    }

    public function save():bool{
        $conexao = new MySQL();
        $this->senha = password_hash($this->senha,PASSWORD_BCRYPT); 
        if(isset($this->idUsuario)){
            $sql = "UPDATE policial SET login = '{$this->login}', senha = '{$this->senha}', funcao = '{$this->funcao}', status = '{$this->status}' WHERE idUsuario = {$this->idUsuario}";
        }else{
            $sql = "INSERT INTO policial (login,senha,funcao,status) VALUES ('{$this->login}','{$this->senha}','{$this->funcao}','{$this->status}')";
        }
        return $conexao->executa($sql);
    }

    public static function find($idUsuario):Policial{
        $conexao = new MySQL();
        $sql = "SELECT * FROM policial WHERE idUsuario = {$idUsuario}";
        $resultado = $conexao->consulta($sql);
        $u = new Policial($resultado[0]['login'],$resultado[0]['senha'],$resultado[0]['funcao'],$resultado[0]['status']);
        $u->setIdUsuario($resultado[0]['idUsuario']);
        return $u;
    }

    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM policial WHERE idUsuario = {$this->idUsuario}";
        return $conexao->executa($sql);
    }

    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM policial";
        $resultados = $conexao->consulta($sql);
        $policial = array();
        foreach($resultados as $resultado){
            $u = new Policial($resultado['login'],$resultado['senha'],$resultado['funcao'],$resultado['status']);
            $u->setIdUsuario($resultado['idUsuario']);
            $policial[] = $u;
        }
        return $policial;
    }

    public function authenticate():bool{
        $conexao = new MySQL();
        $sql = "SELECT idUsuario, senha FROM policial WHERE login = '{$this->login}'";
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
