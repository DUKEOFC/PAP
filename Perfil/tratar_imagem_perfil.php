<?php 

require_once ("../Config/config.php");
//permitir entrar na p�gina s� se estiver logado na sessao
require_once ("../Config/config-sessao.php");
include("../Utilizador/Utilizador.php");

$idUtilizador = $_GET["id"];
$utilizador = new Utilizador();
$utilizador->setIdUtilizador($idUtilizador);
$results = $utilizador->loadById();

header("Content-type: image/jpg");
echo $results[0]['imagem'];

?>