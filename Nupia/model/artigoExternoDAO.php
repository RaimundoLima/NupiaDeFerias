<?php
class ArtigoExternoDAO{
  function adicionar($artigoExterno){
    $acao = $artigoExterno->getAcao();
    $idAcao = $acao->getId();
    $link = $artigoExterno->getLink();
    $conexao = conexao();
    $query = "insert into acaoator(idacao, link) values(''".$idAcao."', '".$link."')";
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
    for($i=0; $i<count($result); $i++){
      $idAcao = $listaArtigoExterno[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $link = $listaArtigoExterno[$i]["link"];
      $artigoExterno = new ArtigoExterno($acao, $link);
      $listaArtigoExternoObj.append($artigoExterno);
    }
    return $listaArtigoExternoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from artigoexterno where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $ArtigoExterno = pg_fetch_one($result);
    $artigoExternoDAO = new ArtigoExternoDAO();
    pg_close($conexao);
    $idAcao = $ArtigoExterno[$i]["idacao"];
    $acao = $acaoDAO->obter($idAcao);
    $link = $ArtigoExterno[$i]["link"];
    $artigoExternoObj = new ArtigoExterno($acao, $link);
    return $artigoExternoObj;
  }
  function editar($acaoator){
    $conexao = conexao();
    $acao = $artigoExterno->getAcao();
    $idAcao = $acao->getId();
    $link = $artigoExterno->getLink();
    $conexao = conexao();
    $query = "UPDATE artigoexterno idacao='".$idAcao."', titulo='".$link."'";
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
