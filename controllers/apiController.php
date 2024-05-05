<?php
require_once("./models/comida.php");

class apiController{
    public function index(){
        echo "Inicio del index";
    }

    public function comidas($id=null){
        $classComida=new Comida();

        if($id==null){
            $comidas=$classComida->allFood();

            echo json_encode($comidas, JSON_UNESCAPED_UNICODE);
        }else{
            $classComida->setId($id);
            $comida=$classComida->idFood();

            echo json_encode($comida, JSON_UNESCAPED_UNICODE);
        }
    }

    public function crearComida(){
        $classComida=new Comida();

        $classComida->setNombre($_POST["nombre"]);
        $classComida->setImagen($_POST["imagen"]);

        $create=$classComida->createFood();

        $result=false;
        if($create) $result=true;

        echo json_encode(["result"=>$result]);
    }

    public function actualizarComida($id){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $classComida=new Comida();

            //$data = json_decode(file_get_contents("php://input"), true);
            //var_dump($data);
            
            $classComida->setId($id);
            $classComida->setNombre($_POST["nombre"]);
            $classComida->setImagen($_POST["imagen"]);
    
            $update=$classComida->updateFood();
    
            $result=false;
            if($update) $result=true;
    
            echo json_encode(["result"=>$result]);
        }
    }

    public function eliminarComida($id){
        if($_SERVER["REQUEST_METHOD"]=="DELETE"){
            $classComida=new Comida();
    
            $classComida->setId($id);
    
            $delete=$classComida->deleteFood();
    
            $result=false;
            if($delete) $result=true;
    
            echo json_encode(["result"=>$result]);
        }else{

        }
    }
}
?>