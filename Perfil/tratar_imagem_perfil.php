<?php 

require_once ("../Config/config.php");
//permitir entrar na página só se estiver logado na sessao
require_once ("../Config/config-sessao.php");
include("../Utilizador/Utilizador.php");

$idUtilizador = $_GET["id"];
$utilizador = new Utilizador();
$utilizador->setIdUtilizador($idUtilizador);
$results = $utilizador->loadById();

Header("Content-type: image/gif"); 
echo $results[0]['imagem'];

?>