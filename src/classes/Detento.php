<?php

namespace classes;

use db\ActiveRecord;
use db\MySQL;

class Detento implements ActiveRecord
{

    private int $idOrdemPrisao;
    private int $idPrisao;
    private int $idStatusPrisao;
    private string $horaPrisao;
    private int $quantidadePerguntasRespondidas;

    public function __construct(
    ) {
    }
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




    #region horaPrisao
    public function setHoraPrisao(string $horaPrisao): void
    {
        $this->horaPrisao = $horaPrisao;
    }

    public function getHoraPrisao(): string
    {
        return $this->horaPrisao;
    }
    #endregion

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

    public function save(): bool
    {
        $conexao = new MySQL();


        if(isset($this->idPrisao)){
            $sql = "UPDATE prisao SET idOrdemPrisao = '{$this->idOrdemPrisao}', idStatusPrisao = '{$this->idStatusPrisao}', quantidadePerguntasRespondidas = '{$this->quantidadePerguntasRespondidas}' WHERE idPrisao = {$this->idPrisao}";

        }else{
            $sql = "INSERT INTO prisao (idOrdemPrisao, idStatusPrisao, horaPrisao, quantidadePerguntasRespondidas) 
        VALUES (
            '{$this->idOrdemPrisao}',
            '{$this->idStatusPrisao}',
            CURRENT_TIMESTAMP()),
            0)";

        }

        return $conexao->executa($sql);

    }









    public function delete(): bool
    {
        $conexao = new MySQL();
        $sql = "DELETE FROM prisao WHERE idPrisao = {$this->idPrisao}";
        return $conexao->executa($sql);
    }

    public static function find($id): Detento
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM prisao WHERE idPrisao = {$id}";
        $resultado = $conexao->consulta($sql);
        $u = new Detento(

        );
        $u->setIdPrisao($resultado[0]['idPrisao']);
        $u->setIdOrdemPrisao($resultado[0]['idOrdemPrisao']);
        $u->setIdStatusPrisao($resultado[0]['idStatusPrisao']);
        $u->setHoraPrisao($resultado[0]['horaPrisao']);
        $u->setQuantidadePerguntasRespondidas($resultado[0]['quantidadePerguntasRespondidas']);
        return $u;
    }
    public static function findall(): array
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM prisao";
        $resultados = $conexao->consulta($sql);
        $prisoes = array();
        foreach ($resultados as $resultado) {
            $u = new Detento(
            );
            $u->setIdPrisao($resultado['idPrisao']);
            $u->setIdOrdemPrisao($resultado['idOrdemPrisao']);
            $u->setIdStatusPrisao($resultado['idStatusPrisao']);
            $u->setHoraPrisao($resultado['horaPrisao']);
            $u->setQuantidadePerguntasRespondidas($resultado['quantidadePerguntasRespondidas']);
            $prisoes[] = $u;
        }
        return $prisoes;
    }

    public static function PresoAtivo(): bool
    {
        $conexao = new MySQL();
        $sql = "SELECT COUNT(idOrdemPrisao) from prisao
                WHERE idStatusPrisao != 7";
        $resultado = $conexao->consulta($sql);
        if ($resultado = 0){
            return false;
        }else{
            return true;
        }

    }

    public static function ativaPergunta($id) : bool {
        $conexao = new MySQL();
        $sql = "SELECT idStatusPrisao, atualizacaostatus from prisao where idOrdemPrisao = $id";
        $res =  $conexao->consulta($sql);
        $status = $res[0]['idStatusPrisao'];
        $atualizacaostatus = $res[0]['atualizacaostatus'];
        date_default_timezone_set("America/Sao_Paulo");
        $today = strtotime(date("Y-m-d H:i:s"));
        $prison = strtotime($atualizacaostatus);
        $diff = $today - $prison;
        $minutes = round(abs($diff / 60), 0);
        $minutosaguardo = 2;
        echo $minutes;

        if($minutes >= $minutosaguardo && $status == 1 ){
            $conexao = new MySQL();
            $sql = "UPDATE prisao set idStatusPrisao = 2 where idOrdemPrisao = $id";
            return $conexao->executa($sql);

        }elseif ($minutes >= $minutosaguardo && $status == 3 ){
            $conexao = new MySQL();
            $sql = "UPDATE prisao set idStatusPrisao = 4 where idOrdemPrisao = $id";
            return $conexao->executa($sql);
        }elseif ($minutes >= $minutosaguardo && $status == 5 ){
            $conexao = new MySQL();
            $sql = "UPDATE prisao set idStatusPrisao = 6 where idOrdemPrisao = $id";
            return $conexao->executa($sql);
        }else{
            return false;
        }

    }





}