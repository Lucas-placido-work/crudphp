<?php
require_once 'includes/contatoController.php';

$controller = new ContatoController();

$action = $_GET['action'] ?? 'read';
$data = $_POST;

switch ($action) {
    case 'create':
        echo $controller->create($data);
        break;
    case 'read':
        echo $controller->read();
        break;
    case 'update':
        parse_str(file_get_contents("php://input"), $data);
        echo $controller->update($data);
        break;
    case 'delete':
        // $id = $_GET['id'] ?? null;
        // echo $controller->delete($id);
        break;
    default:
        // echo $controller->read();
        break;
}
?>