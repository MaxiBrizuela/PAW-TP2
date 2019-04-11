<?php

$title = 'Consigna Punto 3';
$main_title = "Consigna punto 3 TP2";
$content = "<b>3. Realice las modificaciones necesarias para que el script del punto anterior<br/> 
reciba los datos mediante el método GET. ¿Qué diferencia nota? ¿Cuándo es conveniente usar cada método?<br/>
Consejo: Utilice las herramientas de desarrollador de su Navegador (Pestaña Red) para observar las<br/> 
diferencias entre las diferentes peticiones.</b><br/><br/>

Un programa puede recibir parámetros utilizando los métodos GET y POST. Estos determinan como serán enviados los datos al servidor. 
<br/><br/>
<b>GET:</b> Con el método get, los valores de entrada se envían como parte de la dirección URL y se guardan en la variable de entorno de<br/> 
cadena de consulta (QUERY_STRING environment variable). Dicho QUERY_STRING es todo aquello que aparezca luego del signo “?” dentro de la URL. 
<br/><br/>
Este no es un método seguro ya que los datos son pasados como ya mencionamos dentro de la URL, siendo visible por el archivo log del web server<br/> 
(los server logfile son generalmente readable para los usuarios del sistema). 
<br/><br/>
Por lo tanto cualquier información confidencial como contraseñas estarían expuestas.<br/> 
El historial de URL también se guarda en el navegador y puede ser visto por cualquier persona con acceso al equipo.
<br/><br/>
Este método debera ser utilizado cuando la información enviada al servidor no se trata de datos confidenciales o sensibles (datos personales,</br> 
cuentas de usuario, contraseñas), y además esta información no deberá sobrepasar el límite de caracteres impuesto por el método GET. Generalmente</br>
es utilizado para realizar consultas a una base de datos en donde se ingresa una categoría para filtrar la búsqueda de un producto, o por ejemplo/br>
cuando un usuario elige un rubro, especialidad, etc. mediante opciones. 
<br/><br/>

<img src='../img/get1.png' alt='request URL GET'>
<br/><br/>
<img src='../img/get2.png' alt='Form data'>
<br/><br/>

<b>POST:</b> Con el método post, los datos se envían como una secuencia de entrada (input stream) al servidor, viajando dentro del cuerpo de entidad y<br/> 
no en la URL. 
<br/><br/>
De forma que, en lugar de adjuntar los datos de formularios en la URL en pares nombre/valor, adjunta los datos dentro del cuerpo de la<br/> 
solicitud HTTP. Esto evita que los datos de los formularios con método POST sean almacenados en el historial o en BookMarks (Favoritos).
<br/><br/>
El método POST debería ser utilizado cuando la información que se desea enviar al servidor es confidencial o sensible, y no puede quedar</br>
expuesta de ninguna manera hacia el usuario; o cuando la información a enviar supera el tamaño máximo admitido por el método GET.
<br/><br/>

<img src='../img/post1.png' alt='request URL POST'>
<br/><br/>
<img src='../img/post2.png' alt='Query String Parameters'>
<br/><br/>";


require 'views/about.view.php';
