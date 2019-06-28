<?php 
require_once '../Sql/Sql.php';
class Utilizador { 

    private $idUtilizador;
    private $primeiroNome;
    private $ultimoNome;
	private $idade;
    private $username;
    private $email;
    private $password;
    private $disciplinaPreferida;
    private $professorPreferido;
    private $sobreUtilizador;
    private $imagem;


    public function getIdUtilizador() {
        return $this->idUtilizador;
    }

    public function setIdUtilizador($value) {
        $this->idUtilizador = $value;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($value) {
        $this->username = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }
    
    public function getPrimeiroNome()
    {
        return $this->primeiroNome;
    }
	
	public function getIdade()
	{
		return $this->idade;
	}
	
	public function setIdade($value)
	{
		$this->idade = $value;
	}
    
    public function getUltimoNome()
    {
        return $this->ultimoNome;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getDisciplinaPreferida()
    {
        return $this->disciplinaPreferida;
    }
    
    public function getProfessorPreferido()
    {
        return $this->professorPreferido;
    }
    
    public function getSobreUtilizador()
    {
        return $this->sobreUtilizador;
    }
    
    public function getImagem()
    {
        return $this->imagem;
    }
    
    public function setPrimeiroNome($primeiroNome)
    {
        $this->primeiroNome = $primeiroNome;
    }
    
    public function setUltimoNome($ultimoNome)
    {
        $this->ultimoNome = $ultimoNome;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function setDisciplinaPreferida($disciplinaPreferida)
    {
        $this->disciplinaPreferida = $disciplinaPreferida;
    }
    
    public function setProfessorPreferido($professorPreferido)
    {
        $this->professorPreferido = $professorPreferido;
    }
    
    public function setSobreUtilizador($sobreUtilizador)
    {
        $this->sobreUtilizador = $sobreUtilizador;
    }
    
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    
    public function loadById() {
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM  utilizador WHERE id_utilizador = :ID", array(
            ":ID"=>$this->getIdUtilizador()
        ));
        return $results;
    }
    
    public function loadByIdParam($id) {
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM  utilizador WHERE id_utilizador = :ID", array(
            ":ID"=>$id
        ));
        return $results;
    }
    
    public function loadAllProfessor() {
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM  professor");
        return $results;
    }
    
    public function loadAllDisciplina() {
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM  disciplina");
        return $results;
    }

    public function loadByUsername($username) {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM  utilizador WHERE username = :USERNAME", array(
            ":USERNAME"=>$username
        ));
        
        return $results;
    }

    public function login($username, $password) {
        
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM  utilizador WHERE username = :USERNAME AND password = :PASSWORD", array(
            ":USERNAME"=>$username,
            ":PASSWORD"=>md5($password)
        ));
        return $results;
    }


    public function insert() {
        $sql = new Sql();

        return $sql->query("INSERT INTO utilizador (primeiro_nome ,ultimo_nome ,username ,email, password) values (:PRIMEIRO_NOME, :ULTIMO_NOME, :USERNAME, :EMAIL, :PASS)", array(

            ':PRIMEIRO_NOME'=> $this->getPrimeiroNome(),
        ':ULTIMO_NOME'=>$this->getUltimoNome(),
        ':USERNAME'=> $this->getUsername(),
        ':EMAIL'=> $this->getEmail(),
        ':PASS'=> $this->getPassword()
        ));
        
    }
	
	public function update() {
        $sql = new Sql();
        
        if ($this->getPassword() != null) {
        return $sql->query("UPDATE utilizador SET username = :USERNAME,
                password = :PASSWORD, sobre_utilizador = :SOBRE,
                id_disciplina_preferida = :DISCIPLINA, id_professor_preferido = :PROFESSOR, 
                imagem=:IMAGEM 
                WHERE id_utilizador = :ID", array(
                ':USERNAME'=>$this->getUsername(),
				':PASSWORD'=>$this->getPassword(),
                ':SOBRE' =>$this->getSobreUtilizador(),
                ':DISCIPLINA'=>$this->getDisciplinaPreferida(),
                ':PROFESSOR'=>$this->getProfessorPreferido(),
                ':IMAGEM' =>$this->getImagem(),
                ':ID'=> $this->getIdUtilizador()
            ));
        } else {
            return $sql->query("UPDATE utilizador SET username = :USERNAME, sobre_utilizador = :SOBRE,
                  id_disciplina_preferida = :DISCIPLINA, id_professor_preferido = :PROFESSOR
                  WHERE id_utilizador = :ID", array(
                ':USERNAME'=>$this->getUsername(),
                ':SOBRE' =>$this->getSobreUtilizador(),
                ':DISCIPLINA'=>$this->getDisciplinaPreferida(),
                ':PROFESSOR'=>$this->getProfessorPreferido(),
                ':ID'=> $this->getIdUtilizador()
              ));
        }
    }

    public function __toString() {
        return json_encode(array(
            "id_utilizador"=>$this->getIdUtilizador(),
            "nome"=>$this->getNome(),
            "username"=>$this->getUsername(),
            "email"=>$this->getEmail(),
            "senha"=>$this->getSenha()
        ));
    }

}
?>