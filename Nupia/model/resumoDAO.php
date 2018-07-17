<?php
class ResumoDAO{
  function adicionar($resumo){
    $titulo = $resumo->getTitulo();
    $ator = $resumo->getAtor();
    $idAtor = $ator->getId();
    $justificativa = $resumo->getJustificativa();
    $objetivo = $resumo->getObjetivo();
    $metodologia = $resumo->getMetodologia();
    $resultadoEsperado = $resumo->getResultadoEsperado();
    $impactoEsperado = $resumo->getImpactoEsperado();
    $conexao = conexao();
    $query = "insert into resumo(titulo, idator, justificativa, objetivo, metodologia, resultadoesperado, impactoesperado) values('".$titulo."', '".$idAtor."', '".$justificativa."', '".$objetivo."', '".$metodologia."', '".$resultadoEsperado."', '".$impactoEsperado."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from resumo";
    $result = pg_query($conexao, $query);
    $listaResumo = pg_fetch_all($result);
    $atorDAO = new AtorDAO();
    pg_close($conexao);
    $listaResumoObj = [];
    for($i=0; $i<count($result); $i++){
      $titulo = $listaResumo[$i]["titulo"];
      $idAtor = $listaResumo[$i]["idator"];
      $ator = $AtorDAO->obter($idAtor);
      $justificativa = $listaResumo[$i]["justificativa"];
      $objetivo = $listaResumo[$i]["objetivo"];
      $metodologia = $listaResumo[$i]["metodologia"];
      $resultadoEsperado = $listaResumo[$id]["resultadoesperado"];
      $impactoEsperado = $listaResumo[$i]["impactoesperado"];
      $resumo = new Resumo($titulo, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
      $listaResumoObj.append($resumo);
    }
    return $listaResumoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from resumo where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $resumo = pg_fetch_one($result);
    $atorDAO = new AtorDAO();
    pg_close($conexao);
    $titulo = $resumo[$i]["titulo"];
    $idAtor = $resumo[$i]["idator"];
    $ator = $atorDAO->obter($idAtor);
    $justificativa = $resumo[$i]["justificativa"];
    $objetivo = $resumo[$i]["objetivo"];
    $metodologia = $resumo[$i]["metodologia"];
    $resultadoEsperado = $resumo[$id]["resultadoesperado"];
    $impactoEsperado = $resumo[$i]["impactoesperado"];
    $resumoObj = new Resumo($titulo, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
    return $resumoObj;
  }
  function editar($resumo){
    $conexao = conexao();
    $titulo = $resumo->getTitulo();
    $ator = $resumo->getAtor();
    $idAtor = $ator->getId();
    $justificativa = $resumo->getJustificativa();
    $objetivo = $resumo->getObjetivo();
    $metodologia = $resumo->getMetodologia();
    $resultadoEsperado = $resumo->getResultadoEsperado();
    $impactoEsperado = $resumo->getImpactoEsperado();
    $query = "UPDATE resumo set titulo='".$titulo."', idator='".$idAtor."', justificativa='".$justificativa."',objetivo='".$objetivo."',metodologia='".$metodologia."', resultadoesperado='".$resultadoEsperado."', impactoesperado='".$impactoEsperado."'";
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
