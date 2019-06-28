<?php 
header('Content-Type: text/html; charset=iso-8859-1');
require_once ("../Config/config.php");
include("../Utilizador/Utilizador.php");

if (isset($_POST['register'])) {
    $erros = array();
    $primeiro_nome = isset($_POST['primeiro_nome']) && ! empty($_POST['primeiro_nome']) ? $_POST['primeiro_nome'] : null;
    $ultimo_nome = isset($_POST['ultimo_nome']) && ! empty($_POST['ultimo_nome']) ? $_POST['ultimo_nome'] : null;
    $username = isset($_POST['username']) && ! empty($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) && ! empty($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) && ! empty($_POST['password']) ? $_POST['password'] : null;
    $repetir_password = isset($_POST['repetir_pass']) && ! empty($_POST['repetir_pass']) ? $_POST['repetir_pass'] : null;

    $validacao = $primeiro_nome != null && $ultimo_nome != null && $username != null && $email != null && $password != null && $repetir_password != null;

    if ($validacao) {
    if( $password == $repetir_password) {
        $utilizador = new Utilizador();
        $utilizador->setPrimeiroNome($primeiro_nome);
        $utilizador->setUltimoNome($ultimo_nome);
        $utilizador->setUsername($username);
        $utilizador->setEmail($email);
        $utilizador->setPassword(md5($password));
        } else {
        	$erros[] = "<li> Dados incorretos da password </li>";
        }
        
    }else{
        $erros[] = "<li> Favor preencher os dados </li>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
   <title>Página de Register</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"> 
</head>
<body>
 <?php
if (isset($_POST['register'])) {
    echo "<br>";
    if ($validacao) {
        $stmt = $utilizador->insert();
        if ($stmt->rowCount() > 0) {
            header('Location: ../Login/login.php');
        } else {
            echo "Erro ao registar-se!";
        }
    }
}
?>

<audio controls="" preload="metadata" style=" width:300px;">
			<source src="../assets/audio/song.mp3" type="audio/mpeg">
		</audio><br /> 

   <div id="frm_base" class="frm_log_resg">
	 
	 <center><h1> REGISTER </h1> 

	 <form action="register.php" method="post">
	
	   <p>
	     <label>Primeiro Nome:</label><br>
		 <input name="primeiro_nome" type="text" class="inputvalues" placeholder="Primeiro nome" required="required"/><br>
		 </p>
	   <p>
	     <label>Ultimo Nome:</label><br>
		 <input name="ultimo_nome" type="text" class="inputvalues" placeholder="Ultimo nome" required="required"/><br>
		 </p>
	   <p>
	     <label>Username:</label><br>
		 <input name="username" type="text" class="inputvalues" placeholder="Username" required="required"/><br>
	   </p>
	    <p>
	     <label>Email:</label><br>
		 <input name="email" type="text" class="inputvalues" placeholder="email" required="required"/><br>
	   </p>
	   <p>
	     <label>Password:</label><br>
		 <input name="password" type="password" class="inputvalues" placeholder="Password" required="required"/><br>
	   </p>
	    <p>
	     <label>Repetir Password:</label><br>
		 <input name="repetir_pass" type="password" class="inputvalues" placeholder="Repetir password" required="required"/><br>
	   </p>
	   <p>
		 <input name="register" type="submit" id="register_btn" value="Register" /><br>
	   </p>

	   <p>
		 <button id="backlog_btn" onclick="window.location.href='../Login/login.php';"/>Voltar ao Login</button>
	   </p>

    </form>
    </center>
   </div>
   
</body>
</html>