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

        echo json_encode($create);
    }

    public function actualizarComida($id){
        $classComida=new Comida();

        $classComida->setId($id);
        $classComida->setNombre($_POST["nombre"]);
        $classComida->setImagen($_POST["imagen"]);

        $update=$classComida->updateFood();

        echo json_encode($update);
    }

    public function eliminarComida($id){
        $classComida=new Comida();

        $classComida->setId($id);

        $delete=$classComida->deleteFood();

        echo json_encode($delete);
    }
}
?>