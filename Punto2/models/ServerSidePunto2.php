<?php
if(isset($_POST["Enviar"])){//Si apretamos el boton Enviar
    
    //Si la validacion del servidor falla, escribo los datos ingresados por el cliente 
    //antes de la llamada al server para que estos no esten vacios.
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $talla = $_POST['talla'];
    $altura = $_POST['altura'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $pelo = $_POST['pelo'];
    $fechaTurno = $_POST['fechaTurno'];
    $turno = $_POST['turno'];

    $fallo = false;

    validarCampos();
    if($fallo){
        require 'controllers/punto2.php';//Fallo algun valor
    }else{
        require 'controllers/punto2.validado.php';//Todos los datos validos
    }
}

function validarCampos(){
    validarNumero();
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
        ($_POST["nombre"] == "") ||
        ($_POST["email"] == "") ||
        ($_POST["telefono"] == "") ||
        ($_POST["fechaNacimiento"] == "") ||
        ($_POST["fechaTurno"] == "") 
    ){
        $GLOBALS['falloCamposObligatorios'] = true;
        $GLOBALS['fallo'] = true;
    }
}

function validarNumero(){
    if (!filter_var($_POST["telefono"], FILTER_VALIDATE_INT)) {
        $GLOBALS['falloTelefono'] = true;
        $GLOBALS['fallo'] = true;
    }
    if (!filter_var($_POST["edad"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>150)))) {
        $GLOBALS['falloEdad'] = true;
        $GLOBALS['fallo'] = true;
    }
    if (!filter_var($_POST["talla"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>20, "max_range"=>45)))) {
        $GLOBALS['falloTalla'] = true;
        $GLOBALS['fallo'] = true;
    }
    if (!filter_var($_POST["altura"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>250)))) {
        $GLOBALS['falloAltura'] = true;
        $GLOBALS['fallo'] = true;
    }
}

function validarEmail(){
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $GLOBALS['falloEmail'] = true;
        $GLOBALS['fallo'] = true;
    }
}

function validarNombre(){
    if(!preg_match("/^([a-zA-Z ]+)$/",$_POST["nombre"])){
        $GLOBALS['falloNombre'] = true;
        $GLOBALS['fallo'] = true;
    }
}

function validarPelo(){
    if(!
        (($_POST["pelo"] == "morocho") ||
        ($_POST["pelo"] == "rubio") ||
        ($_POST["pelo"] == "castaño") ||
        ($_POST["pelo"] == "colorado"))
    ){
        $GLOBALS['falloPelo'] = true;
        $GLOBALS['fallo'] = true;
    }
}

function validarTurno(){
    if(!preg_match("/^(0[8-9]|1[0-6]):(00|15|30|45)$/",$_POST["turno"])){
        $GLOBALS['falloTurno'] = true;
        $GLOBALS['fallo'] = true;
    }
}

function validarFechaNacimiento(){
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_POST["fechaNacimiento"])){//Formato yyyy-mm-dd
        $GLOBALS['falloFechaNacimiento'] = true;
        $GLOBALS['fallo'] = true;
    }else{//Si cumple el formato--> que sea menor o igual al dia de hoy
        $arrayFecha = explode("-", $_POST["fechaNacimiento"]);
        if($arrayFecha['0']>date("Y")){
            $GLOBALS['falloFechaNacimiento'] = true;
            $GLOBALS['fallo'] = true;
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']>date("m")){
                $GLOBALS['falloFechaNacimiento'] = true;
                $GLOBALS['fallo'] = true;
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']>date("d")){
                    $GLOBALS['falloFechaNacimiento'] = true;
                    $GLOBALS['fallo'] = true;
                }
            }
        }
    }
}

function validarFechaTurno(){
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_POST["fechaTurno"])){//Formato yyyy-mm-dd
        $GLOBALS['falloFechaTurno'] = true;
        $GLOBALS['fallo'] = true;
    }else{//Si cumple el formato--> que sea mayor o igual al dia de hoy
        $arrayFecha = explode("-", $_POST["fechaTurno"]);
        if($arrayFecha['0']<date("Y")){
            $GLOBALS['falloFechaTurno'] = true;
            $GLOBALS['fallo'] = true;
        }elseif($arrayFecha['0']==date("Y")){
            if($arrayFecha['1']<date("m")){
                $GLOBALS['falloFechaTurno'] = true;
                $GLOBALS['fallo'] = true;
            }elseif($arrayFecha['1']==date("m")){
                if($arrayFecha['2']<date("d")){
                    $GLOBALS['falloFechaTurno'] = true;
                    $GLOBALS['fallo'] = true;
                }
            }
        }
    }
}
?>