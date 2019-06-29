<?php
header('Content-Type: text/html; charset=iso-8859-1');
require_once ("../Config/config.php");
include("../Utilizador/Utilizador.php");

if (isset($_POST['btn-entrar'])) {
    $erros = array();
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    

    if (empty($username) || empty($senha)) {
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
    } else {
        $utilizador = new Utilizador();
        $results = $utilizador->loadByUsername($username);
		
        if (count($results) > 0) {
            
            $results = $utilizador->login($username, $senha);
            echo 'ovo';
            if (count($results) == 1) {
                echo 'ovo';
                $dados = $results;
                $_SESSION['logado'] = true;
                $_SESSION['id_utilizador'] = $dados[0]['id_utilizador'];
                $_SESSION['nome'] = $dados[0]['primeiro_nome'];
                header('Location: ../Home/home.php');
            } else {
                $erros[] = "<li> Utilizador e/ou senha inválido </li>";
            }
        } else {
            $erros[] = "<li> Utilizador inexistente </li>";
        }
    }
    
    
} 
?>

<!DOCTYPE html>
<html>
<head>
   <title>PÃ¡gina de Login</title>

   <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
   
</head>
<body>

<audio controls="" preload="metadata" style=" width:300px;">
			<source src="../assets/audio/song.mp3" type="audio/mpeg">
		</audio><br />

   <div id="frm_base" class="frm_log_resg">
	   
	  <center> 
	  <h2> LOGIN </h2>
  
	   <form action="login.php" method="post">

	   <p>
	     <label>Username:</label><br>
		 <input type="text" class="inputvalues" placeholders="user" name="username" required="required"/><br>
	   </p>

	   <p>
	     <label>Password:</label><br>
		 <input type="password" class="inputvalues" placeholders="pass" name="senha" required="required"/><br>
	   </p>

	   <p>
		 <input type="submit" id="login_btn" value="Login" name="btn-entrar" /><br>
	   </p>
	   </form>	
	   <p>
		 <button id="register_btn" onclick="window.location.href='../Register/register.php';"/>Register</button>
	   </p>
	   </center> 

   </div>
   
</body>
</html>