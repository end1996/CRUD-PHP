<?php
    require_once "c://xampp/htdocs/ProyectoTareas/controllers/TaskController.php";
    $obj = new TaskController();
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $fechaCreacion = $_POST['fechaCreacion'];
    $fechaVencimiento = $_POST['fechaVencimiento'];
    $obj->update($id,$titulo,$descripcion,$estado,$fechaCreacion,$fechaVencimiento);
