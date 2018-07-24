<?php
include_once("controller/conexao.php");
include_once("resumo.php");
class ResumoDAO{
  function adicionar($resumo){
    $titulo = $resumo->getTitulo();
    $acao = $resumo->getAcao();
    $idAcao = $acao->getId();
    $ator = $resumo->getAtor();
    $idAtor = $ator->getId();
    $justificativa = $resumo->getJustificativa();
    $objetivo = $resumo->getObjetivo();
    $metodologia = $resumo->getMetodologia();
    $resultadoEsperado = $resumo->getResultadoEsperado();
    $impactoEsperado = $resumo->getImpactoEsperado();
    $conexao = conexao();
    $query = "insert into resumo(titulo, idacao, idator, justificativa, objetivo, metodologia, resultadoesperado, impactoesperado) values('".$titulo."','".$idAcao."' ,'".$idAtor."', '".$justificativa."', '".$objetivo."', '".$metodologia."', '".$resultadoEsperado."', '".$impactoEsperado."' where id='".$id."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from resumo";
    $result = pg_query($conexao, $query);
    $listaResumo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    $atorDAO = new AtorDAO();
    pg_close($conexao);
    $listaResumoObj = [];
    for($i=0; $i<count($listaResumo); $i++){
      $id = $listaResumo[$i]["id"];
      $titulo = $listaResumo[$i]["titulo"];
      $idAcao = $listaResumo[$i]["idacao"];
      $acao = $AcaoDAO->obter($idAcao);
      $idAtor = $listaResumo[$i]["idator"];
      $ator = $AtorDAO->obter($idAtor);
      $justificativa = $listaResumo[$i]["justificativa"];
      $objetivo = $listaResumo[$i]["objetivo"];
      $metodologia = $listaResumo[$i]["metodologia"];
      $resultadoEsperado = $listaResumo[$i]["resultadoesperado"];
      $impactoEsperado = $listaResumo[$i]["impactoesperado"];
      $resumo = new Resumo($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
      array_push($listaResumoObj, $resumo);
    }
    return $listaResumoObj;
  }

  function listarByAtor($idAtor){
    $conexao = conexao();
    $query = "select * from resumo where idator='".$idAtor."'";
    $result = pg_query($conexao, $query);
    $listaResumo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    $atorDAO = new AtorDAO();
    pg_close($conexao);
    $listaResumoObj = [];
    for($i=0; $i<count($listaResumo); $i++){
      $id = $listaResumo[$i]["id"];
      $titulo = $listaResumo[$i]["titulo"];
      $idAcao = $listaResumo[$i]["idacao"];
      $acao = $AcaoDAO->obter($idAcao);
      $idAtor = $listaResumo[$i]["idator"];
      $ator = $AtorDAO->obter($idAtor);
      $justificativa = $listaResumo[$i]["justificativa"];
      $objetivo = $listaResumo[$i]["objetivo"];
      $metodologia = $listaResumo[$i]["metodologia"];
      $resultadoEsperado = $listaResumo[$i]["resultadoesperado"];
      $impactoEsperado = $listaResumo[$i]["impactoesperado"];
      $resumo = new Resumo($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
      array_push($listaResumoObj, $resumo);
    }
    return $listaResumoObj;
  }

  function listarByAcao($idAcao){
    $conexao = conexao();
    $query = "select * from resumo where idacao = '".$idAcao."'";
    $result = pg_query($conexao, $query);
    $listaResumo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    $atorDAO = new AtorDAO();
    pg_close($conexao);
    $listaResumoObj = [];
    for($i=0; $i<count($listaResumo); $i++){
      $id = $listaResumo[$i]["id"];
      $titulo = $listaResumo[$i]["titulo"];
      $idAcao = $listaResumo[$i]["idacao"];
      $acao = $AcaoDAO->obter($idAcao);
      $idAtor = $listaResumo[$i]["idator"];
      $ator = $AtorDAO->obter($idAtor);
      $justificativa = $listaResumo[$i]["justificativa"];
      $objetivo = $listaResumo[$i]["objetivo"];
      $metodologia = $listaResumo[$i]["metodologia"];
      $resultadoEsperado = $listaResumo[$i]["resultadoesperado"];
      $impactoEsperado = $listaResumo[$i]["impactoesperado"];
      $resumo = new Resumo($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
      array_push($listaResumoObj, $resumo);
    }
    return $listaResumoObj;
  }

  function listarByAcaoAtor($idAcao, $idAtor){
    $conexao = conexao();
    $query = "select * from resumo where idacao='".$idAcao."' and idator='".$idAtor."'";
    $result = pg_query($conexao, $query);
    $listaResumo = pg_fetch_all($result);
    $acaoDAO = new AcaoDAO();
    $atorDAO = new AtorDAO();
    pg_close($conexao);
    $listaResumoObj = [];
    for($i=0; $i<count($listaResumo); $i++){
      $id = $listaResumo[$i]["id"];
      $titulo = $listaResumo[$i]["titulo"];
      $idAcao = $listaResumo[$i]["idacao"];
      $acao = $AcaoDAO->obter($idAcao);
      $idAtor = $listaResumo[$i]["idator"];
      $ator = $AtorDAO->obter($idAtor);
      $justificativa = $listaResumo[$i]["justificativa"];
      $objetivo = $listaResumo[$i]["objetivo"];
      $metodologia = $listaResumo[$i]["metodologia"];
      $resultadoEsperado = $listaResumo[$i]["resultadoesperado"];
      $impactoEsperado = $listaResumo[$i]["impactoesperado"];
      $resumo = new Resumo($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
      array_push($listaResumoObj, $resumo);
    }
    return $listaResumoObj;
  }

  function obter($id){
    $conexao = conexao();
    $query = "select * from resumo where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $resumo = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    pg_close($conexao);
    $id = $resumo[0]["id"];
    $titulo = $resumo[0]["titulo"];
    $idAcao = $listaResumo[$i]["idacao"];
    $acao = $AcaoDAO->obter($idAcao);
    $idAtor = $resumo[0]["idator"];
    $ator = $atorDAO->obter($idAtor);
    $justificativa = $resumo[0]["justificativa"];
    $objetivo = $resumo[0]["objetivo"];
    $metodologia = $resumo[0]["metodologia"];
    $resultadoEsperado = $resumo[0]["resultadoesperado"];
    $impactoEsperado = $resumo[0]["impactoesperado"];
    $resumoObj = new Resumo($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
    return $resumoObj;
  }
  function editar($resumo){
    $conexao = conexao();
    $titulo = $resumo->getTitulo();
    $acao = $resumo->getAcao();
    $idAcao = $acao->getId();
    $ator = $resumo->getAtor();
    $idAtor = $ator->getId();
    $justificativa = $resumo->getJustificativa();
    $objetivo = $resumo->getObjetivo();
    $metodologia = $resumo->getMetodologia();
    $resultadoEsperado = $resumo->getResultadoEsperado();
    $impactoEsperado = $resumo->getImpactoEsperado();
    $query = "UPDATE resumo set titulo='".$titulo."', idacao='".$idAcao."', idator='".$idAtor."', justificativa='".$justificativa."',objetivo='".$objetivo."',metodologia='".$metodologia."', resultadoesperado='".$resultadoEsperado."', impactoesperado='".$impactoEsperado."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM resumo WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
}
 ?>
