<?php
require_once ("../Config/config.php");
require_once ("../Config/config-sessao.php");
require_once("Feed.php");
require_once '../Utilizador/Utilizador.php';

$feedback = new Feed();
$feedbacks = $feedback->loadAllFeedbacks();
$utilizadorAtual = $_SESSION['id_utilizador'];
//17 é o id do admin
$_SESSION['admin'] = 17;
$admin = $_SESSION['admin'];

if (isset($_POST['feedback'])) {
    echo "<br>";
    $mensagem = isset($_POST['mensagem']) && ! empty($_POST['mensagem']) ? $_POST['mensagem'] : null;
    $validacao = $mensagem != null;
    if ($validacao) {
        $feed = new Feed();
        $feed->setMensagem($mensagem);
        $feed->setIdUtilizador($utilizadorAtual);
        $stmt = $feed->insert();
        if ($stmt->rowCount() > 0) {
            header('Location: ../Feedback/Feedback.php');
        } else {
            echo "Favor preencher!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Feedback</title>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<link href="http://fonts.googleapis.com/css?family=Arimo:400" rel="stylesheet">
</head>
<body>

   <div id="frm_base">
	 
	 <?php
		include_once "../Menu/Menu.php"; 
	 ?>
	 
	<center><h1> Feedback </h1></center> 
    
 	<form action="Feedback.php" method="post">
     	<center><textarea rows="10" cols="100" name="mensagem"></textarea></center><br>
     	<center><button type="submit" name="feedback">Comentar</button></center>
 	</form>
 	
	<table id="table_base">
		<?php  
		$u = new Utilizador();
		foreach ($feedbacks as $feedback) {
            ?>
            <tr>
				<td><?php echo  isset($feedback['utilizador_id'])?$u->loadByIdParam($feedback['utilizador_id'])[0]['username']:null ?></td>
		
				<td><?php echo $feedback['mensagem']?></td> 
				<?php
				
				if ($feedback['utilizador_id'] == $utilizadorAtual || $utilizadorAtual == $admin) {?>
				<td><a href="deleta-feed.php?id=<?php echo $feedback['feed_id'] ?>">Remover</a></td>
				<?php }?>
  			</tr>
        <?php }?>
	</table>
   
   </div>
   
</body>
</html>