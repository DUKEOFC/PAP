<?php
include("../Sql/Sql.php");
class Feed {
    
    private $idFeed;
    private $mensagem;
    private $idUtilizador;
    
 
    public function getIdFeed()
    {
        return $this->idFeed;
    }

  
    public function getMensagem()
    {
        return $this->mensagem;
    }


    public function getIdUtilizador()
    {
        return $this->idUtilizador;
    }

  
    public function setIdFeed($idFeed)
    {
        $this->idFeed = $idFeed;
    }

   
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

   
    public function setIdUtilizador($idUtilizador)
    {
        $this->idUtilizador = $idUtilizador;
    }

    public function loadAllFeedbacks() {
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM  feedback");
        return $results;
    }
    
    public function insert() {
        $sql = new Sql();
        return $sql->query("INSERT INTO feedback(mensagem ,utilizador_id) values (:MENSAGEM, :UTILIZADOR_ID)", array(
            ':MENSAGEM'=> $this->getMensagem(),
            ':UTILIZADOR_ID'=>$this->getIdUtilizador()
        ));
        
    }
    
    public function delete() {
        $sql = new Sql();
        return $sql->query("DELETE FROM feedback WHERE feed_id = :ID", array(
            ':ID'=>$this->getIdFeed()
        ));
    }
    
}
?>