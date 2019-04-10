<?php

$fallo=array();

if(isset($_POST["Enviar"])){//Si apretamos el boton Enviar
    
    //Si la validacion del servidor falla, escribo los datos ingresados por el cliente 
    //para que estos no esten vacios.
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

    validarCampos();
    if($fallo){
        require 'controllers/punto6_Formulario.php';//Fallo algun valor
    }else{
        almacenarTurno();//Si todos lo datos correctos los almaceno en json
        if($fallo){//Si almacenar en archivo json fallo
            require 'controllers/punto6_Formulario.php';//Fallo algun valor
        }else{
            require 'controllers/punto6.validado.php';//Todos los datos validos
        }
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
    validarImagen();
}

function validarCamposObligatorios(){
    if(
        ($_POST["nombre"] == "") ||
        ($_POST["email"] == "") ||
        ($_POST["telefono"] == "") ||
        ($_POST["fechaNacimiento"] == "") ||
        ($_POST["fechaTurno"] == "") 
    ){
        array_push($GLOBALS['fallo'],"Falta completar campos obligatorios*");
    }
}

function validarNumero(){
    if (!filter_var($_POST["telefono"], FILTER_VALIDATE_INT)) {
        array_push($GLOBALS['fallo'],"Fallo el telefono ingresado");
    }
    if (!filter_var($_POST["edad"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>150)))) {
        array_push($GLOBALS['fallo'],"Fallo la edad ingresada");
    }
    if (!filter_var($_POST["talla"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>20, "max_range"=>45)))) {
        array_push($GLOBALS['fallo'],"Fallo la talla ingresada");
    }
    if (!filter_var($_POST["altura"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>250)))) {
        array_push($GLOBALS['fallo'],"Fallo la altura ingresada");
    }
}

function validarEmail(){
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        array_push($GLOBALS['fallo'],"Fallo el email ingresado");
    }
}

function validarNombre(){
    if(!preg_match("/^([a-zA-Z ]+)$/",$_POST["nombre"])){
        array_push($GLOBALS['fallo'],"Fallo el nombre ingresado");
    }
}

function validarPelo(){
    if(!
        (($_POST["pelo"] == "negro") ||
        ($_POST["pelo"] == "rubio") ||
        ($_POST["pelo"] == "castaño") ||
        ($_POST["pelo"] == "colorado") ||
        ($_POST["pelo"] == "gris") ||
        ($_POST["pelo"] == "noTienePelo") ||
        ($_POST["pelo"] == "otroColor"))
    ){
        array_push($GLOBALS['fallo'],"Fallo el color de pelo ingresado");
    }
}

function validarTurno(){
    if(!preg_match("/^(0[8-9]|1[0-6]):(00|15|30|45)$/",$_POST["turno"])){
        array_push($GLOBALS['fallo'],"Fallo el horario del turno ingresado");
    }
}

function validarFechaNacimiento(){
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_POST["fechaNacimiento"])){//Formato yyyy-mm-dd
        array_push($GLOBALS['fallo'],"Fallo la fecha de nacimiento ingresada");
    }else{//Si cumple el formato--> que sea menor o igual al dia de hoy
        $arrayFecha = explode("-", $_POST["fechaNacimiento"]);
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
    if(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$_POST["fechaTurno"])){//Formato yyyy-mm-dd
        array_push($GLOBALS['fallo'],"Fallo la fecha del turno ingresada");
    }else{//Si cumple el formato--> que sea mayor o igual al dia de hoy
        $arrayFecha = explode("-", $_POST["fechaTurno"]);
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

function validarImagen(){
    if($_FILES["imagen"]["name"]){//Si no es null
        $filename = $_FILES["imagen"]["name"];
        $GLOBALS['dirImagen'] = "diagnosticos/". basename($filename);//Path a guardar la imagen
        
        $extensionesPermitidas = array("jpg","png");
        $extensionImagen = pathinfo($filename, PATHINFO_EXTENSION);//Recupero extension de la imagen

        if(in_array($extensionImagen, $extensionesPermitidas))//Pregunto si la extension es una de las validas
        {
            if (file_exists($GLOBALS['dirImagen'])) {
                array_push($GLOBALS['fallo'],"Ya existe una imagen llamada: ". $filename);//ERROR: imagen con nombre repetido
            }elseif(!$GLOBALS['fallo']){
                //Si no hay otro error guardo la imagen. Pregunto recien aca para que, 
                //si la imagen tiene un error, se le indique al usuario junto con los demas errores.
                //Si preguntara al inicio de validarImagen no tendria mensaje de error de la imagen (si lo hubiese)
                $tmp = $_FILES["imagen"]["tmp_name"];//Path actual de la imagen
                move_uploaded_file($tmp, $GLOBALS['dirImagen']);//Guardar imagen nueva ubicacion
            }
        }else{//ERROR: imagen con extension invalida
            array_push($GLOBALS['fallo'],"Imagen con extension invalida: debe ser png o jpg.");
        }
    }
}

function almacenarTurno(){
    if(file_exists('turnos/turnos.json')){
        $turnosDatosActuales = file_get_contents('turnos/turnos.json');
        $arrayTurnos = json_decode($turnosDatosActuales, true);
        //Asignar ID
        $id = @(sizeof($arrayTurnos));
        $nuevoTurno = array(
            'id'=> $id,
            'nombre'=> $_POST['nombre'],
            'email'=> $_POST['email'],
            'telefono'=> $_POST['telefono'],
            'edad'=> $_POST['edad'],
            'talla'=> $_POST['talla'],
            'altura'=> $_POST['altura'],
            'fechaNacimiento'=> $_POST['fechaNacimiento'],
            'pelo'=> $_POST['pelo'],
            'fechaTurno'=> $_POST['fechaTurno'],
            'turno'=> $_POST['turno'],
            'imagen'=> $_FILES["imagen"]["name"]
        );
        $arrayTurnos[] = $nuevoTurno;
        $arrayTurnosActualizado = json_encode($arrayTurnos);

        if(!file_put_contents('turnos/turnos.json',$arrayTurnosActualizado)){
            array_push($GLOBALS['fallo'],"Hubo un error al intentar guardar su formulario!");
        }
    }else{
        array_push($GLOBALS['fallo'],"No existe el archivo turnos.json");
    }
}
?>