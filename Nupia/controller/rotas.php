<?php
include('dao.php');
function getPagina(){
	$url = $_SERVER['REQUEST_URI'];
	$url = explode("?",$url);
	$url[0] = strtolower($url[0]);
	$metodo = $_SERVER['REQUEST_METHOD'];
  if(true){
    switch(url[0]){
      case '':
        break;
    }

  }
}
