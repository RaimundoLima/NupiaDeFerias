<?php
include_once("controller/conexao.php");
include_once("acaoAtor.php");
include_once("atorDAO.php");
include_once("acaoDAO.php");
class AcaoAtorDAO{
  function adicionar($acaoAtor){
    $ator = $acaoAtor->getAtor();
    $idAtor = $ator->getId();
    $acao = $acaoAtor->getAcao();
    $idAcao = $acao->getId();
    $conexao = conexao();
    $query = "insert into acaoator(idator, idacao) values('".$idAtor."', '".$idAcao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from acaoator";
    $result = pg_query($conexao, $query);
    $listaAcaoAtor = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaAcaoAtorObj = [];
    for($i=0; $i<count($listaAcaoAtor); $i++){
      $id = $listaAcaoAtor[$i]["id"];
      $idAtor = $listaAcaoAtor[$i]["idator"];
      $ator = $atorDAO->obter($idAtor);
      $idAcao = $listaAcaoAtor[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $acaoAtor = new AcaoAtor($ator, $acao, $id);
      array_push($listaAcaoAtorObj, $acaoAtor);
    }
    return $listaAcaoAtorObj;
  }

  function listarByAcao($idAcao){
    $conexao = conexao();
    $query = "select * from acaoator where idacao='".$idAcao."'";
    $result = pg_query($conexao, $query);
    $listaAcaoAtor = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaAcaoAtorObj = [];
    for($i=0; $i<count($listaAcaoAtor); $i++){
      $id = $listaAcaoAtor[$i]["id"];
      $idAtor = $listaAcaoAtor[$i]["idator"];
      $ator = $atorDAO->obter($idAtor);
      $idAcao = $listaAcaoAtor[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $acaoAtor = new AcaoAtor($ator, $acao, $id);
      array_push($listaAcaoAtorObj, $acaoAtor);
    }
    return $listaAcaoAtorObj;
  }

  function listarByAtor($idAtor){
    $conexao = conexao();
    $query = "select  idacao, acaoator.idator, titulo, descricao
from acaoator inner join acao on acaoator.idacao=acao.id
where acaoator.idator='".$idAtor."' group by acaoator.idator, acaoator.idacao,acao.titulo,acao.descricao";
    $result = pg_query($conexao, $query);
    $listaAcaoAtor = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaAcaoAtorObj = [];
    for($i=0; $i<count($listaAcaoAtor); $i++){
      $id = $listaAcaoAtor[$i]["id"];
      //$idAtor = $listaAcaoAtor[$i]["idator"];
      //$ator = $atorDAO->obter($idAtor);
      $idAcao = $listaAcaoAtor[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $acaoAtor = new AcaoAtor($ator="", $acao, $id);
      array_push($listaAcaoAtorObj, $acaoAtor);
    }
    return $listaAcaoAtorObj;
  }

  function listarByAcaoAtor($idAcao, $idAtor){
    $conexao = conexao();
    $query = "select * from acaoator where idacao='".$idAcao."' and idator='".$idAtor."'";
    $result = pg_query($conexao, $query);
    $listaAcaoAtor = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaAcaoAtorObj = [];
    for($i=0; $i<count($listaAcaoAtor); $i++){
      $id = $listaAcaoAtor[$i]["id"];
      $idAtor = $listaAcaoAtor[$i]["idator"];
      $ator = $atorDAO->obter($idAtor);
      $idAcao = $listaAcaoAtor[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $acaoAtor = new AcaoAtor($ator, $acao, $id);
      array_push($listaAcaoAtorObj, $acaoAtor);
    }
    return $listaAcaoAtorObj;
  }

  function listarByAtorProjeto($idAtor, $idProjeto){
    $conexao = conexao();
    $query = "select  idacao, acaoator.idator, titulo, descricao
from acaoator inner join acao on acaoator.idacao=acao.id
where acaoator.idator='".$idAtor."' and acao.idprojeto='".$idProjeto."'
group by acaoator.idator, acaoator.idacao,acao.titulo,acao.descricao";
    $result = pg_query($conexao, $query);
    $listaAcaoAtor = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaAcaoAtorObj = [];
    for($i=0; $i<count($listaAcaoAtor); $i++){
      $idAtor = $listaAcaoAtor[$i]["idator"];
      $ator = $atorDAO->obter($idAtor);
      $idAcao = $listaAcaoAtor[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $acaoAtor = new AcaoAtor($ator, $acao);
      array_push($listaAcaoAtorObj, $acaoAtor);
    }
    return $listaAcaoAtorObj;
  }
  function listarAtorByAcao($idAcao){
    $conexao = conexao();
    $query = "select idator from acaoator where idacao='".$idAcao."'";
    $result = pg_query($conexao, $query);
    $listaAcaoAtor = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaAcaoAtorObj = [];
    for($i=0; $i<count($listaAcaoAtor); $i++){
      $id = $listaAcaoAtor[$i]["id"];
      $idAtor = $listaAcaoAtor[$i]["idator"];
      $ator = $atorDAO->obter($idAtor);
      $acaoAtor = new AcaoAtor($ator,$acao="", $id);
      array_push($listaAcaoAtorObj, $acaoAtor);
    }
    return $listaAcaoAtorObj;
  }

  function obter($id){
    $conexao = conexao();
    $query = "select * from acaoator where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $acaoAtor = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $id = $acaoAtor[0]["id"];
    $idAtor = $acaoAtor[0]["idator"];
    $ator = $atorDAO->obter($idAtor);
    $idAcao = $acaoAtor[0]["idacao"];
    $acaoAtorObj = new AcaoAtor($ator, $acao, $id);
    return $AcaoAtorObj;
  }
  function editar($acaoAtor){
    $conexao = conexao();
    $id = $acaoAtor->getId();
    $ator = $acaoAtor->getAtor();
    $idAtor = $ator->getId();
    $acao = $acaoAtor->getAcao();
    $idAcao = $acao->getId();
    $conexao = conexao();
    $query = "UPDATE acaoator set idator='".$idAtor."', idacao='".$idAcao."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM acaoator WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
