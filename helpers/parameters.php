<?php 
$protocol=isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'?'https':'http';

$host=$_SERVER['HTTP_HOST'];

//$uri=$_SERVER['REQUEST_URI'];

$url=$protocol.'://'.$host."/proyectos/PHP/apiPHP-MVC/";

define("URL",$url);
define("controllerDefault","homeController");
define("actionDefault","index");
?>