<?php
require_once "c://xampp/htdocs/ProyectoTareas/views/head/head.php";
require_once "c://xampp/htdocs/ProyectoTareas/controllers/TaskController.php";
$obj = new TaskController();
//Pruebas de depuración
$task = $obj->mostrar($_GET['id']);
?>
<div class="text-center text-light mb-5">
    <h2>Modificando Registro</h2>
</div>
<div class="m-5">
    <form action="update.php" method="POST" autocomplete="off">
        <!--Contenedor ID-->
        <div class="mb-3 row">
            <label for="staticId" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" name="id" readonly class="form-control" id="staticId" value="<?= $task[0] ?>">
            </div>
        </div>
        <!--Contenedor Título-->
        <div class="mb-3 row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Título</label>
            <div class="col-sm-10">
                <input type="text" name="titulo" class="form-control" id="inputTitle" value="<?= $task[1] ?>">
            </div>
        </div>
        <!--Contenedor Descripción-->
        <div class="mb-3 row">
            <label for="inputDescription" class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-10">
                <input type="text" name="descripcion" class="form-control" id="inputDescription"
                    value="<?= $task[2] ?>">
            </div>
        </div>
        <!--Contenedor Estado-->
        <div class="mb-3 row">
            <label for="inputState" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <!--Operador ternario valida si la palabra contenida coincide con el estado en la base de datos
                de ser asi la define como selected y se muestra esa en el campo, de lo contrario define el campo vacío-->
                <select name="estado" class="form-control" id="selectEstado" required>
                    <option value="Backlog" <?= $task[3] == 'Backlog' ? 'selected' : ''; ?>>Backlog</option>
                    <option value="En curso" <?= $task[3] == 'En curso' ? 'selected' : '' ?>>En curso</option>
                    <option value="Pendiente" <?= $task[3] == 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="En revisión" <?= $task[3] == 'En revisión' ? 'selected' : ''; ?>>En revisión</option>
                    <option value="Completada" <?= $task[3] == 'Completada' ? 'selected' : ''; ?>>Completada</option>
                </select>
            </div>
        </div>
        <!--Contenedor Fecha de creación-->
        <div class="mb-3 row">
            <label for="staticDate" class="col-sm-2 col-form-label">Fecha de creación</label>
            <div class="col-sm-10">
                <input type="datetime-local" name="fechaCreacion" readonly class="form-control" id="staticDate"
                    value="<?= $task[4] ?>">
            </div>
        </div>
        <!--Contenedor Fecha de vencimiento-->
        <div class="mb-3 row">
            <label for="inputDate" class="col-sm-2 col-form-label">Fecha de vencimiento</label>
            <div class="col-sm-10">
                <input type="datetime-local" name="fechaVencimiento" class="form-control" id="inputDate"
                    value="<?= $task[5] ?>">
            </div>
        </div>
        <div class="text-center">
            <!--Botones-->
            <input type="submit" class="btn btn-success" value="Actualizar">
            <a href="show.php?id=<?= $task[0] ?>" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

<?php
require_once "c://xampp/htdocs/ProyectoTareas/views/head/footer.php"
    ?>