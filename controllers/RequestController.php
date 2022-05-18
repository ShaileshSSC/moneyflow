<?php

session_start();

require '../src/database/db.class.php';

include 'UserController.class.php';
include 'ReserveringController.class.php';
include 'BestellingController.class.php';
include 'MenuController.class.php';

//voor post method
if(isset($_POST['method']))
{
    $method = $_POST['method'];
    $className = $_POST['class'];
    $controller = $className . 'Controller';
    $magazijnController = new $controller();
    $magazijnController->$method((object)$_REQUEST);
}

//voor de get method
if(isset($_GET['method']))
{
    $method = $_GET['method'];
    $className = $_GET['class'];
    $controller = $className . 'Controller';
    $magazijnController = new $controller();
    $magazijnController->$method((object)$_REQUEST);
}


?>