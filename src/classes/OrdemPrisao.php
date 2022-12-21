<?php

require_once "../db/MySQL.php";
require_once "../db/ActiveRecord.php";


class OrdemPrisao implements ActiveRecord
{

    private int $idOrdem;	
    private int $idTicket;	
    private int $idTipoMeliante;
    private int $idTurmaMeliante;	
    private int $idStatusOrdem;	
    private int $horaOrdem;
    
    public function __construct(
        private string $nomeMeliante,
        private string $descricaoMeliante,	
        private string $localVisto,
        private string $nomeDenunciante,
        private string $telefoneDenunciante,
  ) {
  }
  #region idOrdem
  public function setIdOrdem(int $ididOrdem): void
  {
    $this->idOrdem = $idOrdem;
  }

  public function getIdOrdem(): int
  {
    return $this->idOrdem;
  }
  #endregion

  #region idTicket
  public function setIdTicket(int $idTicket): void
  {
    $this->idTicket = $idTicket;
  }

  public function getIdTicket(): int
  {
    return $this->idTicket;
  }
  #endregion

  #region idTipoMeliante
  public function setIdTipoMeliante(int $idTipoMeliante): void
  {
    $this->idTipoMeliante = $idTipoMeliante;
  }

  public function getIdTipoMeliante(): int
  {
    return $this->idTipoMeliante;
  }
  #endregion

  #region idTurmaMeliante
  public function setIdTurmaMeliante(int $idTurmaMeliante): void
  {
    $this->idTurmaMeliante = $idTurmaMeliante;
  }

  public function getIdTurmaMeliante(): int
  {
    return $this->idTurmaMeliante;
  }
  #endregion

  #region idStatusOrdem
  public function setIdStatusOrdem(int $idStatusOrdem): void
  {
    $this->idStatusOrdem = $idStatusOrdem;
  }

  public function getIdStatusOrdem(): int
  {
    return $this->idStatusOrdem;
  }
  #endregion

  #region nomeMeliante 
  public function setNomeMeliante(string $nomeMeliante): void
  {
    $this->nomeMeliante =  filter_var($nomeMeliante,FILTER_SANITIZE_STRING);
  }

  public function getNomeMeliante(): string
  {
    return $this->nomeMeliante;
  }
  #endregion

  #region descricaoMeliante
  public function setDescricaoMeliante(string $descricaoMeliante): void
  {
    $this->descricaoMeliante =  filter_var($descricaoMeliante,FILTER_SANITIZE_STRING);
  }

  public function getDescricaoMeliante(): string
  {
    return $this->descricaoMeliante;
  }
  #endregion

  #region localVisto
  public function setLocalVisto(string $localVisto): void
  {
    $this->localVisto =  filter_var($localVisto,FILTER_SANITIZE_STRING);
  }

  public function getLocalVisto(): string
  {
    return $this->localVisto;
  }
  #endregion

  #region nomeDenunciante
  public function setNomeDenunciante(string $nomeDenunciante): void
  {
    $this->nomeDenunciante =  filter_var($nomeDenunciante,FILTER_SANITIZE_STRING);
  }

  public function getNomeDenunciante(): string
  {
    return $this->nomeDenunciante;
  }
  #endregion

  #region telefoneDenunciante
  public function setTelefoneDenunciante(string $telefoneDenunciante): void
  {
    $this->telefoneDenunciante = $telefoneDenunciante;
  }

  public function getTelefoneDenunciante(): string
  {
    return $this->telefoneDenunciante;
  }
  #endregion

  #region telefoneDenunciante
  public function setHoraOrdem(string $horaOrdem): void
  {
    $this->horaOrdem = time();
  }

  public function getHoraOrdem(): int
  {
    return $this->horaOrdem;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();


      if(isset($this->idTurmaMeliante)){
        $sql = "INSERT INTO ordemPrisao (idTicket, idTipoMeliante, idTurmaMeliante, nomeMeliante, descricaoMeliante, localVisto, nomeDenunciante, telefoneDenunciante, idStatusOrdem, horaOrdem) 
        VALUES (
            '{$this->idTicket}',
            '{$this->idTipoMeliante}',
            '{$this->idTurmaMeliante}' ,
            '{$this->nomeMeliante}' ,
            '{$this->descricaoMeliante}' ,
            '{$this->localVisto}' ,
            '{$this->nomeDenunciante}' ,
            '{$this->telefoneDenunciante}' ,
              0 ,
            CURRENT_TIMESTAMP())";
      }else{
        $sql = "INSERT INTO ordemPrisao (idTicket, idTipoMeliante, nomeMeliante, descricaoMeliante, localVisto, nomeDenunciante, telefoneDenunciante, idStatusOrdem, horaOrdem) 
        VALUES (
            '{$this->idTicket}',
            '{$this->idTipoMeliante}',
            '{$this->nomeMeliante}' ,
            '{$this->descricaoMeliante}' ,
            '{$this->localVisto}' ,
            '{$this->nomeDenunciante}' ,
            '{$this->telefoneDenunciante}' ,
              0 ,
            CURRENT_TIMESTAMP())";
      }
      
      session_destroy();

   // TRIGGER NO BANCO $sql = "UPDATE ticket SET valido = false WHERE idTicket = '{$this->idTicket}'";
   
   return $conexao->executa($sql);

  }
  
  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM usuario WHERE id = {$this->id}";
    return $conexao->executa($sql);
  }

  public static function find($id): OrdemPrisao
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM usuario WHERE id = {$id}";
    $resultado = $conexao->consulta($sql);
    $u = new Usuario(
      $resultado[0]['email'],
      $resultado[0]['senha']
    );
    $u->setNome($resultado[0]['nome']);
    $u->setContato($resultado[0]['contato']);
    $u->setTipo($resultado[0]['tipo']);
    $u->setId($resultado[0]['id']);
    $u->setIdCurso($resultado[0]['idCurso']);
    return $u;
  }
  public static function findall(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM usuario";
    $resultados = $conexao->consulta($sql);
    $usuarios = array();
    foreach ($resultados as $resultado) {
      $p = new Usuario(
        $resultado[0]['nome'],
        $resultado[0]['email'],
        $resultado[0]['senha'],
        $resultado[0]['contato'],
        $resultado[0]['tipo']
      );
      $p->setId($resultado['id']);
      $p->setIdCurso($resultado['idCurso']);
      $usuarios[] = $p;
    }
    return $usuarios;
  }

  public function authenticate(): bool
  {
    $conexao = new MySQL();
    $sql = "SELECT id,nome,email,senha,tipo FROM usuario WHERE email = '{$this->email}'";
    $resultados = $conexao->consulta($sql);
    if (password_verify($this->senha, $resultados[0]['senha'])) {
      session_start();
      $_SESSION['idUsuario'] = $resultados[0]['id'];
      $_SESSION['email'] = $resultados[0]['email'];
      $_SESSION['nome'] = $resultados[0]['nome'];
      $_SESSION['tipo'] = $resultados[0]['tipo'];
      return true;
    } else {
      return false;
    }
  }
  
}