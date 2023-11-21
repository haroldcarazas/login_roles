<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/LoginController.php");

// ENRUTADOR
$loginController = new LoginController();

// Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /clientes?id=1
$route = explode("?", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];


if ($method === "POST") {
    switch ($route[0]) {
        case '/login':
            $loginController->login($_POST["correo"]);
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

if ($method === "GET") {
    switch ($route[0]) {
        case '/index.php':
            $loginController->index();
            break;
        case '/dashboard':
            $loginController->dashboard();
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}