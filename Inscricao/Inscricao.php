<?php 
include("../Sql/Sql.php");
class Inscricao { 

    private $idFormulario;
    private $nome_completo;
    private $idade;
	private $morada;
    private $codigo_postal;
    private $localidade;
    private $identificacao;
    private $contacto;
    private $email;
    private $escolha_do_curso;
    private $aptidoes;
    private $escola_ano_anterior;
    private $outra_morada;
    private $outro_codigo_postal;
    private $outra_localidade;
    private $nome_completo_encarregado;
    private $contacto_encarregado;
    private $email_encarregado;
    private $id_utilizador;


    public function getId_utilizador()
    {
        return $this->id_utilizador;
    }

    public function setId_utilizador($id_utilizador)
    {
        $this->id_utilizador = $id_utilizador;
    }

    public function getIdFormulario()
    {
        return $this->idFormulario;
    }

 
    public function getNome_completo()
    {
        return $this->nome_completo;
    }

 
    public function getIdade()
    {
        return $this->idade;
    }

 
    public function getMorada()
    {
        return $this->morada;
    }

 
    public function getCodigo_postal()
    {
        return $this->codigo_postal;
    }


    public function getLocalidade()
    {
        return $this->localidade;
    }

 
    public function getIdentificacao()
    {
        return $this->identificacao;
    }


    public function getContacto()
    {
        return $this->contacto;
    }

 
    public function getEmail()
    {
        return $this->email;
    }

 
    public function getEscolha_do_curso()
    {
        return $this->escolha_do_curso;
    }


    public function getAptidoes()
    {
        return $this->aptidoes;
    }

 
    public function getEscola_ano_anterior()
    {
        return $this->escola_ano_anterior;
    }


    public function getOutra_morada()
    {
        return $this->outra_morada;
    }


    public function getOutro_codigo_postal()
    {
        return $this->outro_codigo_postal;
    }


    public function getOutra_localidade()
    {
        return $this->outra_localidade;
    }

 
    public function getNome_completo_encarregado()
    {
        return $this->nome_completo_encarregado;
    }

 
    public function getContacto_encarregado()
    {
        return $this->contacto_encarregado;
    }

 
    public function getEmail_encarregado()
    {
        return $this->email_encarregado;
    }

  
    public function setIdFormulario($idFormulario)
    {
        $this->idFormulario = $idFormulario;
    }


    public function setNome_completo($nome_completo)
    {
        $this->nome_completo = $nome_completo;
    }


    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

 
    public function setMorada($morada)
    {
        $this->morada = $morada;
    }


    public function setCodigo_postal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;
    }

 
    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
    }

 
    public function setIdentificacao($identificacao)
    {
        $this->identificacao = $identificacao;
    }


    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    }

 
    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function setEscolha_do_curso($escolha_do_curso)
    {
        $this->escolha_do_curso = $escolha_do_curso;
    }


    public function setAptidoes($aptidoes)
    {
        $this->aptidoes = $aptidoes;
    }


    public function setEscola_ano_anterior($escola_ano_anterior)
    {
        $this->escola_ano_anterior = $escola_ano_anterior;
    }

 
    public function setOutra_morada($outra_morada)
    {
        $this->outra_morada = $outra_morada;
    }


    public function setOutro_codigo_postal($outro_codigo_postal)
    {
        $this->outro_codigo_postal = $outro_codigo_postal;
    }

    public function setOutra_localidade($outra_localidade)
    {
        $this->outra_localidade = $outra_localidade;
    }

 
    public function setNome_completo_encarregado($nome_completo_encarregado)
    {
        $this->nome_completo_encarregado = $nome_completo_encarregado;
    }


    public function setContacto_encarregado($contacto_encarregado)
    {
        $this->contacto_encarregado = $contacto_encarregado;
    }


    public function setEmail_encarregado($email_encarregado)
    {
        $this->email_encarregado = $email_encarregado;
    }

    public function insert() {
        $sql = new Sql();
       
        return $sql->query("INSERT INTO formulario (nome_completo ,idade ,morada 
            ,codigo_postal , localidade, identificacao, contacto, email, escolha_do_curso
            , aptidoes, escola_ano, outra_morada, outro_codigo_postal
            , outra_localidade, nome_completo_encarregado, contacto_encarregado, email_encarregado, id_utilizador) 
            values (:NOME_COMPLETO, :IDADE, :MORADA, :CODIGO_POSTAL, :LOCALIDADE, :IDENTIFICACAO
            , :CONTACTO, :EMAIL, :CURSO, :APTIDOES, :ESCOLA_ANO_ANTERIOR
            , :OUTRA_MORADA, :OUTRO_CODIGO_POSTAL, :OUTRA_LOCALIDADE, :NOME_ENCARREGADO_EDUCACAO
            , :CONTACTO_ENCARREGADO, :EMAIL_ENCARREGADO, :ID_UTILIZADOR)", array(
            
            ':NOME_COMPLETO' => $this->getNome_completo(), 
            ':IDADE' => $this->getIdade(),
            ':MORADA' => $this->getMorada(), 
            ':CODIGO_POSTAL' => $this->getCodigo_Postal(),
            ':LOCALIDADE' => $this->getLocalidade(), 
            ':IDENTIFICACAO' => $this->getIdentificacao(), 
            ':CONTACTO'=> $this->getContacto(), 
            ':EMAIL' => $this->getEmail(),
            ':CURSO' => $this->getEscolha_do_curso(),
            ':APTIDOES' => $this->getAptidoes(), 
            ':ESCOLA_ANO_ANTERIOR' => $this->getEscola_ano_anterior(), 
            ':OUTRA_MORADA' => $this->getOutra_morada(), 
            ':OUTRO_CODIGO_POSTAL' => $this->getOutro_codigo_postal(),
            ':OUTRA_LOCALIDADE' => $this->getOutra_localidade(), 
            ':NOME_ENCARREGADO_EDUCACAO' => $this->getNome_completo_encarregado(), 
            ':CONTACTO_ENCARREGADO' => $this->getContacto_Encarregado(), 
            ':EMAIL_ENCARREGADO' => $this->getEmail_encarregado(),
            ':ID_UTILIZADOR' => $this->getId_utilizador()
        ));
        
    }
    
}
    ?>