<?php
include_once("../controller/conexao.php");
include_once("acaoAtor.php");
include_once("atorDAO.php");
include_once("acaoDAO.php");
class AcaoAtorDAO{
  function adicionar($acaoAtor){
    $ator = $acaoAtor->getAtor();
    $idAtor = $ator->getId();
    $acao = $acaoAtor->getAcao();
    $idAcao = $acao->getId();
    $titulo = $acaoAtor->getTitulo();
    $justificativa = $acaoAtor->getJustificativa();
    $objetivo = $acaoAtor->getObjetivo();
    $metodologia = $acaoAtor->getMetodologia();
    $resultadoEsperado = $acaoAtor->getResultadoEsperado();
    $impactoEsperado = $acaoAtor->getImpactoEsperado();
    $conexao = conexao();
    $query = "insert into acaoator(idator, idacao, titulo, justificativa, objetivo, metodologia, resultadoesperado, impactoesperado) values('".$idAtor."', '".$idAcao."', '".$titulo."', '".$justificativa."', '".$objetivo."', '".$metodologia."', '".$resultadoEsperado."', '".$impactoEsperado."')";
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
      $titulo = $listaAcaoAtor[$i]["titulo"];
      $justificativa = $listaAcaoAtor[$i]["justificativa"];
      $objetivo = $listaAcaoAtor[$i]["objetivo"];
      $metodologia = $listaAcaoAtor[$i]["metodologia"];
      $resultadoEsperado = $listaAcaoAtor[$i]["resultadoesperado"];
      $impactoEsperado = $listaAcaoAtor[$i]["impactoesperado"];
      $acaoAtor = new AcaoAtor($ator, $acao, $titulo, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
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
    $acao = $acaoDAO->obter($idAcao);
    $titulo = $acaoAtor[0]["titulo"];
    $justificativa = $acaoAtor[0]["justificativa"];
    $objetivo = $acaoAtor[0]["objetivo"];
    $metodologia = $acaoAtor[0]["metodologia"];
    $resultadoEsperado = $acaoAtor[0]["resultadoesperado"];
    $impactoEsperado = $acaoAtor[0]["impactoesperado"];
    $acaoAtorObj = new AcaoAtor($ator, $acao, $titulo,$justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
    return $AcaoAtorObj;
  }
  function editar($acaoAtor){
    $conexao = conexao();
    $id = $acaoAtor->getId();
    $ator = $acaoAtor->getAtor();
    $idAtor = $ator->getId();
    $acao = $acaoAtor->getAcao();
    $idAcao = $acao->getId();
    $titulo = $acaoAtor->getTitulo();
    $justificativa = $acaoAtor->getJustificativa();
    $objetivo = $acaoAtor->getObjetivo();
    $metodologia = $acaoAtor->getMetodologia();
    $resultadoEsperado = $acaoAtor->getResultadoEsperado();
    $impactoEsperado = $acaoAtor->getImpactoEsperado();
    $conexao = conexao();
    $query = "UPDATE acaoator set idator='".$idAtor."', idacao='".$idAcao."', titulo='".$titulo."', justificativa='".$justificativa."',objetivo='".$objetivo."',metodologia='".$metodologia."', resultadoesperado='".$resultadoEsperado."', impactoesperado='".$impactoEsperado."' where id='".$id."'";
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
