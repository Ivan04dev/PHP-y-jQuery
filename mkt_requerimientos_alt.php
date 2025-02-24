<!DOCTYPE html>
<html lang="es">
<head lang="es">	
	<?php

	include ("_headPlantilla.php");
	?>	
</head>

<body class>
	<!-- Header -->
	<header class="header" id="site-header">
		<div class="container menuprincipal">
			<!-- Inicio Menú Principal -->
			<?php include("_menu_Principal.php"); ?>
			<!-- Fin Menú Principal -->
		</div>
	</header>
	<!-- ... End Header -->
	<!-- Menú derecho -->

	<?php include("_menuDerecho.php");	?>

	<!-- ... Fin Menú derecho -->
	<div class="content-wrapper">
		<!-- Stunning header  -->
		<div class="stunning-header stunning-header-bg-rose">
			<div class="stunning-header-content">
				<h4 class="stunning-header-title">Requerimientos Marketing</h4>
			</div>
		</div>
		<!-- End Stunning header -->

		<!-- Overlay Search -->
		<div class="overlay_search">
			<div class="container">
				<div class="row">
					<div class="form_search-wrap">
						<form>
							<input class="overlay_search-input" placeholder="Type and hit Enter..." type="text">
							<a href="#" class="overlay_search-close">
								<span></span>
								<span></span>
							</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Overlay Search -->
		<!-- Inicio Formulario -->
		<div class="container">
			<div class="overlay"></div>
		</div>
		<div class="container">
			<div class="contact-form">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="heading">
							<!-- <h4 class="heading-title">Incidencias Cajeros Automáticos</h4> -->
							<?php

								include("_generaFolio.php");

								$formulario = 'fallascajerosatm';
								$folio = new folio($formulario);

								$conexion = new conexionBD();
								$con = $conexion->conectar();
								$consulta = new consultaBD();

							?>
							<p class="heading-text">Folio: <b><?php echo $folio->_folio;?></b></p>
							<div class="heading-line">
								<span class="short-line"></span>
								<span class="long-line"></span>
							</div>
						</div>
					</div>
				</div>
				<form  method='post' data-nonce='crumina-submit-form-nonce' data-type='standard' name='requerimientosmkt' id='requerimientosmkt'>
					<!-- VALIDAR SUCURSALES POR NIVEL -->
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="region" class="input-title c-dark">Región:<abbr class="required" title="required">*</abbr></label>
							<?php

								if ($region == 'Corporativo'){

									echo "<select class='nice-select input-standard-grey' name='region' id='region_sel' required></select>";

								}elseif ($puesto == 'Jefe Regional ATC') {
									
									echo "<select class='nice-select input-standard-grey' name='region' id='region_sel' required></select>";
									echo "<input type='hidden' name='region' id='region' value='$region'>";

								}else{

									echo "<input class='input-standard-grey' value='$region' type=text' disabled>";
									echo "<input type='hidden' name='region' id='region' value='$region'>";

								}

							?>

						</div>
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="ciudad" class="input-title c-dark">Ciudad:<abbr class="required" title="required">*</abbr></label>
							<?php

								if ($nivel <= 2 ){

									echo "<input class='input-standard-grey' value='$ciudad' type=text' disabled>";
									echo "<input type='hidden' name='ciudad' id='ciudad' value='$ciudad'>";

								}elseif ($nivel == 3) {
									
									echo "<select class='nice-select input-standard-grey' name='ciudad' id='ciudad_sel' required></select>";

								}else{

									if ($sucursal == 'Corporativo'){

										echo "<select class='nice-select input-standard-grey' name='ciudad' id='ciudad_sel' required></select>";

									}else{

										echo "<select class='nice-select input-standard-grey' name='ciudad' id='ciudad' required></select>";

									}

								}

							?>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="tienda" class="input-title c-dark">Tienda:<abbr class="required" title="required">*</abbr></label>
							<?php

								if ($nivel <= 2){

									echo "<input class='input-standard-grey' value='$sucursal' type=text' disabled>";
									echo "<input type='hidden' name='tienda' id='tienda' value='$sucursal'>";

								}else{

									echo "<select class='nice-select input-standard-grey' name='tienda' id='tienda' required></select>";

								}

							?>
						</div>
					</div>
					<div class='row'>
						<input type='hidden' name='folio' id='folio' value='<?php echo $folio->_folio; ?>'>
						<?php echo "<input type='hidden' name='origen' id='origen' value='guarda'>"; ?>
						<?php echo "<input type='hidden' name='nivel' id='nivel' value='$nivel'>"; ?>
						<?php echo "<input type='hidden' name='usuario' id='usuario' value='$usuario'>"; ?>
						<?php echo "<input type='hidden' name='puesto' id='puesto' value='$puesto'>"; ?>
						<?php echo "<input type='hidden' name='regionUsuario' id='regionUsuario' value='$region'>"; ?>

						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="falla" class="input-title c-dark">Solicitante:<abbr class="required" title="required">*</abbr></label>
							<input name="nombreSolicitante" id ='nombreSolicitante' class="input-standard-grey" value='<?php echo $nombreCompleto;?>' readonly>

						</div>
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="telefonoSolicitante" class="input-title c-dark">Teléfono contacto:<abbr class="required" title="required">*</abbr></label>
							<input type="number" name="telefonoSolicitante" id ='telefonoSolicitante' class="input-standard-grey" placeholder="Teléfono contacto" required>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="tipoRequerimiento" class="input-title c-dark">Tipo de requerimiento:<abbr class="required" title="required">*</abbr></label>
							<select name="tipoRequerimiento" id="tipoRequerimiento" class="nice-select input-standard-grey" required>
								<option value=''>Selecciona una opción</option>
								<?php

									if ($listaMarca == 'izzi'){

			                    		#echo "<option value = 'Acrilicos de discapacidad'>Acrílicos de discapacidad</option>";
			                      		#<option value = 'Acrilico Bienvenido Cliente Legacy'>Acrílico Bienvenido Cliente Legacy</option>
			                      		#Se retira el 06-12-2021
			                      		#<option value = 'Porta documentos carta'>Porta documentos carta</option>
			                      		#<option value = 'Porta documentos oficio'>Porta documentos carta y oficio</option>
										echo "<option value = 'Acrilicos de discapacidad'>Acrílicos de discapacidad</option>
										<option value='Anuncio Totem'>Anuncio Tótem</option>
										<option value='Avisos de privacidad'>Avisos de privacidad</option>
										<option value='Avisos de videograbacion'>Avisos de videograbación</option>
										<option value='Alta/Baja Sucursal Pagina Web'>Alta/Baja Sucursal Página Web</option>
										<option value='Cambio de Imagen de ATM'>Cambio de Imagen de ATM</option>
										<option value='Cambio de tablet para legales'>Cambio de tablet para legales</option>
										<option value='Cenefas izzi tv para pantallas'>Cenefas izzi tv para pantallas</option>
										<option value='Cenefas en cristales'>Cenefas en cristales</option>
										<option value='Electrostatico animales de apoyo a discapacitado'>Electrostático animales de apoyo a discapacitado</option>
										<option value='Floor Graphic'>Floor Graphic</option>	                      
										<option value='Horarios Braille'>Horarios Braille</option>
										<option value='Horarios fisicos'>Horarios físicos</option>
										<option value='Horarios fisicos ATM'>Horarios físicos ATM</option>
										<option value='Horarios pagina Web'>Horarios página Web</option>
										<option value='Marquesina en mal estado'>Marquesina en mal estado</option>
										<option value='Modificar Direccion / Ubicacion de sucursal en Pagina WEB'>Modificar Direccion/Ubicación de sucursal en Página WEB</option>
										<option value='Numero de posiciones ATC'>Número de posiciones ATC</option>
										<option value='Porta documentos'>Porta documentos</option>
										<option value='QR'>QR</option>
										<option value='Portaflyers'>Portaflyers</option>
										<option value='Porta Posters'>Porta Posters</option>
										<option value='Senalizacion cajeros Pago facil'>Señalización cajeros Pago fácil</option>
										<option value='Tapetes'>Tapetes</option>
										<option value='Unifilas'>Unifilas</option>	                  
										<option value='Vinil para asiento prioritario discapacitado'>Vinil para asiento prioritario discapacitado</option>
										<option value='Vinil senalizacion de rampa para PcD'>Vinil señalización de rampa para PcD</option>";

										if ($usuario =='asaucedo' || $usuario =='jcbaez' || $usuario =='jgonzalez'){

											echo "<option value='' disabled > --------- Niumedia ---------</option>";
											echo "<option value='Pantalla TV Niumedia'>Pantalla TV Niumedia</option>";
											echo "<option value='Equipos nuc danados'>Equipos nuc dañados</option>";
											echo "<option value='Cable de video'>Cable de video</option>";
											echo "<option value='Cable de red'>Cable de red</option>";

										}

									}

									if ($listaMarca == 'Wizz Plus' OR $listaMarca == 'wizz plus'){

										#echo "<option value = 'Acrilicos de discapacidad'>Acrílicos de discapacidad</option>"; 
										#<option value = 'Porta documentos carta'>Porta documentos carta</option>
										#<option value = 'Porta documentos oficio'>Porta documentos oficio</option>  

										echo"<option value = 'Anuncio Totem'>Anuncio Tótem</option>
										<option value='Avisos de privacidad'>Avisos de privacidad</option>
										<option value='Avisos de videograbacion'>Avisos de videograbación</option>
										<option value='Alta/Baja Sucursal Pagina Web'>Alta/Baja Sucursal Página Web</option>
										<option value='Cenefas tv para pantallas'>Cenefas tv para pantallas</option>
										<option value='Cenefas en cristales'>Cenefas en cristales</option>
										<option value='Electrostatico animales de apoyo a discapacitado'>Electrostático animales de apoyo a discapacitado</option>
										<option value='Floor Graphic'>Floor Graphic</option>
										<option value='Horarios Braille'>Horarios Braille</option>
										<option value='Horarios fisicos'>Horarios físicos</option>
										<option value='Horarios fisicos ATM'>Horarios físicos ATM</option>
										<option value='Horarios pagina Web'>Horarios página Web</option>
										<option value='Marquesina en mal estado'>Marquesina en mal estado</option>
										<option value='Modificar Direccion / Ubicacion de sucursal en Pagina WEB'>Modificar Dirección/Ubicación de sucursal en Página WEB</option>
										<option value='Numero de posiciones ATC'>Número de posiciones ATC</option>
										<option value='Porta documentos'>Porta documentos</option>
										<option value='QR'>QR</option>
										<option value='Portaflyers'>Portaflyers</option>
										<option value='Porta Posters'>Porta Posters</option>
										<option value='Senalizacion cajeros Pago facil'>Señalización cajeros Pago fácil</option>
										<option value='Tapetes'>Tapetes</option>
										<option value='Unifilas'>Unifilas</option>
										<option value='Vinil para asiento prioritario discapacitado'>Vinil para asiento prioritario discapacitado</option>
										<option value='Vinil senalizacion de rampa para PcD'>Vinil señalización de rampa para PcD</option>";

										if ($usuario == 'asaucedo' OR $usuario == 'jcbaez' OR $usuario == 'jgonzalez'){

											echo "<option value = '' disabled > --------- Niumedia ---------</option>";
											echo "<option value = 'Pantalla TV Niumedia'>Pantalla TV Niumedia</option>";
											echo "<option value = 'Equipos nuc danados'>Equipos nuc dañados</option>";
											echo "<option value = 'Cable de video'>Cable de video</option>";
											echo "<option value = 'Cable de red'>Cable de red</option>";

										}	
																		

										#<option value = 'Imagen cajeros automáticos'>Imagen cajeros automáticos</option>
										#<option value = 'Porta documentos carta'>Porta documentos carta</option>
										#<option value = 'Porta documentos oficio'>Porta documentos oficio</option>

									}

									if ($listaMarca != 'Wizz' AND $listaMarca != 'izzi'){
									
										echo" <option value = 'Acrilicos de discapacidad'>Acrílicos de discapacidad</option>
										<option value = 'Anuncio Totem'>Anuncio Tótem</option>
										<option value = 'Avisos de privacidad'>Avisos de privacidad</option>
										<option value = 'Avisos de videograbacion'>Avisos de videograbación</option>
										<option value = 'Alta/Baja Sucursal Pagina Web'>Alta/Baja Sucursal Página Web</option>
										<option value = 'Cambio de Imagen de ATM'>Cambio de Imagen de ATM</option>
										<option value = 'Cenefas en cristales'>Cenefas en cristales</option>
										<option value = 'Cenefas tv para pantallas'>Cenefas tv para pantallas</option>
										<option value = 'Electrostatico animales de apoyo a discapacitado'>Electrostático animales de apoyo a discapacitado</option>
										<option value = 'Floor Graphic'>Floor Graphic</option>
										<option value = 'Horarios Braille'>Horarios Braille</option>
										<option value = 'Horarios fisicos ATM'>Horarios físicos ATM</option>
										<option value = 'Horarios fisicos'>Horarios físicos</option>
										<option value = 'Horarios pagina Web'>Horarios página Web</option>
										<option value = 'Marquesina en mal estado'>Marquesina en mal estado</option>
										<option value = 'Modificar Direccion / Ubicacion de sucursal en Pagina WEB'>Modificar Dirección/Ubicación de sucursal en Página WEB</option>
										<option value = 'Numero de posiciones ATC'>Número de posiciones ATC</option>                            
										<option value = 'Porta documentos'>Porta documentos</option>
										<option value = 'QR'>QR</option>
										<option value = 'Portaflyers'>Portaflyers</option>
										<option value = 'Porta Posters'>Porta Posters</option>
										<option value = 'Senalizacion cajeros Pago facil'>Señalización cajeros Pago fácil</option>
										<option value = 'Tapetes'>Tapetes</option>
										<option value = 'Unifilas'>Unifilas</option>	                  
										<option value = 'Vinil para asiento prioritario discapacitado'>Vinil para asiento prioritario discapacitado</option>
										<option value='Vinil senalizacion de rampa para PcD'>Vinil señalización de rampa para PcD</option>";
										
										if ($usuario == 'asaucedo' || $usuario == 'jcbaez' || $usuario =='jgonzalez'){
											
											echo "<option value = '' disabled > --------- Niumedia ---------</option>";
											echo "<option value = 'Pantalla TV Niumedia'>Pantalla TV Niumedia</option>";
											echo "<option value = 'Equipos nuc danados'>Equipos nuc dañados</option>";
											echo "<option value = 'Cable de video'>Cable de video</option>";
											echo "<option value = 'Cable de red'>Cable de red</option>";
											echo "<option value='Cambio de tablet para legales'>Cambio de tablet para legales</option>";

										}
										

									}

								?>
							</select>
						</div>
					</div>	
					<!-- INFORMACIÓN COMPLEMENTARIA  -->

					<div  id='especifica_horarios' name='especifica_horarios'>	
						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
								<label>Horario oficial tienda:</label>	
								<?php echo "<input type='hidden' name='horariooficial' id='horariooficial' >"; ?>
								<div class="alert alert-warning" role="alert" id="horariostienda"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<label for="hapertura" class="input-title c-dark">Lunes a Viernes:<abbr class="required" title="required">*</abbr></label>
								<select name="hapertura" id="hapertura" class="nice-select input-standard-grey">
									<option value=''>Apertura</option>
									<option value='08:00'>08:00</option>
									<option value='08:30'>08:30</option>
									<option value='09:00'>09:00</option>
									<option value='09:30'>09:30</option>
									<option value='10:00'>10:00</option>
									<option value='10:30'>10:30</option>
									<option value='11:00'>11:00</option>
									<option value='11:30'>11:30</option>
									<option value='12:00'>12:00</option>
								</select>
							</div>

							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<label for="hcierre" class="input-title c-dark"><abbr class="required" title="required"></abbr></label>
								<select name="hcierre" id="hcierre" class="nice-select input-standard-grey">
									<option value=''>Cierre</option>
									<option value='12:00'>12:00</option>
									<option value='12:30'>12:30</option>
									<option value='13:30'>13:30</option>
									<option value='14:00'>14:00</option>
									<option value='14:30'>14:30</option>
									<option value='15:00'>15:00</option>
									<option value='15:30'>15:30</option>
									<option value='16:00'>16:00</option>
									<option value='16:30'>16:30</option>
									<option value='17:00'>17:00</option>
									<option value='17:30'>17:30</option>
									<option value='18:00'>18:00</option>
									<option value='18:30'>18:30</option>
									<option value='19:00'>19:00</option>
									<option value='19:30'>19:30</option>
									<option value='20:00'>20:00</option>
									<option value='20:30'>20:30</option>
									<option value='21:00'>21:00</option>
									<option value='21:30'>21:30</option>
									<option value='22:00'>22:00</option>
								</select>
							</div>	
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">	
								<label for="hsapetura" class="input-title c-dark">Sábado:<abbr class="required" title="required">*</abbr></label>
								<select id='hsapetura'  name='hsapetura'class="nice-select input-standard-grey">
									<option value=''>Apertura</option>
									<option value='08:00'>08:00</option>
									<option value='08:30'>08:30</option>
									<option value='09:00'>09:00</option>
									<option value='09:30'>09:30</option>
									<option value='10:00'>10:00</option>
									<option value='10:30'>10:30</option>
									<option value='11:00'>11:00</option>
									<option value='11:30'>11:30</option>
									<option value='12:00'>12:00</option>
									<option value='Cerrado'>Cerrado</option>
								</select>
							</div>

							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<label for="hcierre" class="input-title c-dark"><abbr class="required" title="required"></abbr></label>

								<select id='hscierre' name='hscierre' class="nice-select input-standard-grey">
									<option value=''>Cierre</option>
									<option value='12:00'>12:00</option>
									<option value='12:30'>12:30</option>
									<option value='13:30'>13:30</option>
									<option value='14:00'>14:00</option>
									<option value='14:30'>14:30</option>
									<option value='15:00'>15:00</option>
									<option value='15:30'>15:30</option>
									<option value='16:00'>16:00</option>
									<option value='16:30'>16:30</option>
									<option value='17:00'>17:00</option>
									<option value='17:30'>17:30</option>
									<option value='18:00'>18:00</option>
									<option value='18:30'>18:30</option>
									<option value='19:00'>19:00</option>
									<option value='19:30'>19:30</option>
									<option value='20:00'>20:00</option>
									<option value='20:30'>20:30</option>
									<option value='21:00'>21:00</option>
									<option value='21:30'>21:30</option>
									<option value='22:00'>22:00</option>
								</select>

							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<label for="hsapetura" class="input-title c-dark">Domingo:<abbr class="required" title="required">*</abbr> </label>
								<select id='hdapertura'  name='hdapertura'class='nice-select input-standard-grey'>
									<option value=''>Apertura</option>
									<option value='08:00'>08:00</option>
									<option value='08:30'>08:30</option>
									<option value='09:00'>09:00</option>
									<option value='09:30'>09:30</option>
									<option value='10:00'>10:00</option>
									<option value='10:30'>10:30</option>
									<option value='11:00'>11:00</option>
									<option value='11:30'>11:30</option>
									<option value='12:00'>12:00</option>
									<option value='Cerrado'>Cerrado</option>
								</select>
							</div>

							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<label for="hcierre" class="input-title c-dark"><abbr class="required" title="required"></abbr></label>

								<select id='hdcierre'  name='hdcierre'class='nice-select input-standard-grey'>
									<option value=''>Cierre</option>
									<option value='12:00'>12:00</option>
									<option value='12:30'>12:30</option>
									<option value='13:30'>13:30</option>
									<option value='14:00'>14:00</option>
									<option value='14:30'>14:30</option>
									<option value='15:00'>15:00</option>
									<option value='15:30'>15:30</option>
									<option value='16:00'>16:00</option>
									<option value='16:30'>16:30</option>
									<option value='17:00'>17:00</option>
									<option value='17:30'>17:30</option>
									<option value='18:00'>18:00</option>
									<option value='18:30'>18:30</option>
									<option value='19:00'>19:00</option>
									<option value='19:30'>19:30</option>
									<option value='20:00'>20:00</option>
									<option value='20:30'>20:30</option>
									<option value='21:00'>21:00</option>
									<option value='21:30'>21:30</option>
									<option value='22:00'>22:00</option>
								</select>
							</div>
						</div>
					</div>	


					<div class="row"  id='cenefa' name='cenefa'>
                    <!--<div class='col-md-2'><label>Medidas: </label></div>
                    	<div class='col-md-2'><img src="img/cenefa.png" width='200' heigth='100'></div>-->
                    	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    		<label for="largocenefa" class="input-title c-dark">Medida solicitada:<abbr class="required" title="required">*</abbr></label>
                    		<input type='number' id='largocenefa' name='largocenefa' class='nice-select input-standard-grey' placeholder='Medidas en mts'>
                    	</div>
					</div>
                    <div class="row"  id='medida'>
                    	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    		<label for="addmedida" class="input-title c-dark">Cantidad:<abbr class="required" title="required">*</abbr></label>
                    		<input type='number' id='addmedida' name='addmedida' class='nice-select input-standard-grey' placeholder='Cantidad'>
                    	</div>

                    	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    		<div class='img-accesorios' id='FloorGraphic' align="center">
                    			<img src="img/FloorGraphic.png" height='310' width="225">
                    		</div>
                    	</div>
                    </div> 	                

                    <div class="row"  id='Portatablet' name='Portatablet'>
                    	<div class='col-md-1' align='right'></div>
                    	<div class='col-md-9'>
                    		<div class="alert alert-warning" role="alert">
                    			Este requerimiento <b>NO</b> aplica para reposición física de tablet, favor de comunicarse con <b>Angel Romero Suarez</b> aromeros@izzi.mx
                    		</div>
                    	</div>
                    </div>
                    <div class="row" id='AcrilicosDiscapacidad'>
                    	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    		<div class='img-accesorios' align="center">
                    			<img src="img/AcrilicosDiscapacidad.png" height='310' width="190">
                    		</div>
                    	</div>
                    </div>
                    <div class="row" id='vinil_senalizacion_pcd'>
                    	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    		<div class='img-accesorios' align="center">
                    			<img src="img/vinil_senalizacion_pcd.jpg" height='310' width="190">
                    		</div>
                    	</div>
                    </div>
                    <div class="row"  id='tapete' name='tapete'>
                    	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    		<label for="mtapete" class="input-title c-dark">Medidas:<abbr class="required" title="required">*</abbr></label>
                    		<select id='mtapete' name='mtapete' class='nice-select input-standard-grey'>
                    			<option value=''>Tamaño</option>
                    			<option value='M: 125 cm X 100 cm'>M: 125 cm X 100 cm</option>
                    			<option value='G: 180 cm X 120 cm'>G: 180 cm X 120 cm</option>
                    		</select>
                    	</div>
                    	<div class='col-md-6'></div>
                    </div>
                    <div class="row"  id='aprioritario' name='aprioritario'>
                    	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    		<label for="mprioritario" class="input-title c-dark">Medidas:<abbr class="required" title="required">*</abbr></label>
                    		<select id='mprioritario' name='mprioritario' class='nice-select input-standard-grey'>
                    			<option value=''>Tamaño</option>
                    			<option value='M: 14.5 cm de ancho'>14.5 cm de ancho X 18 cm de altura</option>
                    		</select>
                    	</div>
                    	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    		<div class='img-accesorios' id='FloorGraphic' align="center">
                    			<img src="img/asiento_prioritario.png" height='310' width="225">
                    		</div>
                    	</div>
                    </div>
                    <div class="row"  id='aservicio' name='aservicio'>
                    	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    		<label for="manimalserv" class="input-title c-dark">Medidas:<abbr class="required" title="required">*</abbr></label>
                    		<select id='manimalserv' name='manimalserv' class='nice-select input-standard-grey'>
                    			<option value=''>Tamaño</option>
                    			<option value='M: 14.5 cm de ancho'>27.5 cm de ancho X 21.5 cm de altura</option>
                    		</select>
                    	</div>
                    	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    		<div class='img-accesorios' id='FloorGraphic' align="center">
                    			<img src="img/animalserv.png" height='300' width="350">
                    		</div>
                    	</div>
                    </div>
                    <div class="row"  id='portadocumentos' name='portadocumentos'>
                    	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    		<label >Tamaño: </label>
                    		<select id='mportadocumentos' name='mportadocumentos' class='nice-select input-standard-grey'>
                    			<option value=''>Tamaño</option>
                    			<option value='Carta'>Carta</option>
                    			<option value='Oficio'>Oficio</option>
                    		</select>
                    	</div>
                    	<div class='col-md-6'></div>
                    </div>
                    <div class="row"  id='cambio_imagen_atm' name='cambio_imagen_atm'>
                    	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    		<img src="img/imagen_atm.png" height='310' width="225">
                    	</div>
                    	<div class='col-md-6'></div>
                    </div>
                    <div class="row"  id='cambio_tablet' name='cambio_tablet'>
                    	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    		<img src="img/cambio_tablet_legales.png" height='310' width="225">
                    	</div>
                    	<div class='col-md-6'></div>
                    </div>
                    <!-- -->
                    <div class="row">
                    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    		<label for="descripcion" class="input-title c-dark">Descripción:<abbr class="required" title="required">*</abbr></label>
                    		<textarea name="comentarios" id='comentarios' class="input-standard-grey" placeholder="Descripción" required></textarea>
                    	</div>
                    </div>

                    <div class="row">
                    	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    		<label for="archivo" class="input-title c-dark">Evidencia:<abbr class="required" title="required">*</abbr></label>
                    		<input name="archivo" id='archivo' class="input-standard-grey"  type="file" required>
                    	</div>
                    	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    	</div>	
                    	<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    		<label for="archivo" class="input-title c-dark"><abbr class="required" title="required">*</abbr><b> Datos obligatorios </b></label>
                    	</div>
                    </div>				
                    <div class="row" align="center">
                    	<div class="submit-block table">
                    		<div class="col-lg-5 table-cell"></div>
                    		<div class="col-lg-2 table-cell">
<!-- 								<button class="btn btn-small btn--primary" name='btsubmit' id='btsubmit'>
									<span class="text">Guardar</span>
								</button> -->
								<input type='submit' id='btsubmit' name='btsubmit' class='btn btn-small btn--primary' value='Guardar'>
							</div>
							<div class="col-lg-5 table-cell"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- Fin Formulario -->
	</div>
	<!-- Inicio Footer -->
	<footer class="footer">
		<?php include("_footerHome.php"); ?>
	</footer>
	<!-- Fin Footer -->
	<!-- JS Script -->
	<?php	include ("_scripts.php"); ?>
	<link href="css/estilo.css" rel="stylesheet">
	<script src="js/reqmarketing_developed.js"></script>

	<!-- ...end JS Script -->

</body>

</html>
