<?php
class comida{
    private $id;
    private $nombre;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }


    public function allFood(){
        $query="SELECT * FROM tabla_comida";
        $comidas=$this->db->prepare($query);
        $comidas->execute();
        $result=$comidas->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function idFood(){
        $query="SELECT * FROM tabla_comida WHERE id='{$this->getId()}'";
        $comida=$this->db->prepare($query);
        $comida->execute();
        $result=$comida->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
}
?>