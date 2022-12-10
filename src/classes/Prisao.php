<?php

namespace classes;

use db\ActiveRecord;
use db\MySQL;

class Prisao implements ActiveRecord
{

  private int $idPrisao;
  private int $idOrdemPrisao;
  private int $idStatusPrisao;
  private int $horaPrisao;
  private int $quantidadePerguntasRespondidas;


  public function __construct()
  {
  }
  #region idPrisao
  public function setIdPrisao(int $idPrisao): void
  {
    $this->idPrisao = $idPrisao;
  }

  public function getIdPrisao(): int
  {
    return $this->idPrisao;
  }
  #endregion

  #region idOrdemPrisao
  public function setIdOrdemPrisao(int $idOrdemPrisao): void
  {
    $this->idOrdemPrisao = $idOrdemPrisao;
  }

  public function getIdOrdemPrisao(): int
  {
    return $this->idOrdemPrisao;
  }
  #endregion

  #region idStatusPrisao
  public function setIdStatusPrisao(int $idStatusPrisao): void
  {
    $this->idStatusPrisao = $idStatusPrisao;
  }

  public function getIdStatusPrisao(): int
  {
    return $this->idStatusPrisao;
  }
  #endregion

  #region horaPrisao
  public function setHoraPrisao(int $horaPrisao): void
  {
    $this->horaPrisao = $horaPrisao;
  }

  public function getHoraPrisao(): int
  {
    return $this->horaPrisao;
  }
  #endregion

  #region quantidadePerguntasRespondidas
  public function setQuantidadePerguntasRespondidas(int $quantidadePerguntasRespondidas): void
  {
    $this->quantidadePerguntasRespondidas = $quantidadePerguntasRespondidas;
  }

  public function getQuantidadePerguntasRespondidas(): int
  {
    return $this->quantidadePerguntasRespondidas;
  }
  #endregion


  public function save(): bool
  {
    $conexao = new MySQL();

    $sql = "INSERT INTO prisao (idOrdemPrisao, idStatusPrisao, horaPrisao, quantidadePerguntasRespondidas) 
        VALUES (
            '{$this->idOrdemPrisao}',
            '{$this->idStatusPrisao}',
             CURRENT_TIMESTAMP(),
            '{$this->quantidadePerguntasRespondidas}')";

    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM prisao WHERE idPrisao = {$this->idPrisao}";
    return $conexao->executa($sql);
  }

  public static function find($idPrisao): Prisao
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM prisao WHERE idPrisao = {$idPrisao}";
    $resultado = $conexao->consulta($sql);
    $p = new Prisao();
    $p->setIdPrisao($resultado[0]['idPrisao']);
    $p->setIdOrdemPrisao($resultado[0]['idOrdemPrisao']);
    $p->setIdStatusPrisao($resultado[0]['idStatusPrisao']);
    $p->setHoraPrisao($resultado[0]['horaPrisao']);
    $p->setQuantidadePerguntasRespondidas($resultado[0]['quantidadePerguntasRespondidas']);

    return $p;
  }

  public static function findall(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM prisao";
    $resultados = $conexao->consulta($sql);
    $prisoes = array();
    foreach ($resultados as $resultado) {
      $p = new Prisao();
      $p->setIdPrisao($resultado['idPrisao']);
      $p->setIdOrdemPrisao($resultado['idOrdemPrisao']);
      $p->setIdStatusPrisao($resultado['idStatusPrisao']);
      $p->setHoraPrisao($resultado['horaPrisao']);
      $p->setQuantidadePerguntasRespondidas($resultado['quantidadePerguntasRespondidas']);

      $prisoes[] = $p;
    }
    return $prisoes;
  }
}
