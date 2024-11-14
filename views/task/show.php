<?php
require_once "c://xampp/htdocs/ProyectoTareas/views/head/head.php";
require_once "c://xampp/htdocs/ProyectoTareas/controllers/TaskController.php";
$obj = new TaskController();
//Pruebas de depuración
$date = $obj->mostrar($_GET['id']);
//print_r($date);
?>
<div class="text-center text-light mb-5">
    <h2>Detalle del registro</h2>
</div>
<div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">¿Está seguro de eliminar el registro?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    El registro no se podrá recuperar
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                    <a href="delete.php?id=<?= $date[0] ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="m-5">
    <div class="mb-3">
        <a href="index.php" class="btn btn-primary">Regresar</a>
    </div>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de vencimiento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col"> <?= $date[0] ?> </td>
                <td scope="col"> <?php echo $date['titulo'] ?> </td>
                <td scope="col"> <?= $date[2] ?> </td>
                <td scope="col"> <?= $date[3] ?> </td>
                <td scope="col"> <?= $date[4] ?> </td>
                <td scope="col"> <?= $date[5] ?> </td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <a href="edit.php?id=<?= $date[0] ?>" class="btn btn-success">Actualizar</a>
        <a href="delete.php?id=<?= $date[0] ?>" class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Eliminar</a>
    </div>
</div>

<?php
require_once "c://xampp/htdocs/ProyectoTareas/views/head/footer.php"
    ?>