<?php
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
    $listaResumoObj = [];
    for($i=0; $i<count($result); $i++){
      $idAtor = $listaAcaoAtor[$i]["idator"];
      $ator = $atorDAO->obter($idAtor);
      $idAcao = $listaAcaoAtor[$i]["idacao"];
      $acao = $acaoDAO->obter($idAcao);
      $titulo = $listaAcaoAtor[$i]["titulo"];
      $justificativa = $listaAcaoAtor[$i]["justificativa"];
      $objetivo = $listaAcaoAtor[$i]["objetivo"];
      $metodologia = $listaAcaoAtor[$i]["metodologia"];
      $resultadoEsperado = $listaAcaoAtor[$id]["resultadoesperado"];
      $impactoEsperado = $listaAcaoAtor[$i]["impactoesperado"];
      $acaoAtor = new AcaoAtor($ator, $acao, $titulo, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
      $listaAcaoAtorObj.append($acaoAtor);
    }
    return $listaAcaoAtorObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from acaoator where id = '".$idAcaoAtor."'";
    $result = pg_query($conexao, $query);
    $acaoAtor = pg_fetch_one($result);
    $atorDAO = new AtorDAO();
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $idAtor = $acaoAtor[$i]["idator"];
    $ator = $atorDAO->obter($idAtor);
    $idAcao = $acaoAtor[$i]["idacao"];
    $acao = $acaoDAO->obter($idAcao);
    $titulo = $acaoAtor[$i]["titulo"];
    $justificativa = $acaoAtor[$i]["justificativa"];
    $objetivo = $acaoAtor[$i]["objetivo"];
    $metodologia = $acaoAtor[$i]["metodologia"];
    $resultadoEsperado = $acaoAtor[$id]["resultadoesperado"];
    $impactoEsperado = $acaoAtor[$i]["impactoesperado"];
    $acaoAtorObj = new AcaoAtor($ator, $acao, $titulo,$justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
    return $AcaoAtorObj;
  }
  function editar($acaoator){
    $conexao = conexao();
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
    $query = "UPDATE acaoator set idator='".$idAtor."', idacao='".$idAcao."', titulo='".$titulo."', idator='".$idAtor."', justificativa='".$justificativa."',objetivo='".$objetivo."',metodologia='".$metodologia."', resultadoesperado='".$resultadoEsperado."', impactoesperado='".$impactoEsperado."'";
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
