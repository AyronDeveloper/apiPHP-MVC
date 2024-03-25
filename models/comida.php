<?php
class Comida{
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

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setImagen($imagen){
        $this->imagen=$imagen;
    }
    public function getImagen(){
        return $this->imagen;
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

    public function createFood(){
        $query="INSERT INTO tabla_comida VALUE(null,:nombre,:imagen)";
        $insert=$this->db->prepare($query);

        $insert->bindParam(":nombre",$this->nombre);
        $insert->bindParam(":imagen",$this->imagen);
        $execute=$insert->execute();

        $result=false;

        if($execute)$result=true;

        return $result;
    }

    public function updateFood(){
        $query="UPDATE tabla_comida SET nombre=?, imagen=? WHERE id=?";
        $update=$this->db->prepare($query);

        $execute=$update->execute([$this->getNombre(),$this->getImagen(),$this->getId()]);

        $result=false;
        if($execute)$result=true;

        return $result;
    }

    public function deleteFood(){
        $query="DELETE FROM tabla_comida WHERE id='{$this->getId()}' ";
        $delete=$this->db->prepare($query);

        $execute=$delete->execute();

        $result=false;
        if($execute)$result=true;

        return $result;
    }
}
?>