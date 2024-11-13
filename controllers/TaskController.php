<?php

class TaskController
{
    private $model;//Definiendo variable
    //Constructor de la clase
    public function __construct()
    {
        //Importante el modelo
        require_once "c://xampp/htdocs/ProyectoTareas/models/TaskModel.php";
        //Creando una nueva instancia del modelo y asignandolo a la variable
        $this->model = new TaskModel();
    }

    public function guardar($titulo, $descripcion, $estado, $fechaCreacion, $fechaVencimiento)
    {
        //Insertar valores en la base de datos
        $id = $this->model->insertar($titulo, $descripcion, $estado, $fechaCreacion, $fechaVencimiento);
        //Si el id es true previamente definida en el modelo, se envía al view show
        if ($id != false) {
            header("Location:show.php?id=" . $id);
            //de lo contrario se muestra la vista create
        } else {
            header("Location:create.php");
        }
    }

    public function mostrar($id)
    {
        //si el id consultado está en la base de datos se muestra, de lo contrario se envía al inicio
        return ($this->model->mostrar($id) != false) ? $this->model->mostrar($id) : header("Location:index.php");
    }

    public function index(){
        return ($this->model->index()) != false ? $this->model->index() : false;
    }

    public function update($id, $titulo, $descripcion, $estado, $fechaCreacion, $fechaVencimiento){
        return ($this->model->update($id,$titulo,$descripcion,$estado,$fechaCreacion,$fechaVencimiento)!= false)  ? header("Location:show.php?id=".$id) : header("Location:index.php");
    }

    public function delete($id){
        return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=". $id);
    }
}