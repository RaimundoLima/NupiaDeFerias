<?php
include_once("controller/conexao.php");
include_once("arquivo.php");
include_once("acaoDAO.php");
class ArquivoDAO{
  function adicionar($arquivo){
    $nome = $arquivo->getNome();
    $acao = $arquivo->getAcao();
    $idAcao = $acao->getId();
    $documento = $arquivo->getDocumento();
    $diretorio = $arquivo->getDiretorio();
    $tipo = $arquivo->getTipo();
    $conexao = conexao();
    $query = "insert into arquivo(nome, idacao, documento, diretorio, tipo) values('".$nome."', '".$idAcao."',lo_import('".$documento."'), '".$diretorio."', '".$tipo."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from arquivo";
    $result = pg_query($conexao, $query);
    $listaArquivo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    $listaArquivoObj = [];
    for($i=0; $i<count($listaArquivo); $i++){
      $id = $listaArquivo[$i]["id"];
      $nome = $listaArquivo[$i]["nome"];
      $idAcao = $listaArquivo[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $documento = $listaArquivo[$i]["documento"];
      $diretorio = $listaArquivo[$i]["diretorio"];
      $tipo = $listaArquivo[$i]["tipo"];
      pg_lo_export($documento, $diretorio, $conexao);
      $arquivo = new Arquivo($acao, $nome, $documento, $diretorio, $tipo, $id);
      array_push($listaArquivoObj, $arquivo);
    }
    pg_close($conexao);
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
    $documento = $listaArquivo[$i]["documento"];
    $diretorio = $listaArquivo[$i]["diretorio"];
    $tipo = $listaArquivo[$i]["tipo"];
    pg_lo_export($documento, $diretorio, $conexao);
    $arquivo = new Arquivo($acao, $nome, $documento, $diretorio, $tipo, $id);
    return $arquivoObj;
  }
  function editar($arquivo){
    $conexao = conexao();
    $id = $arquivo->getId();
    $nome = $arquivo->getNome();
    $acao = $arquivo->getAcao();
    $idAcao = $acao->getId();
    $documento = $arquivo->getDocumento();
    $diretorio = $arquivo->getDiretorio();
    $tipo = $arquivo->getTipo();
    $query = "UPDATE arquivo set idacao='".$idAcao."',nome='".$nome."',documento='".$documento."',diretorio='".$diretorio."', tipo='".$tipo."' where id='".$id."'";
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
