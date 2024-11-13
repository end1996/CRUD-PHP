<?php
    require_once "c://xampp/htdocs/ProyectoTareas/controllers/TaskController.php";
    $obj = new TaskController();
    //Utilizamos GET ya que se está mandando ls ruta mediante la URL y de ahi se captura
    $obj->delete($_GET['id']);
