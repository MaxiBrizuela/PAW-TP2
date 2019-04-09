<?php

$errores = array();

if(isset($_POST["Enviar"])){//Si apretamos el boton Enviar 
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $talla_calzado = $_POST['talla_calzado'];
    $altura = $_POST['altura'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $color_pelo = $_POST['color_pelo'];
    $fecha_turno = $_POST['fecha_turno'];
    $horario_turno = $_POST['horario_turno'];   
    validarCampos();
    if($errores){
        require 'form-principal.php';//Fallo algun valor
    }else{
        require 'validado.php';//Todos los datos validos
    }
}

function validarCampos(){
    validarNumero();
    validarTelefono();
    validarFechaNacimiento();
    validarFechaTurno();
    validarCamposObligatorios();
    validarEmail();
    validarNombre();
    validarPelo();
    validarTurno();
}

function validarCamposObligatorios(){
    if(
        (trim($_POST["nombre"]) == "") ||
        (trim($_POST["correo"]) == "") ||
        (trim($_POST["telefono"]) == "") ||
        (trim($_POST["fecha_nacimiento"]) == "") ||
        (trim($_POST["fecha_turno"]) == "") 
    ){
        $GLOBALS['errores'][] = 'Faltan completar campos obligatorios';
    }
}

function validarTelefono(){
    if (strlen($_POST["telefono"])>13) {
        $GLOBALS['errores'][] = 'Fallo el teléfono';
    }elseif (!preg_match("/^([0-9\+][0-9]+)$/",$_POST["telefono"])) {
        $GLOBALS['errores'][] = 'Fallo el teléfono';
    }
}

function validarNumero(){
    
    if (!filter_var($_POST["edad"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>120)))) {
         $GLOBALS['errores'][] = 'Fallo la edad';
    }
    if (!filter_var($_POST["talla_calzado"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>20, "max_range"=>45)))) {
        $GLOBALS['errores'][] = 'Fallo la talla del calzado';
    }
    if (!filter_var($_POST["altura"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>250)))) {
        $GLOBALS['errores'][] = 'Fallo la altura';
    }
}

function validarEmail(){
    if (!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        $GLOBALS['errores'][] = 'Fallo el email';
    }
}

function validarNombre(){
    if(!preg_match("/^([a-zA-Z ]+)$/",$_POST["nombre"])){
        $GLOBALS['errores'][] = 'Fallo el nombre';
    }
}

function validarPelo(){
    if(!
        (($_POST["color_pelo"] == "1") ||
        ($_POST["color_pelo"] == "2") ||
        ($_POST["color_pelo"] == "3") ||
        ($_POST["color_pelo"] == "4") ||
        ($_POST["color_pelo"] == "5") ||
        ($_POST["color_pelo"] == "6") ||
        ($_POST["color_pelo"] == "7")
        )
    ){
        $GLOBALS['errores'][] = 'Fallo el color del pelo';

    }
}

function validarTurno(){
    if((!preg_match("/^(0[8-9]|1[0-6]):(00|15|30|45)$/",$_POST["horario_turno"])) &&
       (!preg_match("/^(17):(00)$/",$_POST["horario_turno"]))){
        $GLOBALS['errores'][] = 'Fallo el horario del turno';
    }
}

function validarFechaNacimiento(){
    $fallo = false;
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_POST["fecha_nacimiento"])){//Formato yyyy-mm-dd
        $fallo = true;
    }else{//Si cumple el formato--> que sea menor o igual al dia de hoy
        $arrayFecha = explode("-", $_POST["fecha_nacimiento"]);
        if(($arrayFecha['0']>date("Y"))|| ($arrayFecha['0']< (date("Y"))-121)){
            $fallo = true;
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']>date("m")){
                $fallo = true;
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']>date("d")){
                    $fallo = true;
                }
            }
        }elseif ($arrayFecha['0']==(date("Y")-121)) {
            if ($arrayFecha['1']< date("m")) {
                $fallo = true;
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']<date("d")){
                    $fallo = true;
                }
            }
        } 
    }
    if ($fallo) {
        $GLOBALS['errores'][] = 'Fallo la fecha de nacimiento';
    }
}

function validarFechaTurno(){
    $fallo = false;
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_POST["fecha_turno"])){//Formato yyyy-mm-dd
        $fallo = true;
    }else{//Si cumple el formato--> que sea mayor o igual al dia de hoy
        $arrayFecha = explode("-", $_POST["fecha_turno"]);
        if($arrayFecha['0']<date("Y")){
            $fallo = true;
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']<date("m")){
                $fallo = true;
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']<date("d")){
                    $fallo = true;
                }
            }
        }
    }
    if ($fallo) {
        $GLOBALS['errores'][] = 'Fallo la fecha del turno';
    }
}
?>