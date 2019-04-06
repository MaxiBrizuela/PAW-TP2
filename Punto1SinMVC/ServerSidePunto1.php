<?php
function validarCamposObligatorios(){
    if(
        ($_POST["nombre"] == "") ||
        ($_POST["email"] == "") ||
        ($_POST["telefono"] == "") ||
        ($_POST["fechaNacimiento"] == "") ||
        ($_POST["fechaTurno"] == "") 
    ){
        return false;
    }else{
        return true;
    }
}

validate_email($_POST['email']);

if(isset($_POST["Enviar"])){//Si apretamos el boton Enviar
    if(!validarCamposObligatorios()){
        echo "<strong>Falta completar campos obligatorios</strong>";
        require 'index.php';
    }else{
        echo "Todo correcto! Datos validados.";
    }
}
?>