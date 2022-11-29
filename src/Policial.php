<?php
require_once __DIR__."/ActiveRecord.php";
require_once __DIR__."/MySQL.php";

class Policial implements ActiveRecord{

    private int $id_policial;
    
    public function __construct(
        private string $email,
        private string $senha,
        private string $nome){
    }

    public function setIdPolicial(int $id_policial):void{
        $this->id_policial = $id_policial;
    }

    public function getIdPolicial():int{
        return $this->id_policial;
    }

    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function save():bool{
        $conexao = new MySQL();
        $this->senha = password_hash($this->senha,PASSWORD_BCRYPT); 
        if(isset($this->id_policial)){
            $sql = "UPDATE policiais SET nome = '{$this->nome}' email = '{$this->email}' ,senha = '{$this->senha}' WHERE id_policial = {$this->id_policial}";
        }else{
            $sql = "INSERT INTO policiais (nome,email,senha) VALUES ('{$this->nome}','{$this->email}','{$this->senha}')";
        }
        return $conexao->executa($sql);
    }

    public static function find($id_policial):Policial{
        $conexao = new MySQL();
        $sql = "SELECT * FROM policiais WHERE id_policial = {$id_policial}";
        $resultado = $conexao->consulta($sql);
        $u = new Policial($resultado[0]['nome'],$resultado[0]['email'],$resultado[0]['senha']);
        $u->setIdPolicial($resultado[0]['id_policial']);
        return $u;
    }

    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM policiais WHERE id_policial = {$this->id_policial}";
        return $conexao->executa($sql);
    }

    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM policiais";
        $resultados = $conexao->consulta($sql);
        $policial = array();
        foreach($resultados as $resultado){
            $u = new Policial($resultado['nome'],$resultado['email'],$resultado['senha']);
            $u->setIdPolicial($resultado['id_policial']);
            $policial[] = $u;
        }
        return $policial;
    }

    public function authenticate():bool{
        $conexao = new MySQL();
        $sql = "SELECT id_policial, senha FROM policiais WHERE email = '{$this->email}'";
        $resultados = $conexao->consulta($sql);
        if(password_verify($this->senha,$resultados[0]['senha'])){
            session_start();
            $_SESSION['id_policial'] = $resultados[0]['id_policial'];
            $_SESSION['nome'] = $resultados[0]['nome'];
            $_SESSION['email'] = $resultados[0]['email'];
            return true;
        }else{
            return false;
        }
    }
}
