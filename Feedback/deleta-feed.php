<?php

require_once ("../Config/config.php");
require_once ("../Config/config-sessao.php");
require_once("Feed.php");
$idFeed = isset($_GET['id']) ? $_GET['id'] : null;
if(isset($_GET['id'])){
    $feed = new Feed();
    $feed->setIdFeed($idFeed);
    $stmt = $feed->delete();
    if ($stmt->rowCount() > 0) {
        header('Location: Feedback.php');
    } else {
        echo "Erro ao remover";
        exit;
    }
}
?>