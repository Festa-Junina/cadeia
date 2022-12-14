<?php
require_once __DIR__."/ActiveRecord.php";
require_once __DIR__."/MySQL.php";

class Carcereiro implements ActiveRecord{

    private int $idUsuario;
    private int $idFuncao;
    private string $login;
    private string $senha;
    private string $nome;
    private  $telefone;
    private string $ativo;


    public function __construct(private string $email){
    }

    public function setIdUsuario(int $idUsuario):void{
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario():int{
        return $this->idUsuario;
    }


    public function setIdFuncao(int $idFuncao):void{
        $this->idFuncao = $idFuncao;
    }

    public function getIdFuncao():int{
        return $this->idFuncao;
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


    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function getNome():string{
        return $this->nome;
    }


    public function setTelefone($telefone):void{
        $this->telefone = $telefone;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }


    public function setAtivo(int $ativo):void{
        $this->ativo = $ativo;
    }
    
    public function getAtivo():int{
        return $this->ativo;
    }

    public function save():bool{
        $conexao = new MySQL();
        
        if(isset($this->id)){
            $sql = "UPDATE usuario SET usuario.login = '{$this->login}', senha = '{$this->senha}', nome = '{$this->nome}', telefone = '{$this->telefone}', ativo = '{$this->ativo}' WHERE idUsuario = {$this->idUsuario}";
        }else{
            $sql = "INSERT INTO usuario (idFuncao, login, senha, nome, telefone, ativo) VALUES (1,'{$this->login}', '{$this->senha}', '{$this->nome}', '{$this->telefone}', '{$this->telefone}', '{$this->ativo}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM usuario WHERE idUsuario = {$this->idUsuario}";
        return $conexao->executa($sql);
    }

    public static function find($idUsuario):Carcereiro{
        $conexao = new MySQL();
        $sql = "SELECT * FROM usuario WHERE idUsuario = {$idUsuario}";
        $resultado = $conexao->consulta($sql);
        $p = new Carcereiro($resultado[0]['login'],$resultado[0]['senha'],$resultado[0]['telefone'],$resultado[0]['nome'],$resultado[0]['ativo']);
        $p->setIdUsuario($resultado[0]['idUsuario']);
        return $p;
    }
    


    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM usuario where idFuncao=1";
        $resultados = $conexao->consulta($sql);
        $carcereiro = array();
        foreach($resultados as $resultado){
            $p = new Carcereiro($resultado['login'],$resultado['senha'],$resultado['telefone'],$resultado['nome'],$resultado['ativo']);
            $p->setIdUsuario($resultado['idUsuario']);
            $carcereiro[] = $p;
        }
        return $carcereiro;
    }


    public function authenticate():bool{
        $conexao = new MySQL();
        $sql = "SELECT login, senha FROM usuario WHERE idUsuario = '{$this->idUsuario}'";
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
