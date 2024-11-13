<?php
//Archivo para almacenar los ingresos del usuario en la base de datos
require_once "c://xampp/htdocs/ProyectoTareas/controllers/TaskController.php";
$obj = new TaskController();

$titulo = $_POST['titulo'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$estado = $_POST['estado'] ?? null;
$fechaCreacion = $_POST['fechaCreacion'] ?? null;
$fechaVencimiento = $_POST['fechaVencimiento'] ?? null;

$obj->guardar($titulo, $descripcion, $estado, $fechaCreacion, $fechaVencimiento);
