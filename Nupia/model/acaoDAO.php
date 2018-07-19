<?php
include_once("../controller/conexao.php");
include_once("acao.php");
include_once("eixoDAO.php");
include_once("projetoDAO.php");
include_once("resumoDAO.php");
class AcaoDAO{
  function adicionar($acao){
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
    $query = "insert into acao(ideixo, idprojeto, titulo, tema, palavrachave, previnicio, prevtermino, situacao) values('".$idResumo."','".$idEixo."', '".$idProjeto."', '".$titulo."', '".$tema."', '".$palavraChave."', '".$prevInicio."', '".$prevTermino."', '".$situacao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from acao";
    $result = pg_query($conexao, $query);
    $listaAcao = pg_fetch_all($result);
    pg_close($conexao);
    $eixoDAO = new EixoDAO();
    $projetoDAO = new ProjetoDAO();
    $listaAcaoObj = [];
    for($i=0; $i<count($listaAcao); $i++){
      $id = $listaAcao[$i]["id"];
      $idEixo = $listaAcao[$i]["ideixo"];
      $eixo = $eixoDAO->obter($idEixo);
      $idProjeto = $listaAcao[$i]["idprojeto"];
      $projeto = $projetoDAO->obter($idProjeto);
      $titulo = $listaAcao[$i]["titulo"];
      $tema = $listaAcao[$i]["tema"];
      $palavraChave = $listaAcao[$i]["palavrachave"];
      $prevInicio = $listaAcao[$i]["previnicio"];
      $prevTermino = $listaAcao[$i]["prevtermino"];
      $situacao = $listaAcao[$i]["situacao"];
      $acao = new Acao($eixo, $projeto, $titulo, $tema, $palavraChave, $prevInicio, $prevTermino, $situacao, $id);
      array_push($listaAcaoObj, $acao);
    }
    return $listaAcaoObj;
  }
  function obter($id){
    $conexao = conexao();
    $query = "select * from acao where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $acao = pg_fetch_all($result);
    $eixoDAO = new EixoDAO();
    $projetoDAO = new ProjetoDAO();
    pg_close($conexao);
    $id = $acao[0]["id"];
    $idEixo = $acao[0]["ideixo"];
    $eixo = $eixoDAO->obter($idEixo);
    $idProjeto = $acao[0]["idprojeto"];
    $projeto = $projetoDAO->obter($idProjeto);
    $titulo = $acao[0]["titulo"];
    $tema = $acao[0]["tema"];
    $palavraChave = $acao[0]["palavrachave"];
    $prevInicio = $acao[0]["previnicio"];
    $prevTermino = $acao[0]["prevtermino"];
    $situacao = $acao[0]["situacao"];
    $acaoObj = new Acao($eixo, $projeto, $titulo, $tema, $palavraChave, $prevInicio, $prevTermino, $situacao, $id);
    return $acaoObj;
  }
  function editar($acao){
    $conexao = conexao();
    $id = $acao->getId();
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
    $query = "UPDATE acao set ideixo='".$idEixo."',idprojeto='".$idProjeto."',titulo='".$titulo."',tema='".$tema."',palavrachave='".$palavraChave."', previnicio='".$prevInicio."', prevtermino='".$prevTermino."', situacao='".$situacao."' where id='".$id."' where id='".$id."'";
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
