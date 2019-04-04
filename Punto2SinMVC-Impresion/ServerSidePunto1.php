<?php
if($_POST["Enviar"]){//Si apretamos el boton Enviar
    if(
    ($_POST["nombre"] == "") ||
    ($_POST["email"] == "") ||
    ($_POST["telefono"] == "") ||
    ($_POST["fechaNacimiento"] == "") ||
    ($_POST["fechaTurno"] == "") 
    ){
        echo "<strong>Falta completar campos obligatorios</strong>";
        require 'index.php';
    }
    else
    {
        echo "Datos validados. Todo correcto!";
        foreach ($_POST as $key => $value) {
            $$key = htmlspecialchars($_POST[$key]);
            if($$key <> "Enviar")
                echo $$key."<br>";	
        }
    }
}
?>