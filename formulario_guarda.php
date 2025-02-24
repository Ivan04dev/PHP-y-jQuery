<!DOCTYPE html>
<html lang="es">
<head lang="es">
	<?php include ("_headPlantilla.php"); ?>
</head>
<body>
	<header class="header" id="site-header">
		<div class="container menuprincipal">
			<!-- Inicio Menú Principal -->
			<?php include("_menu_Principal.php"); ?>
			<!-- Fin Menú Principal -->
		</div>
	</header>
	<!-- Menú derecho -->
	<?php include("_menuDerecho.php"); ?>
	<!-- ... Fin Menú derecho -->
	<div class="content-wrapper">
		<!-- Stunning header -->
		<div class="stunning-header stunning-header-bg-gray">
			<div class="stunning-header-content">
				<h4 class="stunning-header-title">Abastecimiento Tiendas</h4>
			</div>
		</div>
		<!-- End Stunning header -->
		<!-- Inicio Formulario -->
	</div>
	<!---->
    <br><br>
	<div class="container">

		<!--asistenciasejecutivos-->
		
        
        <div class="heading">
			<?php

				include ("_formatoFecha.php");

				$conexion = new conexionBD();
				$con = $conexion->conectar();
				$consulta = new consultaBD();

				
				if ($nivel >= 3) {
					
					if ($usuario == 'imorango' ||  $usuario == 'kjdominguez' || $usuario == 'asaucedo' ||  $usuario == 'ivdelgadoga') {

						$consulta->consultaDatos($conexion->conexion,
						"*",
						"ATC_ABASTECIMIENTO",
						"WHERE FECHA >= ADD_MONTHS(SYSDATE, -3) 
						ORDER BY FECHA DESC");
					?>

						<!-- Descarga de archivos de Excel -->
						<div class="row medium-padding120" id='asistenciasejecutivos'>
							<form action="abastecimiento_tiendas_excel.php" method="POST">
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-3">
										<label> Del :</label>
										<input type='text' name='del' id='del' size='12' class="input-standard-grey" placeholder="Fecha de inicio" required></td>
									</div>
									<div class="col-lg-3">
										<label > Al :</label>
										<input type='text' name='al' id='al' size='12' class="input-standard-grey" placeholder="Fecha final" required></td>
									</div>
									
									<div class="col-lg-3">
										<label class="input-title c-dark"> &nbsp </label>
										<input type='submit' name ='submit' id='submit' class='btn btn-small btn--primary' value='Consultar'>
									</div>
									<div class="col-lg-3"></div>	   
								</div>
							</form>
							
						</div>	

						<!-- TABLA -->
						<div class="heading-line">
						</div>
						</div>
						
						<!-- Tabla Datos -->
						<!-- <div class="container"> -->
							<div class="row medium-padding120">
							<div class="tabs_cx">
							<div class="row">
								<div class="product-description">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="tab-1">	
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-12">
													<div class='div_tabla_tab'>
														<!-- <table class="shop_table cart table table-hover" id='abastecimiento'> -->
														<table class="table table-hover" id='abastecimiento'>
															<thead class="cart-product-wrap-title-main">
																<tr>
																	<th>Fecha</th>
																	<!-- <th>SKU</th> -->
																	<th>Folio</th>
																	<th>Descripcion</th>
																	<th>Cantidad</th>
																	<th>Destino</th>
																	<!-- <th>Centro Destino</th> -->
																	<th>Almacen Destino</th>
																	<th>Usuario</th>
																	<th>Archivo</th>
																</tr>
															</thead>
															<?php
																
																echo "<tbody>";
																	
																	while ($resArray = oci_fetch_array($consulta->stmt)){

																		echo "<tr class='cart_item'>";
																			echo '<td>'.fechaCompleta($resArray['FECHA']).'</td>';
																			// echo '<td>'.$resArray['SKU'].'</td>';
																			echo "<td><a href='abastecimiento_tiendas_edi.php?ID=".$resArray[0]."' class='url'>".$resArray['FOLIO']."</td>";
																			echo "<td>".$resArray['DESCRIPCION']."</td>";
																			echo "<td>".$resArray['CANTIDAD']."</td>";
																			echo "<td>".$resArray['DESTINO']."</td>";
																			// echo "<td>".$resArray['CENTRODESTINO']."</td>";
																			echo "<td>".$resArray['ALMACENDESTINO']."</td>";
																			echo "<td>".$resArray['USUARIO']."</td>";
																			echo "<td>";
																				if (!empty($resArray['ARCHIVO'])) {
																					// Si hay un archivo, muestra el enlace para descargarlo
																					echo "<a href='Abastecimiento_Archivos/".$resArray['ARCHIVO']."' target='_blank'>
																				<img src='img/pdf_1.png' alt='Descargar'>
																				</a>";
																				} else {
																					// Si no hay archivo, muestra un ícono o mensaje indicativo
																					echo "<img src='img/no.png' alt='No disponible'>";
																				}
																			echo "</td>";
																		echo "</tr>";

																	}
																	
																echo "</tbody>";
																
																$consulta->liberarDatos();
																$conexion->cerrarConexion();
																
															?>
														</table>
													</div>
												</div>
											<div class="col-lg-1"></div>
										</div>
									</div>

							</div>
							</div>
						<!-- </div> -->
							</div>
						</div>
						<!-- FIN TABLA -->
					<?php
					}
				}
				
				
                else if ($usuario == 'abecerrilf' ||  $usuario == 'ccristobal' || $usuario == 'gaguilarv' ||  $usuario == 'ibeltran' || 
						// $usuario == 'sncruzg' ||  $usuario == 'rzarazua' || $usuario == 'fbfloresg' || $usuario == 'ivdelgadoga' ||
						$usuario == 'sncruzg' ||  $usuario == 'rzarazua' || $usuario == 'fbfloresg' || 
						# Usuarios no encontrados en ATC_STAFF
						$usuario == 'dzunigay' ||  $usuario == 'asanchezor' || $usuario == 'emalanisba' ||  $usuario == 'mcmartinezz' || $usuario == 'cccortes')
					{

					$consulta->consultaDatos($conexion->conexion,
					"*","ATC_ABASTECIMIENTO",
					" WHERE USUARIO = '$usuario' 
					AND FECHA >= ADD_MONTHS(SYSDATE, -3)
					ORDER BY FECHA DESC");

					?>
						<!-- TABLA -->
						<div class="heading-line">
						</div>
						</div>
						
						<!-- Tabla Datos -->
						<div class="container">
							<div class="row medium-padding120">
							<div class="tabs_cx">
							<div class="row">
								<div class="product-description">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="tab-1">	
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-12">
													<div class='div_tabla_tab'>
														<!-- <table class="shop_table cart table table-hover" id='abastecimiento'> -->
														<table class="table table-hover" id='abastecimiento'>
															<thead class="cart-product-wrap-title-main">
																<tr>
																	<th>Fecha</th>
																	<!-- <th>SKU</th> -->
																	<th>Folio</th>
																	<th>Descripcion</th>
																	<th>Cantidad</th>
																	<th>Destino</th>
																	<!-- <th>Centro Destino</th> -->
																	<th>Almacen Destino</th>
																	<th>Usuario</th>
																	<th>Archivo</th>
																</tr>
															</thead>
															<?php
																
																echo "<tbody>";
																	
																	while ($resArray = oci_fetch_array($consulta->stmt)){

																		echo "<tr class='cart_item'>";
																			echo '<td>'.fechaCompleta($resArray['FECHA']).'</td>';
																			// echo '<td>'.$resArray['SKU'].'</td>';
																			echo "<td><a href='abastecimiento_tiendas_edi.php?ID=".$resArray[0]."' class='url'>".$resArray['FOLIO']."</td>";
																			echo "<td>".$resArray['DESCRIPCION']."</td>";
																			echo "<td>".$resArray['CANTIDAD']."</td>";
																			echo "<td>".$resArray['DESTINO']."</td>";
																			// echo "<td>".$resArray['CENTRODESTINO']."</td>";
																			echo "<td>".$resArray['ALMACENDESTINO']."</td>";
																			echo "<td>".$resArray['USUARIO']."</td>";
																			echo "<td>";
																				if (!empty($resArray['ARCHIVO'])) {
																					// Si hay un archivo, muestra el enlace para descargarlo
																					echo "<a href='Abastecimiento_Archivos/".$resArray['ARCHIVO']."' target='_blank'>
																				<img src='img/pdf_1.png' alt='Descargar'>
																				</a>";
																				} else {
																					// Si no hay archivo, muestra un ícono o mensaje indicativo
																					echo "<img src='img/no.png' alt='No disponible'>";
																				}
																			echo "</td>";
																		echo "</tr>";

																	}
																	
																echo "</tbody>";
																
																$consulta->liberarDatos();
																$conexion->cerrarConexion();
																
															?>
														</table>
													</div>
												</div>
											<div class="col-lg-1"></div>
										</div>
									</div>

							</div>
							</div>
						</div>
							</div>
						</div>
						<!-- FIN TABLA -->
					<?php
				}

			?>  
	</div>

	<!-- Contactos -->
	<div class="container-fluid">
			<!-- <div class="row medium-padding80 bg-border-color contacts-shadow"> -->
			<div class="row medium-padding80 bg-border-color contacts-shadow">
				<div class="container">
					<div class="row">
						<div class="contacts">
							<!-- <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"> -->
							<div class="col-lg-12">
								<div class="contacts-item">
									<img loading="lazy" src="img/contact8.png" alt="phone">
									<div class="content">
										<a href="#" class="title">Irving Ivan Cruz Loyo</a>
										<p class="sub-title">Seguimiento</p>
									</div>
								</div>
							</div>

							<div class="col-lg-12"></div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Fin Contactos -->
	</div>
	<br><br>
    
	<!-- Inicio Footer -->
	<footer class="footer">
		<?php include("_footerHome.php"); ?>
	</footer>
	<!-- Fin Footer -->

    <!-- JS Script -->
    <?php	include ("_scripts.php"); ?>
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/datatables.css" rel="stylesheet">
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/jquery.tablesorter.js"></script> 
    <script src="js/jquery.tablesorter.widgets.js"></script> 
    <script src="js/jquery.tablesorter.combined.js"></script>
    <script src="js/rangoFechas.js"></script>

    <script src="js/tablascx.js"></script>
    <script src="js/rangoFechas.js"></script>

    <!-- ...end JS Script -->
    <!-- <script src="js/atm_incidencias_edi.js"></script> -->
    <!-- <script src="js/abastecimiento_tiendas.edi.js"></script> -->
    </body>
    </html>
