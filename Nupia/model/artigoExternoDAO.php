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
    $acaoAcaoAtor = pg_fetch_one($result);
    $acaoDAO = new AcaoDAO();
    pg_close($conexao);
    $idAcao = $listaAcaoAtor[$i]["idacao"];
    $acao = $acaoDAO->obter($idAcao);
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
