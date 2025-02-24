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

				<?php

					include("_menu_Principal.php");

				?>

			<!-- Fin Menú Principal -->

		</div>

	</header>

	<!-- ... End Header -->

	<!-- Menú derecho -->

	<?php

		include("_menuDerecho.php");

	?>

	<!-- ... Fin Menú derecho -->

	<div class="content-wrapper">

		<!-- Stunning header -->

		<div class="stunning-header stunning-header-bg-rose">
			<div class="stunning-header-content">
				<h1 class="stunning-header-title">Mantenimiento Tiendas</h1>
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
			<!-- Modal confirmación de datos almacenados -->
			<div class="modal">
				<div id='img_notificacion'></div>
				<div id='resultadoInsert' class='mail_enviado'></div>
			</div>
			<!-- Modal confirmación de datos almacenados -->
		</div>
		<div class="container">
			<div class="contact-form medium-padding120">
				<div class="row">
					<div class="col-lg-12"></div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="heading">
							<!-- <h4 class="heading-title">Incidencias Cajeros Automáticos</h4> -->
							<!-- Consulta a -->
							<?php

            					$conexion = new conexionBD();
            					$con = $conexion->conectar();
            					$consulta = new consultaBD();

								$id    = $_GET['ID'];
								$folio = $_GET['folio'];
								#$id    = 1;
								#$folio = 12345;

								$hoy            = date("d-m-Y H:i:s");
								$modificadopor  = $_POST['modificadopor'];

								
								include_once("_formatoFecha.php");

								#$TBC     = 'ATC_ELEMENTOSMANTTO';
								$TBC     = 'ATC_MANTENIMIENTO_TIENDAS';
								$PARC    =  '*';    
								$CADENAC =  "WHERE ID = '$id' AND FOLIO = '$folio'";
								#$CADENAC =  "";

								#

								$consulta->consultaDatos($conexion->conexion,$PARC,$TBC,$CADENAC);

								while ($resArray = oci_fetch_array($consulta->stmt)){

									  #INFORMACIÓN FOLIO

								       $Region          = $resArray['REGION'];
								       $Ciudad          = $resArray['CIUDAD'];
								       $Tienda          = $resArray['TIENDA'];
								       $solicitante     = $resArray['NOMSOLICITANTE'];
								       $telefono        = $resArray['TELCONTACTO'];
								       $requerimiento   = $resArray['REQUERIMIENTO'];
								       $tipo   			= $resArray['TIPO'];
								       $hrssolucion   	= $resArray['HRSSOLUCION'];
								       $comentarios     = $resArray['COMENTARIOS'];
								       $usuarioc        = $resArray['USUARIO'];
								       $fecha           = fecha($resArray['FECHA']); 

								       #DATOS PARA MODIFICAR

								       $estatus         		= $resArray['ESTATUS'];
								       $fechamodificado 		= $resArray['MODIFICADO'];
								       $modificadopor   		= $resArray['MODIFICADOPOR'];
								       $archivoresp         	= $resArray['ARCHIVO'];
								       $solucioncx          	= $resArray['SOLUCIONCX'];

								                       
								} 

							?>

							<!-- NUEVO -->
							<?php
								$folio = '12345';
								$region = 'Corporativo';
								$ciudad = 'Corporativo';
								$tienda = 'Corporativo';
								$comentarios = 'Estos son los comentarios';
								$area = 'Corporativo';
								$estatus = 'Prueba';
							?>
							<?php
								
								if ($usuario == 'asaucedo' || $usuario == 'krojo' || $usuario == 'dcruzs' || $usuario == 'ssmartinez' || $usuario == 'ivdelgadoga'){
									echo '<h5 class="url"><a href="mntto_tiendas_con.php" title="Regresar"><i class="seoicon-arrow-back"></i></a></h5>';
								}

							?>
							<p class="heading-text">
								Folio: <b><?php echo $folio;?></b>
							</p>

							<div class="heading-line">
								<span class="short-line"></span>
								<span class="long-line"></span>
							</div>
						</div>
					</div>
				</div>
				
				<form  method='post' data-nonce='crumina-submit-form-nonce' data-type='standard' name='mnttotiendas' id='mnttotiendas'>
					<div class="row">
						<!-- ID -->
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="id" class="input-title c-dark">ID:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='' type='text' id='id' name='id' readonly>";
							?>
						</div>
					 	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					 		<label for="fecha" class="input-title c-dark">Fecha:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$hoy' type='text' id='fecha' name='fecha' readonly>";
							?>
					 	</div>
					 	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="folio" class="input-title c-dark">Folio:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$folio' type='text' readonly>";
								echo "<input type='hidden' name='folio' id='folio' value='$folio'>";
							?>
					 	</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="region" class="input-title c-dark">Región:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$region' type='text' id='region' name='region' readonly>";
							?>
						</div>
					 	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					 		<label for="ciudad" class="input-title c-dark">Ciudad:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$ciudad' type='text' id='ciudad' name='ciudad' readonly>";
							?>
					 	</div>
					 	<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="tienda" class="input-title c-dark">Tienda:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$tienda' type='text' readonly>";
								echo "<input type='hidden' name='tienda' id='tienda' value='$tienda'>";
							?>
					 	</div>
					</div>

					<div class='row'>
						<input type='hidden' name='folio' id='folio' value='<?php echo $folio; ?>'>
						<?php echo "<input type='hidden' name='origen' id='origen' value='guarda'>"; ?>
						<?php echo "<input type='hidden' name='nivel' id='nivel' value='$nivel'>"; ?>
						<?php echo "<input type='hidden' name='usuariocreador' id='usuariocreador' value='$usuarioc'>"; ?>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					 	  <label for="tienda" class="input-title c-dark">Creado por (usuario):<abbr class="required" title="required">*</abbr></label>
					 	  <input name="usuario" id ='usuario' class="input-standard-grey" value="<?php echo $usuario;?>" type="text" readonly>
					 	  <?php #echo "<input type='hidden' name='usuarioc' id='usuarioc' value='$usuarioc'>"; ?>
					 	  <?php echo "<input type='hidden' name='usuariomod' id='usuariomod' value='$usuario'>"; ?>
						</div>

						<!-- REQUERIMIENTO -->
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="requerimiento" class="input-title c-dark">
									Requerimiento:<abbr class="required" title="required">*</abbr>
							</label>
							<select class="input-standard-grey" id="requerimiento" name="requerimiento">
								<option>Selecciona una opción</option>
							</select>
						</div>
						
						<!-- TIPO -->
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="categoria" class="input-title c-dark">
									Categoría:<abbr class="required" title="required">*</abbr>
							</label>
							<select class="input-standard-grey" id="categoria" name="categoria">
								<option>Selecciona una opción</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="comentarios" class="input-title c-dark">Comentarios:<abbr class="required" title="required">*</abbr></label>
							<textarea name="comentarios" id='comentarios' class="input-standard-grey"></textarea>
						</div>
					</div>

					<!-- VALIDAR FOLIOS CON ESTATUS -->
					<div class="row">
						
						<!-- FECHA MODIFICADO -->
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					 		<label for="fechamodificado" class="input-title c-dark">Fecha Modificado:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$hoy' type='text' id='fechamodificado' name='fechamodificado' readonly>";
							?>
					 	</div>

						<!-- USUARIO MODIFICA -->
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					 		<label for="usuariomodifica" class="input-title c-dark">Usario Modifica:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$usuario' type='text' id='usuariomodifica' name='usuariomodifica' readonly>";
							?>
					 	</div>

						<!-- No se muestra en la captura -->
						<!-- ESTATUS -->
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					 		<label for="area" class="input-title c-dark">Estatus:<abbr class="required" title="required">*</abbr></label>
							<?php
								echo "<input class='input-standard-grey' value='$estatus' type='text' id='estatus' name='estatus' readonly>";
							?>
					 	</div>

					</div>

					<!-- NUEVO  -->
					<div class="row">
						<!-- AREARESPONSABLE -->
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="requerimiento" class="input-title c-dark">
									Area Responsable:<abbr class="required" title="required">*</abbr>
							</label>
							<select class="input-standard-grey" id="arearesponsable" name="arearesponsable">
								<option>Selecciona una opción</option>
							</select>
						</div>
						
						<!-- RESPONSABLE 
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<label for="categoria" class="input-title c-dark">
									Categoría:<abbr class="required" title="required">*</abbr>
							</label>
							<select class="input-standard-grey" id="categoria" name="categoria">
								<option>Selecciona una opción</option>
							</select>
						</div>
						-->
					</div>

					<div class="row" align="center">
                    	<div class="submit-block table">
                    		<div class="col-lg-5 table-cell"></div>
                    		<div class="col-lg-2 table-cell">
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
	<script src="js/mntto_tiendas.js"></script>
	<link href="css/estilo.css" rel="stylesheet">
	<!-- ...end JS Script -->
</body>
</html>
