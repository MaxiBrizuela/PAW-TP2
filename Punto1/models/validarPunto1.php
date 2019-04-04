<?php
if($_POST["Enviar"]){
    if(
    ($_POST["nombre"] == "") ||
    ($_REQUEST["email"] == "") ||
    ($_REQUEST["telefono"] == "") ||
    ($_REQUEST["fechaNacimiento"] == "") ||
    ($_REQUEST["fechaTurno"] == "") 
    ){
        echo "<strong>Falta completar campos obligatorios</strong>";
        require 'controllers/punto1.php';
    }
    else
    {
        echo "Datos validados. Todo correcto!";
    }
}
?>