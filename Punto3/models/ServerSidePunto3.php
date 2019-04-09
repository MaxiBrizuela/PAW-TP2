<?php

$fallo=array();

if(isset($_GET["Enviar"])){//Si apretamos el boton Enviar 
    
    //Si la validacion del servidor falla, escribo los datos ingresados por el cliente 
    //antes de la llamada al server para que estos no esten vacios.
    $nombre = $_GET['nombre'];
    $email = $_GET['email'];
    $telefono = $_GET['telefono'];
    $edad = $_GET['edad'];
    $talla = $_GET['talla'];
    $altura = $_GET['altura'];
    $fechaNacimiento = $_GET['fechaNacimiento'];
    $pelo = $_GET['pelo'];
    $fechaTurno = $_GET['fechaTurno'];
    $turno = $_GET['turno'];

    validarCampos();
    if($fallo){
        require 'controllers/punto3.php';//Fallo algun valor
    }else{
        require 'controllers/punto3.validado.php';//Todos los datos validos
    }
}

function validarCampos(){
    validarCamposObligatorios();
    validarNombre();
    validarEmail();
    validarNumero();
    validarFechaNacimiento();
    validarPelo();
    validarFechaTurno();    
    validarTurno();
}

function validarCamposObligatorios(){
    if(
        ($_GET["nombre"] == "") ||
        ($_GET["email"] == "") ||
        ($_GET["telefono"] == "") ||
        ($_GET["fechaNacimiento"] == "") ||
        ($_GET["fechaTurno"] == "") 
    ){
        array_push($GLOBALS['fallo'],"Falta completar campos obligatorios*");
    }
}

function validarNumero(){
    if (!filter_var($_GET["telefono"], FILTER_VALIDATE_INT)) {
        array_push($GLOBALS['fallo'],"Fallo el telefono ingresado");
    }
    if (!filter_var($_GET["edad"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>150)))) {
        array_push($GLOBALS['fallo'],"Fallo la edad ingresada");
    }
    if (!filter_var($_GET["talla"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>20, "max_range"=>45)))) {
        array_push($GLOBALS['fallo'],"Fallo la talla ingresada");
    }
    if (!filter_var($_GET["altura"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>250)))) {
        array_push($GLOBALS['fallo'],"Fallo la altura ingresada");
    }
}

function validarEmail(){
    if (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
        array_push($GLOBALS['fallo'],"Fallo el email ingresado");
    }
}

function validarNombre(){
    if(!preg_match("/^([a-zA-Z ]+)$/",$_GET["nombre"])){
        array_push($GLOBALS['fallo'],"Fallo el nombre ingresado");
    }
}

function validarPelo(){
    if(!
        (($_GET["pelo"] == "negro") ||
        ($_GET["pelo"] == "rubio") ||
        ($_GET["pelo"] == "castaño") ||
        ($_GET["pelo"] == "colorado") ||
        ($_GET["pelo"] == "gris") ||
        ($_GET["pelo"] == "noTienePelo") ||
        ($_GET["pelo"] == "otroColor"))
    ){
        array_push($GLOBALS['fallo'],"Fallo el color de pelo ingresado");
    }
}

function validarTurno(){
    if(!preg_match("/^(0[8-9]|1[0-6]):(00|15|30|45)$/",$_GET["turno"])){
        array_push($GLOBALS['fallo'],"Fallo el horario del turno ingresado");
    }
}

function validarFechaNacimiento(){
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_GET["fechaNacimiento"])){//Formato yyyy-mm-dd
        array_push($GLOBALS['fallo'],"Fallo la fecha de nacimiento ingresada");
    }else{//Si cumple el formato--> que sea menor o igual al dia de hoy
        $arrayFecha = explode("-", $_GET["fechaNacimiento"]);
        if($arrayFecha['0']>date("Y")){
            array_push($GLOBALS['fallo'],"Fallo la fecha de nacimiento ingresada");
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']>date("m")){
                array_push($GLOBALS['fallo'],"Fallo la fecha de nacimiento ingresada");
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']>date("d")){
                    array_push($GLOBALS['fallo'],"Fallo la fecha de nacimiento ingresada");
                }
            }
        }
    }
}

function validarFechaTurno(){
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_GET["fechaTurno"])){//Formato yyyy-mm-dd
        array_push($GLOBALS['fallo'],"Fallo la fecha del turno ingresada");
    }else{//Si cumple el formato--> que sea mayor o igual al dia de hoy
        $arrayFecha = explode("-", $_GET["fechaTurno"]);
        if($arrayFecha['0']<date("Y")){
            array_push($GLOBALS['fallo'],"Fallo la fecha del turno ingresado");
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']<date("m")){
                array_push($GLOBALS['fallo'],"Fallo la fecha del turno ingresado");
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']<date("d")){
                    array_push($GLOBALS['fallo'],"Fallo la fecha del turno ingresado");
                }
            }
        }
    }
}
?>