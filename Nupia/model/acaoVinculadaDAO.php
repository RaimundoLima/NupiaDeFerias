<?php
include_once("../controller/conexao.php");
include_once("acaoVinculada.php");
include_once("acaoDAO.php");
class AcaoVinculadaDAO{
  function adicionar($acaoVinculada){
    $acao1 = $acaoVinculada->getAcao1();
    $idAcao1 = $acao1->getId();
    $acao2 = $acaoVinculada->getAcao2();
    $idAcao2 = $acao2->getId();
    $conexao = conexao();
    $query = "insert into acaoVinculada(idacao1, idacao2) values('".$idAcao1."', '".$idAcao2."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from acaovinculada";
    $result = pg_query($conexao, $query);
    $listaAcaoVinculada = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaAcaoVinculadaObj = [];
    for($i=0; $i<count($listaAcaoVinculada); $i++){
      $id = $listaAcaoVinculada[$i]["id"];
      $idAcao1 = $listaAcaoVinculada[$i]["idacao1"];
      $acao1 = $acaoDAO->obter($idAcao1);
      $idAcao2 = $listaAcaoVinculada[$i]["idacao2"];
      $acao2 = $acaoDAO->obter($idAcao2);
      $acaoVinculada = new AcaoVinculada($acao1, $acao2, $id);
      array_push($listaAcaoVinculadaObj, $acaoVinculada;
    }
    return $listaVinculadaObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from acaovinculada where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $acaoVinculada = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $id = $acaoVinculada[0]["id"];
    $idAcao1 = $acaoVinculada[0]["idacao1"];
    $acao1 = $acaoDAO->obter($idAcao1);
    $idAcao2 = $acaoVinculada[0]["idacao2"];
    $acao2 = $acaoDAO->obter($idAcao2);
    $acaoVinculadaObj = new AcaoVinculada($acao1, $acao2, $id);
    return $acaoVinculadaObj;
  }
  function editar($acaoVinculada){
    $conexao = conexao();
    $id = $acaoVinculada->getId();
    $acao1 = $acaoVinculada->getAcao1();
    $idAcao1 = $acao1->getId();
    $acao2 = $acaoVinculada->getAcao2();
    $idAcao2 = $acao2->getId();
    $conexao = conexao();
    $query = "UPDATE acaovinculada set idacao1='".$idAcao1."', idacao2='".$idAcao2."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM acaoVinculada WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
