<?php
header('Content-Type: text/html; charset=iso-8859-1');
require_once ("../Config/config.php");
//permitir entrar na página só se estiver logado na sessao
require_once ("../Config/config-sessao.php");
include("../Utilizador/Utilizador.php");



$primeiroNome = isset($_POST['primeiro-nome'])? $_POST['primeiro-nome'] : null;
$ultimoNome = isset($_POST['ultimo-nome'])? $_POST['ultimo-nome'] : null;
$idade = isset($_POST['idade'])? $_POST['idade'] : null; 
$username = isset($_POST['username'])? $_POST['username'] : null;
$email = isset($_POST['email'])? $_POST['email'] : null;
$passAntiga = isset($_POST['pass-antiga'])? $_POST['pass-antiga'] : null;
$passNova = isset($_POST['password-nova'])? $_POST['password-nova'] : null;
$passConfirmar = isset($_POST['password-confirmar'])? $_POST['password-confirmar'] : null;
$sobremim = isset($_POST['sobremim'])? $_POST['sobremim'] : null;
$professores = isset($_POST['professores'])? $_POST['professores'] : null;
$disciplinas = isset($_POST['disciplinas'])? $_POST['disciplinas'] : null;
$id_utilizador = isset($_POST['id-utilizador'])? $_POST['id-utilizador'] : null;

// atualiza o banco
$utilizador= new Utilizador();
$utilizador->setPrimeiroNome($primeiroNome);
$utilizador->setUltimoNome($ultimoNome);
$utilizador->setIdade($idade);
$utilizador->setUsername($username);
$utilizador->setEmail($email);
$utilizador->setPassword(md5($passNova));
$utilizador->setSobreUtilizador($sobremim);
$utilizador->setProfessorPreferido($professores);
$utilizador->setDisciplinaPreferida($disciplinas);
$utilizador->setIdUtilizador($id_utilizador);

unlink('/PAP2/Uploads/'.$id_utilizador.'.jpeg');
move_uploaded_file($_FILES["imagem"]['tmp_name'], '../Uploads/'.$id_utilizador.'.jpeg');

// }

$stmt = $utilizador->update();  


if($stmt->rowCount() > 0) {
    $_SESSION['dados_iguais'] = "Os seus dados foram salvos com sucesso";
} else {
   $_SESSION['dados_iguais'] = "Não foi alterado nenhum dado no seu perfil!";
}

header('Location: perfil.php');


?>

