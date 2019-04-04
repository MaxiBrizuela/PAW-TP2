<?php

$title = 'Consigna Punto 1';
$main_title = "Consigna punto 1 TP2";
$content = "<b>1. Elabore una aplicación PHP que ofrezca al usuario un formulario web para la carga de los datos 
de una persona que solicita turno en el médico. Campos del formulario:<br/><br/>
    
a. Nombre del paciente (obligatorio)<br/>
b. Email (obligatorio)<br/>
c. Teléfono (obligatorio)<br/>
d. Edad<br/>
e. Talla de calzado (desde 20 a 45 enteros)<br/>
f. Altura (usando la herramienta de deslizador)<br/>
g. Fecha de nacimiento (obligatorio)<br/>
h. Color de pelo (Usando un elemento select con las opciones que usted considere adecuadas)<br/>
i. Fecha del turno (obligatorio)<br/>
j. Horario del turno (Entre las 8:00 hasta las 17:00 con turnos cada 15 minutos)<br/>
k. 2 botones: Enviar y Limpiar.<br/>
<br/>
Todos los elementos del formulario deben validarse del lado de cliente y servidor, 
con el formato que mejor se ajuste y permitan HTML y PHP.<br/> Además, tomar en cuenta de 
validar que los datos ingresados se encuentren en los rangos especificados.</b>";

require 'views/about.view.php';
