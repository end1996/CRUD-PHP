<?php
require_once '../config/database.php';

try {
    // Ejecutar una consulta de prueba
    $stmt = $conexion->query("SELECT * FROM tasks LIMIT 1");
    $task = $stmt->fetch();

    if ($task) {
        echo "Conexión y consulta exitosa. Aquí tienes un ejemplo de tarea:<br>";
        echo "Título: " . $task['title'] . "<br>";
        echo "Descripción: " . $task['description'] . "<br>";
    } else {
        echo "Conexión exitosa, pero no se encontraron tareas.";
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

