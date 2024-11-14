<?php
function fechaHoraActual(){
    //Define la zona horaria local
    date_default_timezone_set('America/Lima');
    //Formato de fecha y hora que coincida con el control de html
    $fechaHoraActual = date("Y-m-d H:i");
    //retorna el resultado para luego llamar la función en el control
    return $fechaHoraActual;
}
