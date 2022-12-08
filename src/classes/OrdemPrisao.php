<?php

namespace classes;

use db\ActiveRecord;
use db\MySQL;

class OrdemPrisao implements ActiveRecord
{

  private int $idOrdem;
  private int $idTicket;
  private int $idTipoMeliante;
  private int $idTurmaMeliante;
  private int $idStatusOrdem;
  private int $horaOrdem;
  private int $assumidaPor;
  private int $presoPor;

  public function __construct(
    private string $nomeMeliante,
    private string $descricaoMeliante,
    private string $localVisto,
    private string $nomeDenunciante,
    private string $telefoneDenunciante,
  ) {
  }
  #region idOrdem
  public function setIdOrdem(int $idOrdem): void
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
    $this->nomeMeliante = $nomeMeliante;
  }

  public function getNomeMeliante(): string
  {
    return $this->nomeMeliante;
  }
  #endregion

  #region descricaoMeliante
  public function setDescricaoMeliante(string $descricaoMeliante): void
  {
    $this->descricaoMeliante = $descricaoMeliante;
  }

  public function getDescricaoMeliante(): string
  {
    return $this->descricaoMeliante;
  }
  #endregion

  #region localVisto
  public function setLocalVisto(string $localVisto): void
  {
    $this->localVisto = $localVisto;
  }

  public function getLocalVisto(): string
  {
    return $this->localVisto;
  }
  #endregion

  #region nomeDenunciante
  public function setNomeDenunciante(string $nomeDenunciante): void
  {
    $this->nomeDenunciante = $nomeDenunciante;
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

  #region assumidaPor
  public function setAssumidaPor(int $assumidaPor): void
  {
    $this->assumidaPor = $assumidaPor;
  }

  public function getAssumidaPor(): int
  {
    return $this->assumidaPor;
  }
  #endregion

  #region presoPor
  public function setPresoPor(int $presoPor): void
  {
    $this->presoPor = $presoPor;
  }

  public function getPresoPor(): int
  {
    return $this->presoPor;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();


    if (isset($this->idTurmaMeliante)) {
      $sql = "INSERT INTO ordemprisao (idTicket, idTipoMeliante, idTurmaMeliante, nomeMeliante, descricaoMeliante, localVisto, nomeDenunciante, telefoneDenunciante, idStatusOrdem, horaOrdem) 
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
    } else {
      $sql = "INSERT INTO ordemprisao (idTicket, idTipoMeliante, nomeMeliante, descricaoMeliante, localVisto, nomeDenunciante, telefoneDenunciante, idStatusOrdem, horaOrdem) 
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
    $sql = "DELETE FROM ordemPrisao WHERE idOrdem = {$this->idOrdem}";
    return $conexao->executa($sql);
  }

  public static function find($idOrdem): OrdemPrisao
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM ordemprisao WHERE idOrdem = {$idOrdem}";
    $resultado = $conexao->consulta($sql);
    $p = new OrdemPrisao(
      $resultado[0]['nomeMeliante'],
        $resultado[0]['descricaoMeliante'],
        $resultado[0]['localVisto'],
        $resultado[0]['nomeDenunciante'],
        $resultado[0]['telefoneDenunciante']
    );
    $p->setIdTicket($resultado[0]['idTicket']);
    $p->setIdTipoMeliante($resultado[0]['idTipoMeliante']);
    $p->setIdStatusOrdem($resultado[0]['idStatusOrdem']);
    $p->setHoraOrdem($resultado[0]['horaOrdem']);

    // if ($resultado['idTurmaMeliante'] != 0) {
    // }
    $p->setIdTurmaMeliante(0);
    $p->setIdOrdem($resultado[0]['idOrdem']);
    $p->setAssumidaPor($resultado[0]['assumidaPor']);
    $p->setPresoPor($resultado[0]['presoPor']);
    return $p;
  }

  public static function findall(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM ordemPrisao";
    $resultados = $conexao->consulta($sql);
    $usuarios = array();
    foreach ($resultados as $resultado) {
      $p = new OrdemPrisao(
        $resultado['nomeMeliante'],
        $resultado['descricaoMeliante'],
        $resultado['localVisto'],
        $resultado['nomeDenunciante'],
        $resultado['telefoneDenunciante']
      );

      $p->setIdTicket($resultado['idTicket']);
      $p->setIdTipoMeliante($resultado['idTipoMeliante']);
      $p->setIdStatusOrdem($resultado['idStatusOrdem']);
      $p->setHoraOrdem($resultado['horaOrdem']);

      // if ($resultado['idTurmaMeliante'] != 0) {
      // }
      $p->setIdTurmaMeliante(0);
      $p->setIdOrdem($resultado['idOrdem']);
      $p->setAssumidaPor($resultado['assumidaPor']);
      if (isset($resultado["presoPor"])) {
          $p->setPresoPor($resultado['presoPor']);
      } else {
          $p->setPresoPor(0);
      }

      $usuarios[] = $p;
    }
    return $usuarios;
  }
}
