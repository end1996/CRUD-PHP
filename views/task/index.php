<?php
require_once "c://xampp/htdocs/ProyectoTareas/views/head/head.php";
require_once "c://xampp/htdocs/ProyectoTareas/controllers/TaskController.php";
//Creando instancia de objeto controller para utilizar el metodo index
//asignando los resultados a un array
$obj = new TaskController();
$rows = $obj->index();
?>
<table class="table table-dark table-hover">
    <div class="text-center text-light mb-5">
        <h2>Lista de Tareas</h2>
    </div>
    <!--Cabecera de la tabla -->
    <thead>
        <tr>
            <!--Columnas-->
            <th scope="col">ID</th>
            <th scope="col">Título</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <!--Cuerpo de la tabla-->
    <tbody>
        <!--Validar si existen registros en la base de datos-->
        <?php if ($rows): ?>
            <!--Recorrido de las filas asignandola a una variable-->
            <?php foreach ($rows as $row): ?>
                <tr>
                    <!--Filas -->
                    <th><?= $row[0] ?></th>
                    <td><?= $row[1] ?></td>
                    <!--Botones de acción-->
                    <th>
                        <a href="show.php?id=<?= $row[0] ?>" class="btn btn-primary">Ver</a>
                        <a href="edit.php?id=<?= $row[0] ?>" class="btn btn-success">Modificar</a>
                        <!-- Se indica el target para relacionarlo con el modal (cuadro de dialogo) 
                         y toggle para definir el objetivo como modal
                         No se coloca la ruta en href ya que solamente se quiere mostrar la confirmación-->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal<?= $row[0] ?>">Eliminar</a>

                        <!-- Modal -->
                        <!--El id debe coincidir con el definido en el target-->
                        <!--Cada modal posee id unico para evitar que reconozca solo el primer registro
                        y mapea cada id dependiendo del registro seleccionado-->
                        <div class="modal fade" id="deleteModal<?= $row[0] ?>" tabindex="-1"
                            aria-labelledby="deleteModalLabel<?= $row[0] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel<?= $row[0] ?>">¿Está seguro de eliminar
                                            el
                                            registro?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        El registro no se podrá recuperar
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?id=<?= $row[0] ?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fin modal -->
                    </th>
                </tr>
            <?php endforeach; ?>
            <!--En caso de no encontrar registros se ejecuta lo siguiente -->
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No se encontraron registros</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="mb-3 text-center">
    <a href="/ProyectoTareas/views/task/create.php" class="btn btn-success btn-agregar">Agregar nueva tarea</a>
</div>

<?php
require_once "c://xampp/htdocs/ProyectoTareas/views/head/footer.php";
?>