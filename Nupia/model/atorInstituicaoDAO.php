<?php
include_once("controller/conexao.php");
include_once("atorInstituicao.php");
include_once("atorDAO.php");
include_once("instituicaoDAO.php");
class AtorInstituicaoDAO{
  function adicionar($atorInstituicao){
    $ator = $atorInstituicao->getAtor();
    $idAtor = $ator->getId();
    $instituicao = $atorInstituicao->getInstituicao();
    $idInstituicao = $instituicao->getId();
    $conexao = conexao();
    $query = "insert into atorinstituicao(idator, idinstituicao) values('".$idAtor."', '".$idInstituicao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from atorinstituicao";
    $result = pg_query($conexao, $query);
    $listaAtorInstituicao = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $instituicaoDAO = new InstituicaoDAO();
    pg_close($conexao);
    $listaAtorInstituicaoObj = [];
    for($i=0; $i<count($listaAtorInstituicao); $i++){
      $id = $listaAtorInstituicao[$i]["id"];
      $idAtor = $listaAtorInstituicao[$i]["idator"];
      $ator = $atorDAO->obter($idAtor);
      $idInstituicao = $listaAtorInstituicao[$i]["idinstituicao"];
      $instituicao = $instituicaoDAO->obter($idInstituicao);
      $atorInstituicao = new AtorInstituicao($ator, $instituicao, $id);
      array_push($listaAtorInstituicaoObj, $atorInstituicao);
    }
    return $listaAtorInstituicaoObj;
  }

  function obter($id){
    $conexao = conexao();
    $query = "select * from atorinstituicao where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $atorInstituicao = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    $instituicaoDAO = new InstituicaoDAO();
    pg_close($conexao);
    $id = $atorInstituicao[0]["id"];
    $idAtor = $atorInstituicao[0]["idator"];
    $ator = $atorDAO->obter($idAtor);
    $idInstituicao = $atorInstituicao[0]["idinstituicao"];
    $instituicao = $instituicaoDAO->obter($idInstituicao);
    $atorInstituicaoObj = new AtorInstituicao($ator, $instituicao, $id);
    return $AtorInstituicaoObj;
  }
  function editar($atorInstuicao){
    $conexao = conexao();
    $id = $atorInstuicao->getId();
    $ator = $atorInstuicao->getAtor();
    $idAtor = $ator->getId();
    $instituicao = $atorInstuicao->getInstituicao();
    $idAcao = $acao->getId();
    $conexao = conexao();
    $query = "UPDATE atorinstituicao set idator='".$idAtor."', idinstituicao='".$idInstituicao."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM atorinstituicao WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
