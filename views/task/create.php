<?php
require_once("C://xampp/htdocs/ProyectoTareas/views/head/head.php");
?>
<div class="text-center text-light mb-5">
    <h2>Agregar nueva tarea</h2>
</div>
<div class="m-5">
    <form action="store.php" method="POST" autocomplete="off">
        <div class="mb-3">
            <label class="form-label">Título de la tarea</label>
            <input type="text" class="form-control" name="titulo" id="titulo" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de creación</label>
            <input type="datetime-local" class="form-control" name="fechaCreacion" id="fechaCreacion" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de vencimiento</label>
            <input type="datetime-local" class="form-control" name="fechaVencimiento" id="fechaVencimiento" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a class="btn btn-danger" href="index.php">Cancelar</a>
        </div>
    </form>
</div>

<?php
require_once("C://xampp/htdocs/ProyectoTareas/views/head/footer.php");
?>