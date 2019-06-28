<?php
header('content-type: image/png');
require_once ("../Config/config.php");
require_once ("../Config/config-sessao.php");
include("../Utilizador/Utilizador.php");

$idUtilizador = $_SESSION['id_utilizador'];
isset($_GET['id_utilizador']) ? (int) $_GET['id_utilizador'] : null;
//Valida ID
if (empty($idUtilizador)) {
    echo "ID para alteração não definido.";
    exit;
}

$utilizador = new Utilizador();
$utilizador->setIdUtilizador($idUtilizador);
$disciplinas = $utilizador->loadAllDisciplina();
$professores = $utilizador->loadAllProfessor();
$results = $utilizador->loadById();

$_SESSION['dados_iguais'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Perfil</title>
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
	 
	<center><h1> Perfil </h1> 
	<?php  if ($_SESSION['dados_iguais'] != null) {
	    echo $_SESSION['dados_iguais'];
	}
	$_SESSION['dados_iguais'] = null;
	$a=$results[0]['imagem'];
	?>
    <table>
		<tbody>
			<tr>
				<td colspan="1">
					<form  method="POST" name="form_editar_perfil" action="editar-perfil.php" enctype="multipart/form-data">
						<fieldset>
						
						<label for="imagem">Imagem:</label><br>
						<img src="tratar_imagem_perfil.php?id=<?php echo $results[0]['id_utilizador']; ?>" width="300" height="300" />
                        <input type="file" name="imagem"/>
                        <br/>
						
								<label>Primeiro Nome</label>
								<input name="primeiro-nome"  disabled value="<?php echo utf8_decode($results[0]['primeiro_nome']);?>" type="text"><br>
								<label >Último Nome</label>
								<input name="ultimo-nome"  disabled value="<?php echo utf8_decode($results[0]['ultimo_nome']);?>" type="text"><br>	
								<label >Idade</label>
								<input name="idade"  disabled value="<?php echo utf8_decode($results[0]['idade']);?>" type="text"><br>	
								<label>Username</label>
								<input name="username" required value="<?php echo utf8_decode($results[0]['username']);?>" type="text"><br>
								<label>Email</label>
								<input name="email" disabled value="<?php echo utf8_decode($results[0]['email']);?>" type="email"><br>
								<label>Password Antiga</label>
										<input name="pass-antiga" type="text"><br>
								<label>Password Nova</label>
										<input name="password-nova" type="password"><br>
								<label>Confirme a Password</label>
										<input name="password-confirmar" type="password"><br>
								<label>Sobre mim</label><br>
								<textarea rows="4" cols="50" name="sobremim"><?php echo $results[0]['sobre_utilizador']?></textarea><br>
								<label>Professor preferido</label>
								<select name="professores">
                                                  <?php  
                                                  foreach ($professores as $professor) {
                                                      $idProfessor = $professor['id_professor'];
                                                      $nomeProfessor = $professor['nome'];
                                                    ?>
                                                <option value="<?php echo $idProfessor?>" <?= ($idProfessor == $results[0]['id_professor_preferido'])? 'selected':''?>><?php echo utf8_decode($nomeProfessor)?></option>
                                                <?php }?>
										</select><br>
								<label>Disciplina preferida</label>	
								<select name="disciplinas">
                                                  <?php  
                                                  foreach ($disciplinas as $disciplina) {
                                                      $idDisciplina = $disciplina['id_disciplina'];
                                                      $nomeDisciplina = $disciplina['nome'];
                                                    ?>
                                                <option value="<?php echo $idDisciplina?>" <?= ($idDisciplina == $results[0]['id_disciplina_preferida'])? 'selected':''?>><?php echo utf8_decode($nomeDisciplina)?></option>
                                                <?php }?>
										</select><br>
							<input name="id-utilizador" type="hidden" value="<?php echo $idUtilizador;?>">		
							<a href="">Cancelar</a>
							<input type="submit" name="alterar" value="Alterar"></center>
						</fieldset>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
	
   </center>   
   </div>
   
</body>
</html>