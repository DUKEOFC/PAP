<?php
require_once ("../Config/config.php");
require_once ("../Config/config-sessao.php");
require_once '../Inscricao/Inscricao.php';

$formulario = new Inscricao();

if (isset($_POST['enviar'])) {
    $erros = array();
    $nomeCompleto = isset($_POST['nomecomp']) && ! empty($_POST['nomecomp']) ? $_POST['nomecomp'] : null;
    $idade = isset($_POST['datanasc']) && ! empty($_POST['datanasc']) ? $_POST['datanasc'] : null;
    $morada = isset($_POST['morada']) && ! empty($_POST['morada']) ? $_POST['morada'] : null;
    $codigoPostal = isset($_POST['codigopostal']) && ! empty($_POST['codigopostal']) ? $_POST['codigopostal'] : null;
    $localidade = isset($_POST['localidade']) && ! empty($_POST['localidade']) ? $_POST['localidade'] : null;
    $identificacao = isset($_POST['identificacao']) && ! empty($_POST['identificacao']) ? $_POST['identificacao'] : null;
    $contacto = isset($_POST['Contato']) && ! empty($_POST['Contato']) ? $_POST['Contato'] : null;
    $email = isset($_POST['email']) && ! empty($_POST['email']) ? $_POST['email'] : null;
    $escolhacurso = isset($_POST['escolhacurso']) && ! empty($_POST['escolhacurso']) ? $_POST['escolhacurso'] : null;
    $aptidoes = isset($_POST['aptidoes']) && ! empty($_POST['aptidoes']) ? $_POST['aptidoes'] : null;
    $escola_ano_anterior = isset($_POST['escolaanoanterior']) && ! empty($_POST['escolaanoanterior']) ? $_POST['escolaanoanterior'] : null;
    $outraMorada = isset($_POST['morada2']) && ! empty($_POST['morada2']) ? $_POST['morada2'] :  null;
    $outroCodigoPostal = isset($_POST['codigopostal2']) && ! empty($_POST['codigopostal2']) ? $_POST['codigopostal2'] : null;
    $outraLocalidade = isset($_POST['Outralocalidade']) && ! empty($_POST['Outralocalidade']) ? $_POST['Outralocalidade'] : null;
    $nomeEncarregadoCompleto = isset($_POST['nomecompenc']) && ! empty($_POST['nomecompenc']) ? $_POST['nomecompenc'] : null;
    $contactoEncarregado = isset($_POST['ContatoEncarregado']) && ! empty($_POST['ContatoEncarregado']) ? $_POST['ContatoEncarregado'] : null;
    $emailEncarregado = isset($_POST['EmailEncarregado']) && ! empty($_POST['EmailEncarregado']) ? $_POST['EmailEncarregado'] : null;
    
    
    
    $validacao = $nomeCompleto != null && $idade != null && $morada != null && $codigoPostal != null && $localidade != null && $identificacao != null && $contacto != null && $email != null;
    if ($validacao) {
            $inscricao = new Inscricao();
            $inscricao->setNome_completo($nomeCompleto);
            $inscricao->setIdade(intval($idade));
            $inscricao->setMorada($morada);
            $inscricao->setCodigo_postal($codigoPostal);
            $inscricao->setLocalidade($localidade);
            $inscricao->setIdentificacao($identificacao);
            $inscricao->setContacto($contacto);
            $inscricao->setEmail($email);
            $inscricao->setEscolha_do_curso($escolhacurso);
            $inscricao->setAptidoes($aptidoes);
            $inscricao->setEscola_ano_anterior($escola_ano_anterior);
            $inscricao->setOutra_morada($outraMorada);
            $inscricao->setOutro_codigo_postal($outroCodigoPostal);
            $inscricao->setOutra_localidade($outraLocalidade);
            $inscricao->setNome_completo_encarregado($nomeEncarregadoCompleto);
            $inscricao->setContacto_encarregado($contactoEncarregado);
            $inscricao->setEmail_encarregado($emailEncarregado);
            $inscricao->setId_utilizador($_SESSION['id_utilizador']);
            
            
        
    }else{
        $erros[] = "<li> Favor preencher os dados </li>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
        <title>--Formulário Contato--</title>
    <meta charset="utf-8" />
    <!--   <link href="ContatoEstilo.css" rel="stylesheet" media="all" />
    <script src="JavaScript1.js"></script>-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/estiloie.css">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</style>
</head>
<center>
<body>

	 <?php
		include_once "../Menu/Menu.php"; 
	 ?>

 <?php
if (isset($_POST['enviar'])) {
    echo "<br>";
    if ($validacao) {
        $stmt = $inscricao->insert();
        if ($stmt->rowCount() > 0) {
            header('Location: ../Home/Home.php');
        } else {
            echo "Erro ao registar-se!";
        }
    }
}
?>

    <form name="Form_Curso" method ="post" action = "formulario.php">
	
	<table>
    <tr>
	
	<p>	
	<img src="ael_logo.png" style="float:left;width:200px;height:100px;">
	
	<img src="download.jpg" style="float:right;width:200px;height:100px;">	
	
	    <h1>ESCOLA SECUNDÃ�RIA D.PEDRO V<h1>
		
		<h2>PrÃ©-inscriÃ§Ã£o para o curso de TGPSI</h2>	
    </p>
	

        <fieldset>
        <fieldset>	
		<legend>"Introduza os seus dados"</legend>
 
        <p class="nomecomp">
		    <label for="nomecomp">Nome completo*</label>
            <input type="text" id="nomecompid" placeholder="Nome completo" required="required" name="nomecomp" />
        </p>
	
		<p class="datanasc">
		    <label for="datanasc">Idade*</label>
            <input type="text" id="datanascid" placeholder="Idade" required="required" name="datanasc" />
        </p>
		
		<p class="morada">
		    <label for="morada">A sua Morada*</label>
            <input type="text" id="moradaid" placeholder="Morada" required="required" name="morada" />
        </p>
		
		<p class="codigopostal">
		    <label for="codigopostal">CÃ³digo Postal*</label>
            <input type="text" id="codigopostalid" placeholder="xxxx-xxx" required="required" name="codigopostal" />
        </p>
		
		<p class="localidade">
		    <label for="localidade">Localidade*</label>
            <input type="text" id="localidadeid" placeholder="Localidade" required="required" name="localidade" />
        </p>
		
		 <p class="Identificacao (BI/CC)">
		    <label for="identificacao">Identificacao*</label>
            <input type="text" id="identificacaoid" placeholder="xxxxxxxx" required="required" name="identificacao" />
        </p>
		
		 <p class="contato">
		    <label for="contato">Contato*</label>
            <input type="text" id="contatoid" placeholder="xxx-xxx-xxx" required="required" name="Contato" />
        </p>
		
        <p>
		    <label for="email">Email*</label>
            <input type="email" id="emailid" placeholder="xxxx@gmail.com" required="required" name="email" />
        </p>
		
        <p>
		    <label for="escolha">Escolha do Curso*</label>
	    </p>
		
		<p>
            <textarea placeholder="Fala Sobre os motivos da escolha do curso" required="required" name="escolhacurso"></textarea>
        </p>
		
		<p>
		    <label for="aptidÃµes">As tuas Aptidoes*</label>
	    </p>
		
		<p>
            <textarea placeholder="Fala um pouco sobre as tuas aptidoes" required="required" name="aptidoes"></textarea>
        </p>
		
		<p>
		    <label for="escola">A tua Escola e Ano anterior*</label>
	    </p>
		
		<p>
            <textarea placeholder="Indica de que escola e ano lÃ©tivo vieste" required="required" name="escolaanoanterior" ></textarea>
        </p>
	
        </fieldset>
		
		<fieldset>
		<legend>"Se tiver outra morada"</legend>
		
		<p class="morada2">
		    <label for="morada2">Outra Morada</label>
            <input type="text" id="morada2id" placeholder="Outra Morada" name="morada2" />
        </p>
		
		<p class="codigopostal2">
		    <label for="codigopostal2"> Outro CÃ³digo Postal</label>
            <input type="text" id="codigopostal2id" placeholder="Outro xxxx-xxx" name="codigopostal2" />
        </p>
		
		<p class="localidade2">
		    <label for="localidade2">Outra Localidade</label>
            <input type="text" id="localidade2id" placeholder="Localidade2" name="Outralocalidade" />
        </p>
		</fieldset>
		
		<fieldset>
		<legend>"Se fores menor introduz os dados do teu encarregado de educaÃ§Ã£o"</legend>
		
		<p class="nomecompenc">
		    <label for="nomecompenc">Nome completo do Encarregado</label>
            <input type="text" id="nomecompencid" placeholder="Nome do Encarregado" name="nomecompenc" />
        </p>
		
	    <p class="contatoenc">
		    <label for="contatoenc">Contato do Encarregado</label>
            <input type="text" id="contatoencid" placeholder="xxx-xxx-xxx" name="ContatoEncarregado" />
        </p>
		
        <p>
		    <label for="emailenc">Email do Encarregado</label>
            <input type="emailenc" id="emailencid" placeholder="xxxx@gmail.com" name="EmailEncarregado" />
        </p>
       
		
        <p class="submit">
            <input type="submit" name="enviar" onclick="verificarIdade();" value="Enviar" />
        </p>
		</fieldset>
		
</fieldset>

</tr>
</table>
		
</form>
</body>
</center>

<script type="text/javascript">
function verificarIdade() {
  var idade = Form_Curso.datanasc.value;
  var campoValor = document.getElementById('datanascid');
  
  if (!isNaN(parseFloat(idade)) && isFinite(idade)) {
	  campoValor.setCustomValidity("");
  } else {
	  campoValor.setCustomValidity("Preencha o campo com valor numérico!");
  }
};    
</script>

</html>
