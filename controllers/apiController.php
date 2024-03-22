<?php
require_once("./models/comida.php");

class apiController{
    public function index(){
        echo "Inicio del index";
    }
    public function comidas($id=null){
        $classComida=new comida();

        if($id==null){
            $comidas=$classComida->allFood();
            echo json_encode($comidas, JSON_UNESCAPED_UNICODE);
        }else{
            $classComida->setId($id);
            $comida=$classComida->idFood();

            echo json_encode($comida, JSON_UNESCAPED_UNICODE);
        }
    }
}
?>