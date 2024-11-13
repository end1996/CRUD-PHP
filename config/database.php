<?php
// Datos de la base de datos
class db {
  private $host = 'localhost:3307';
  private $dbname = 'dbgestiontareas';
  private $user = 'root';
  private $password = '';
  public function conexion(){
    try {
      // Crear una instancia de la clase PDO
      $conexion = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
    
      // Configuración adicional (opcional)
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $conexion;
    
    } catch (PDOException $e) {
      echo "Error de conexión: " . $e->getMessage();
      return null;
    }
  }
}
