<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


require_once(__DIR__."/vendor/autoload.php");

$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


require_once("./autoload.php");
require_once("./helpers/utils.php");
require_once("./helpers/parameters.php");
require_once("./configs/db.php");


if(isset($_GET["pp"]) && $_GET["pp"]!=null){
    $name_controller=$_GET["pp"]."Controller";
    if(class_exists($name_controller)){

        $controlador=new $name_controller();
        if(method_exists($controlador, $_GET["sp"]) && isset($_GET["tp"]) && $_GET["tp"]!=null){
            $tp=$_GET["tp"];
            $metodo=$_GET["sp"];
            $controlador->$metodo($tp);
        }elseif(isset($_GET["sp"])&& method_exists($controlador, $_GET["sp"])){
            $metodo=$_GET["sp"];
            $controlador->$metodo();
        }elseif(!isset($_GET["sp"]) || $_GET["sp"]==null){
            $metodo=actionDefault;
            $controlador->$metodo();
        }else{
            errorController::index();
        }
    }else{
        $name_controller=controllerDefault;

        $controlador=new $name_controller();
        if(method_exists($controlador,$_GET["pp"]) && isset($_GET["sp"]) && $_GET["sp"]!=null){
            $sp=$_GET["sp"];
            $metodo=$_GET["pp"];
            $controlador->$metodo($sp);
        }elseif(isset($_GET["pp"])&& method_exists($controlador,$_GET["pp"])){
            $metodo=$_GET["pp"];
            $controlador->$metodo();
        }else{
            errorController::index();
        }
    }
}else{
    $name_controller=controllerDefault;
    $metodo=actionDefault;
    $controlador=new $name_controller();
    $controlador->$metodo();
}
?>