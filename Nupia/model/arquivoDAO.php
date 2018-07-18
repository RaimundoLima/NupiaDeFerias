<?php
include_once("../controller/conexao.php");
include_once("arquivo.php");
class ArquivoDAO{
  function adicionar($arquivo){
    $nome = $arquivo->getNome();
    $acao = $arquivo->getAcao();
    $idAcao = $acao->getId();
    $conexao = conexao();
    $query = "insert into arquivo(nome, idacao) values('".$nome."', '".$idAcao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from arquivo";
    $result = pg_query($conexao, $query);
    $listaArquivo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $listaArquivoObj = [];
    for($i=0; $i<count($result); $i++){
      $id = $listaArquivo[$i]["id"];
      $nome = $listaArquivo[$i]["nome"];
      $idAcao = $listaArquivo[$i]["idacao"];
      $acao = $acaoDAO->obter();
      $arquivo = new Arquivo($acao, $nome, $id);
      array_push($listaArquivoObj, $arquivo);
    }
    return $listaArquivoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from arquivo where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $arquivo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $id = $arquivo[0]["id"];
    $idacao = $arquivo[0]["idacao"];
    $acao = $acaoDAO->obter($idacao);
    $nome = $arquivo[0]["nome"];
    $arquivoObj = new Arquivo($acao, $nome, $id);
    return $arquivoObj;
  }
  function editar($arquivo){
    $conexao = conexao();
    $nome = $arquivo->getNome();
    $acao = $arquivo->getAcao();
    $idAcao = $acao->getId();
    $query = "UPDATE arquivo set idacao='".$idAcao."',nome='".$nome."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM arquivo WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
