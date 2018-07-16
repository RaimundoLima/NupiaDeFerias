<?php
include("conexao.php");
class AcaoDAO{
  function adicionar($acao){
    $resumo = $acao->getResumo();
    $idResumo = $resumo->getId();
    $eixo = $acao->getEixo();
    $idEixo = $eixo->getId();
    $projeto = $acao->getProjeto();
    $idProjeto = $projeto->getId();
    $titulo = $acao->getTitulo();
    $tema = $acao->getTema();
    $palavraChave = $acao->getPalavraChave();
    $prevInicio = $acao->getPrevInicio();
    $prevTermino = $acao->getPrevTermino();
    $situacao = $acao->getSituacao();
    $conexao = conexao();
    $query = "insert into acao(idresumo ,ideixo, idprojeto, titulo, tema, palavrachave, previnicio, prevtermino, situacao) values('".$idResumo."','".$idEixo."', '".$idProjeto."', '".$titulo."', '".$tema."', '".$palavraChave."', '".$prevInicio."', '".$prevTermino."', '".$situacao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from acao";
    $result = pg_query($conexao, $query);
    $listaAcao = pg_fetch_all($result);
    pg_close($conexao);
    $resumoDAO = new ResumoDAO();
    $eixoDAO = new EixoDAO();
    $projetoDAO = new ProjetoDAO();
    $listaAcaoObj = [];
    for($i=0; $i<count($result); $i++){
      $idResumo = $listaAcao[$i]["idresumo"];
      $resumo = $resumoDAO->obter();
      $idEixo = $listaAcao[$i]["ideixo"];
      $eixo = $eixoDAO->ober($idEixo);
      $idProjeto = $listaAcao[$i]["idprojeto"];
      $projeto = $projetoDAO->obter($idProjeto);
      $titulo = $listaAcao[$i]["titulo"];
      $tema = $listaAcao[$i]["tema"];
      $palavraChave = $listaAcao[$i]["palavrachave"];
      $prevInicio = $listaAcao[$i]["previnicio"];
      $prevTermino = $listaAcao[$i]["prevtermino"];
      $situacao = $listaAcao[$i]["situacao"];
      $acao = new Acao($resumo, $eixo, $projeto, $titulo, $tema, $palavraChave, $prevInicio, $prevTermino, $situacao);
      $listaAcaoObj.append($acao);
    }
    return $listaAcaoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from acao where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $acao = pg_fetch_one($result);
    $resumoDAO = new ResumoDAO();
    $eixoDAO = new EixoDAO();
    $projetoDAO = new ProjetoDAO();
    pg_close($conexao);
    $idResumo = $acao[0]["idresumo"];
    $resumo = $resumoDAO->ober($idResumo);
    $idEixo = $acao[0]["ideixo"];
    $eixo = $eixoDAO->ober($idEixo);
    $idProjeto = $acao[0]["idprojeto"];
    $projeto = $projetoDAO->obter($idProjeto);
    $titulo = $acao[0]["titulo"];
    $tema = $acao[0]["tema"];
    $palavraChave = $acao[0]["palavrachave"];
    $prevInicio = $acao[0]["previnicio"];
    $prevTermino = $acao[0]["prevtermino"];
    $situacao = $acao[0]["situacao"];
    $acaoObj = new Acao($idEixo, $idProjeto, $titulo, $tema, $palavraChave, $prevInicio, $prevTermino, $situacao);
    return $acaoObj;
  }
  function editar($acao){
    $conexao = conexao();
    $resumo = $acao->getResumo();
    $idResumo = $resumo->getId();
    $eixo = $acao->getEixo();
    $idEixo = $eixo->getId();
    $projeto = $acao->getProjeto();
    $idProjeto = $projeto->getId();
    $titulo = $acao->getTitulo();
    $tema = $acao->getTema();
    $palavraChave = $acao->getPalavraChave();
    $prevInicio = $acao->getPrevInicio();
    $prevTermino = $acao->getPrevTermino();
    $situacao = $acao->getSituacao();
    $query = "UPDATE acao set ideixo='".$idEixo."',idprojeto='".$idProjeto."',titulo='".$titulo."',tema='".$tema."',palavrachave='".$palavraChave."', previnicio='".$prevInicio."', prevtermino='".$prevTermino."', situacao='".$situacao."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM acao WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }

}
 ?>
