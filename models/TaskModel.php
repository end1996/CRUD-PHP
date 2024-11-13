<?php
class TaskModel
{
    private $PDO;
    public function __construct()
    {
        require_once("c://xampp/htdocs/ProyectoTareas/config/database.php");
        //Crea una nueva instancia de la clase que contiene la conexion a la base de datos
        $con = new db();
        //Asiganado a una variable se accede a los metodos de la clase
        $this->PDO = $con->conexion();
    }
    public function insertar($titulo, $descripcion, $estado, $fechaCreacion, $fechaVencimiento)
    {
        //Preparando la consulta SQL
        $statement = $this->PDO->prepare("INSERT INTO tasks VALUES (null,:titulo,:descripcion,:estado,:fechaCreacion,:fechaVencimiento)");
        //Se usa bindParam para trabajar con variables definidas como parametros
        $statement->bindParam(":titulo", $titulo, PDO::PARAM_STR); //PARAM_STR sirve para especificar el tipo de dato pero es opcional
        $statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
        $statement->bindParam(":fechaCreacion", $fechaCreacion);
        $statement->bindParam(":fechaVencimiento", $fechaVencimiento);
        //Operador ternario, si la consulta es exitosa se devolverá el último id registrado de lo contrario falso si encontró un problema
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }
    //Función para mostrar solo un registro mediente FETCH
    public function mostrar($id)
    {
        $statement = $this->PDO->prepare("SELECT * FROM tasks WHERE id=:id limit 1");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        //si la consulta no se ejecuta retorna false, si es correcto se asigna el resultando a un array
        //Este tipo de fetch permite acceder al array mediante indice y mediante clave, por defecto es FETCH_ASSOC que solo permite mediante llave
        return ($statement->execute()) ? $statement->fetch(PDO::FETCH_BOTH) : false;
    }
    //FUnción para mostrar todos los registros de la base de datos en el index mediante FETCHALL
    public function index()
    {
        $statement = $this->PDO->prepare("SELECT * FROM tasks");
        return ($statement->execute()) ? $statement->fetchALL(PDO::FETCH_BOTH) : false;
    }

    public function update($id, $titulo, $descripcion, $estado, $fechaCreacion, $fechaVencimiento)
    {
        $statement = $this->PDO->prepare("UPDATE tasks SET titulo = :titulo,descripcion =:descripcion,estado =:estado,fechaCreacion =:fechaCreacion,fechaVencimiento =:fechaVencimiento WHERE id =:id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
        $statement->bindParam(":fechaCreacion", $fechaCreacion);
        $statement->bindParam(":fechaVencimiento", $fechaVencimiento);
        return ($statement->execute()) ? $id : false;
    }

    public function delete($id){
        //id se iguala a un placeholder id el cual se mapea mediante bindparam
        $statement = $this->PDO->prepare("DELETE FROM tasks WHERE id=:id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        //se indica solamente true ya que solo se requiere eliminar un registro mas no retornar algún id
        return ($statement->execute()) ? true : false;//caso contrario la eliminación falle,retorna falso 
    }
}


