<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <link href="<?= statics('main.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>
	<?php 
		 $fecha_hoy = date ("Y-m-d", strtotime('today'));
		 $fecha_min = date( "Y-m-d", strtotime("-121 year", strtotime( $fecha_hoy ))); 
		 $manana = date("Y-m-d", strtotime('tomorrow'));
		 $fecha_max = date( "Y-m-d", strtotime("+1 month", strtotime( $fecha_hoy ))); 
	?>

   	<h1><?= $main_title ?></h1>
    <main>
    	
    	<?php
    		if ($GLOBALS['errores']) {
    			echo "<ul>";
    			foreach ($GLOBALS['errores'] as $error){
    				echo "<li class='advertencia'> $error </li>";
    			}
    		echo "</ul>";	
    		}
    	?>
    	<!-- Eliminar estas validaciones en los campos indicados para probar la validación desde el server -->
    	<!--Nombre  pattern="[A-Za-z\s]+"
    		Teléfono pattern="[0-9\+][0-9]+" maxlength="13"
			Edad max="120" min="0"
			Talla Calzado min="20" max="45"
			Altura min="0" max="250"
			Fecha Nacimiento min="<?=$fecha_min?>" max="<?=$fecha_hoy?>"
			Fecha Turno min="<?=$manana?>" max="<?=$fecha_max?>"
			Horario Turno min="08:00" max="17:00" step="900"
		-->


		<form name="formulario" method="post" action="validar-form-principal" oninput="valorAltura.value = altura.value">
			<p>
				<label for="nombre"><strong>Nombre*: </strong></label>
				<input type="text" name="nombre" value="<?=$GLOBALS['nombre']?>" maxlength="50" placeholder="Ingrese nombre y apellido.." pattern="[A-Za-z\s]+" title="Solo se admiten letras minúsculas,mayúsculas y espacios" required>
			</p>
			<p>
				<label for="correo"><strong>Email*: </strong></label> 
				<input type="email" name="correo" value="<?=$GLOBALS['correo']?>" placeholder="Ingrese dirección de email.." title="Ingrese una dirección de email válida" required>
			</p>
			<p>
				<label for="telefono"><strong>Teléfono*: </strong></label> 
				<input type="tel" name="telefono" value="<?=$GLOBALS['telefono']?>"  placeholder="Ingrese número de teléfono.." pattern="[0-9\+][0-9]+" maxlength="13"  title="Solo se admiten números sin espacios ni guiones" required>
			</p>
			<p>
				<label for="edad"><strong>Edad: </strong></label> 
				<input type="number" name="edad" value="<?=$GLOBALS['edad']?>" max="120" min="0" >
			</p>
			<p>
				<label for="talla_calzado"><strong>Talla de calzado: </strong></label>
				<input type="number" name="talla_calzado" value="<?=$GLOBALS['talla_calzado']?>" min="20" max="45" >
			</p>
			<p>
				<label for="altura"><strong>Altura: </strong></label>
				<input type="range" name="altura" value="<?=$GLOBALS['altura']?>" min="0" max="250" >
				<output for="altura" name="valorAltura"><?=$GLOBALS['altura']?></output> cm
			</p>
			<p>
				<label for="fecha_nacimiento"><strong>Fecha de nacimiento*: </strong></label>
				<input type="date" name="fecha_nacimiento" value="<?=$GLOBALS['fecha_nacimiento']?>" min="<?=$fecha_min?>" max="<?=$fecha_hoy?>" required>
			</p>
			<p>
				<label for="color_pelo"><strong>Color de pelo: </strong></label> 
				<select name="color_pelo">
					<option value="1">Negro</option>
					<option value="2">Castaño oscuro</option>
					<option value="3">Castaño claro</option>
					<option value="4">Rubio</option>
					<option value="5">Gris</option>
					<option value="6">No tiene pelo</option>
					<option value="7">Otro</option>	
				</select> 
			</p>
			<p>
				<label for="fecha_turno"><strong>Fecha del turno*: </strong></label> 
				<input type="date" name="fecha_turno" value="<?=$GLOBALS['fecha_turno']?>" min="<?=$manana?>" max="<?=$fecha_max?>" required>
			</p>
			<p>
				<small>La fecha de turno solicitada debe estar comprendida dentro de los próximos 30 días.
				</small>
			</p>
			<p><small>Atendemos de Lunes a Viernes.</small></p>
			<p>
				<label for="horario_turno"><strong>Horario del turno: </strong></label>
				<input type="time" name="horario_turno" value="<?=$GLOBALS['horario_turno']?>" min="08:00" max="17:00" step="900">
			</p>
			<p><small>Nuestro horario de atención es de 08:00 a 17:00 Hs</small></p>
				
			<input type="submit" name="Enviar" value="Enviar">
			<input type="reset" value="Limpiar">
		</form>
	</main>
</body>
</html>