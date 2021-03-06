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
  function listarByAcao($idacao){
    $conexao = conexao();
    $query = "select id, nome, idacao  from arquivo where  idacao = '".$idacao."' and tipo ='comum'";
    $result = pg_query($conexao, $query);
    $listaArquivo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
      pg_close($conexao);
    $listaArquivoObj = [];
    for($i=0; $i<count($listaArquivo); $i++){
      $id = $listaArquivo[$i]["id"];
      $nome = $listaArquivo[$i]["nome"];
      $conexao = conexao();
      $arquivo = new Arquivo($acao="", $nome, $documento="", $diretorio="", $tipo="", $id);
      array_push($listaArquivoObj, $arquivo);
    }
    pg_close($conexao);
    return $listaArquivoObj;
  }

  function baixando($id){
    $conexao = conexao();
    $query = "select diretorio, nome from arquivo where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $arquivo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $nome = $arquivo[0]["nome"];
    $diretorio = $arquivo[0]["diretorio"];
    $caminhoCompleto =  $diretorio.$nome;
    $conexao = conexao();
    $query = "select lo_export(arquivo.documento, '".$caminhoCompleto."') from arquivo where id = '".$id."'";
    pg_query($conexao, $query);
    pg_close($conexao);
    return $caminhoCompleto;
  }
  function obterByAcao($idacao){
    $conexao = conexao();
    $query = "select * from arquivo where idacao = '".$idacao."' and tipo='comum'";
    $result = pg_query($conexao, $query);
    $arquivo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $id = $arquivo[0]["id"];
    $idacao = $arquivo[0]["idacao"];
    $acao = $acaoDAO->obter($idacao);
    $nome = $arquivo[0]["nome"];
    $documento = $arquivo[0]["documento"];
    $diretorio = $arquivo[0]["diretorio"];
    $tipo = $arquivo[0]["tipo"];
    $caminhoCompleto =  $diretorio.$nome;
    $conexao = conexao();
    $query = "select lo_export(arquivo.documento, '".$caminhoCompleto."') from arquivo where idacao = '".$idacao."' and tipo='comum'";
    pg_query($conexao, $query);
    pg_close($conexao);
    $arquivoObj = new Arquivo($acao, $nome, $documento, $diretorio, $tipo, $id);
  //  var_dump($arquivoObj);exit;
    return $arquivoObj;
  }
  function obterEditalByAcao($idacao){
    $conexao = conexao();
    $query = "select id, nome, documento, diretorio, tipo from arquivo where idacao = '".$idacao."' and tipo='edital'";
    $result = pg_query($conexao, $query);
    $arquivo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $id = $arquivo[0]["id"];
    $nome = $arquivo[0]["nome"];
    $documento = $arquivo[0]["documento"];
    $diretorio = $arquivo[0]["diretorio"];
    $tipo = $arquivo[0]["tipo"];
    $caminhoCompleto =  $diretorio.$nome;
    $conexao = conexao();
    $query = "select lo_export(arquivo.documento, '". $_SERVER["DOCUMENT_ROOT"].$caminhoCompleto."') from arquivo where idacao = '".$idacao."' and tipo='edital'";
    pg_query($conexao, $query);
    pg_close($conexao);
    $arquivoObj = new Arquivo($acao="", $nome, $documento, $diretorio, $tipo, $id);
    //var_dump($arquivoObj);exit;
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
