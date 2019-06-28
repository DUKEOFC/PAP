<?php
header('Content-Type: text/html; charset=iso-8859-1');
require_once ("../Config/config.php");
//permitir entrar na página só se estiver logado na sessao
require_once ("../Config/config-sessao.php");
include("../Utilizador/Utilizador.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["imagem"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["alterar"])) {
    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["imagem"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

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

// if ($imagem != null) {
    
// $nomeFinal = time().'.jpg';
// if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)){
    
// $tamanhoImg = filesize($nomeFinal);
// $img = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
// $utilizador->setImagem($img);
// } else {
// $utilizador->setImagem($imagem);
// }
// } else {
$utilizador->setImagem($imagetmp);
// }

$stmt = $utilizador->update();


if($stmt->rowCount() > 0) {
    $_SESSION['dados_iguais'] = "Os seus dados foram salvos com sucesso";
} else {
   $_SESSION['dados_iguais'] = "Não foi alterado nenhum dado no seu perfil!";
}

header('Location: perfil.php');


?>

