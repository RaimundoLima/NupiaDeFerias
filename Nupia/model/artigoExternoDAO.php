<?php
include_once("controller/conexao.php");
include_once("artigoExterno.php");
include_once("acaoDAO.php");
class ArtigoExternoDAO{
  function adicionar($artigoExterno){
    $acao = $artigoExterno->getAcao();
    $idAcao = $acao->getId();
    $link = $artigoExterno->getLink();
    $conexao = conexao();
    $query = "insert into artigoexterno(idacao, link) values('".$idAcao."', '".$link."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from artigoexterno";
    $result = pg_query($conexao, $query);
    $listaArtigoExterno = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaArtigoExternoObj = [];
    for($i=0; $i<count($listaArtigoExterno); $i++){
      $id = $listaArtigoExterno[$i]["id"];
      $idAcao = $listaArtigoExterno[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $link = $listaArtigoExterno[$i]["link"];
      $artigoExterno = new ArtigoExterno($acao, $link, $id);
      array_push($listaArtigoExternoObj, $artigoExterno);
    }
    return $listaArtigoExternoObj;
  }
  function listarByAcao($idAcao){
    $conexao = conexao();
    $query = "select * from artigoexterno where idacao='".$idAcao."'";
    $result = pg_query($conexao, $query);
    $listaArtigoExterno = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaArtigoExternoObj = [];
    for($i=0; $i<count($listaArtigoExterno); $i++){
      $id = $listaArtigoExterno[$i]["id"];
      $idAcao = $listaArtigoExterno[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $link = $listaArtigoExterno[$i]["link"];
      $artigoExterno = new ArtigoExterno($acao, $link, $id);
      array_push($listaArtigoExternoObj, $artigoExterno);
    }
    return $listaArtigoExternoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from artigoexterno where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $artigoExterno = pg_fetch_all($result);
    $artigoExternoDAO = new ArtigoExternoDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $id = $artigoExterno[0]["id"];
    $idAcao = $artigoExterno[0]["idacao"];
    $acao = $acaoDAO->obter($idAcao);
    $link = $artigoExterno[0]["link"];
    $artigoExternoObj = new ArtigoExterno($acao, $link, $id);
    return $artigoExternoObj;
  }
  function editar($artigoExterno){
    $conexao = conexao();
    $acao = $artigoExterno->getAcao();
    $idAcao = $acao->getId();
    $link = $artigoExterno->getLink();
    $conexao = conexao();
    $query = "UPDATE artigoexterno set idacao='".$idAcao."', link='".$link."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM artigoexterno WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
