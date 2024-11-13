<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php
      echo (empty($_GET['id']))
      //Si la URL contiene la palabra create muestra Agregar Tareas
      ? (strpos($_SERVER['REQUEST_URI'],'create')) ? 'Agregar Tareas' 
      //De lo contrario si contiene task/index muestra Lista de tareas de lo contrario muestra solo Index
      //Esta validación se hace ya que hay un archivo index de la pantalla principal y otro en la carpeta de tareas
      : (strpos($_SERVER['REQUEST_URI'],'task/index')?'Lista de tareas':'Index')
      //Verifica su el valor de la URL actual contiene la palabra show, de ser asi muestra Detalles del registro
      //de lo contrario muestra Actualizar registro, ambos se le concatena el id
      //Cabe destacar que ambos entran en el else ya que contienen id en su URL
      : (strpos($_SERVER['REQUEST_URI'],'show') ? 'Detalles del registro '.$_GET['id'] : 'Actualizar registro '.$_GET['id'] );
    ?>
  </title>
  <link href="/ProyectoTareas/public/css/styles.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container-fuild bg-dark p-2 mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/ProyectoTareas/index.php">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tareas
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="/ProyectoTareas/views/task/index.php">Tareas</a></li>
              <li><a class="dropdown-item" href="/ProyectoTareas/views/task/create.php">Agregar nuevas tareas</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
  <div class="container-fluid">