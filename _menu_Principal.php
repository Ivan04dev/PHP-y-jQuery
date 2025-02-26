<?php

    session_start();

    if (!isset($_SESSION['usuario'])){

    	session_destroy();
		header("Location: ../index.php"); 
		exit();

    }

?>
<?php

	$usuario  = $_SESSION['usuario'];
	$numemp   = $_SESSION['numemp'];
	$nombre   = $_SESSION['nombre'];
	$apaterno = $_SESSION['apaterno'];
	$amaterno = $_SESSION['amaterno'];
	$correo   = $_SESSION['correo'];
	$sucursal = $_SESSION['sucursal'];
	$puesto   = $_SESSION['puesto'];
	$estado   = $_SESSION['estado'];
	$nivel    = $_SESSION['nivel'];
	$region   = $_SESSION['region'];
	$ciudad   = $_SESSION['ciudad'];
	$marca    = $_SESSION['marca'];
	$division = $_SESSION['division'];

	$nombreCompleto = $nombre." ".$apaterno." ".$amaterno;

    include ("../../server/BD/_config/conexionBD.php");
    include ("../../server/BD/_config/consultaBD.php");

?>

<div class="header-content-wrapper">
	
	<div class="logo">
		<a href="principal.php" class="full-block-link"></a>
		<img loading="lazy" src="img/_home.png" title="cx tiendas" width="33" height="33">
		<!--<div class="logo-text">
			<div class="logo-title">Cx tiendas</div> 
			<div class="logo-sub-title">Experiencia al Cliente</div>
		</div> -->
	</div>
	
	<nav id="primary-menu" class="primary-menu">

		<a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
			<span class="mob-menu--title">Menu</span>
			<span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
                    <svg width="1000px" height="1000px">
                        <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                        <path id="pathE" d="M 300 500 L 700 500"></path>
                        <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
                    </svg>
                </span>
		</a>

		<!-- menu-icon-wrapper -->

		<ul class="primary-menu-menu">
			<li class="menu-item-has-children">
				<a href="comunicados_alt.php">Comunicados</a>
			</li>
			<li class="menu-item-has-children">
				<a href="menuformularios.php">Formularios</a>
			</li>

			<li class="">
				<a href="#">Lineamientos</a>
				<ul class="dropdown">
					<li class="hover-ver2"><a href="cartasdederechos.php"><i class="seoicon-text-paper"></i>Cartas de Derechos</a></li>
					<li class="hover-ver2"><a href="codigovestimenta.php"><i class="seoicon-text-paper"></i>Código de vestimenta</a></li>
					<li class="hover-ver2"><a href='cultura_cx.php'><i class="seoicon-text-paper"></i>Cultura CX</a></li>
					<li class="hover-ver2"><a href="manualimagen.php"><i class="seoicon-text-paper"></i>Manual de imagen</a></li>
					<li class="hover-ver2"><a href="nom035.php"><i class="seoicon-text-paper"></i>NOM 035</a></li>
					<li class="hover-ver2"><a href="normasconducta.php"><i class="seoicon-text-paper"></i>Normas de conducta</a></li>
					<li class="hover-ver2"><a href="https://izzitelco.sharepoint.com/sites/ppi/SitePages/Home.aspx" target='_blank' rel='noopener noreferrer'><i class="seoicon-text-paper"></i>Procesos y políticas</a></li>
					<li class="hover-ver2"><a href="profeco.php"><i class="seoicon-text-paper"></i>PROFECO</a></li>
					<li class="hover-ver2"><a href="lineamientos.php"><i class="seoicon-text-paper"></i>Protocolos de servicios</a></li>
				</ul>
			</li>

			<li class="">
				<a href="#">Soporte</a>
				<ul class="dropdown">
					<li class="hover-ver2"><a href="conveniosdespacho.php"><i class="seoicon-loupe-0"></i>Convenios de pago</a></li>
					<li class="hover-ver2"><a href='Manuales/RF-CMP-001_Listado_de_modelos_de_equipos_actuales.pdf' target="_blank"><i class="seoicon-loupe-0"></i>Equipos en uso</a></li>
					<!-- <li class="hover-ver2"><a href="formatos_autorizados.php"><i class="seoicon-loupe-0"></i>Formatos autorizados</a></li> -->
					<li class="hover-ver2"><a href="https://izzitelco.sharepoint.com/sites/ppi/SitePages/Home.aspx" target='_blank'><i class="seoicon-loupe-0"></i>Formatos autorizados</a></li>
					<li class='hover-ver2'><a href='http://inoc.izzitelecom.net/EquiposAfectados.aspx' target='_blank' rel='noopener noreferrer'><i class='seoicon-loupe-0'></i>Fallas activas</a></li>
					<li class="hover-ver2"><a href="catalogo_cn.php"><i class="seoicon-loupe-0"></i>Cátalogo de CN</a></li>
				</ul>
			</li>

			<li class="">
				<a href="#">Parámetros Operativos</a>
				<ul class="dropdown">
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=Cajeros_automaticos"><i class="seoicon-pie-graph-split"></i>ATM</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=reportecargosAutomaticos"><i class="seoicon-pie-graph-split"></i></i>Cargos automáticos</a></li>
				    
				    <?php
							
						if ($puesto == 'Gerente Sr' || $puesto == 'Gerente ATC' || $puesto == 'Gerente Territorial' || $puesto == 'Jefe Regional ATC' || $usuario == 'asaucedo' || $usuario == 'rmedinao' || $usuario == 'lparra' || $usuario == 'anavarrete' || $usuario == 'nvvazquez' || $puesto == 'Gerente Staff ATC' || $usuario == 'fpalacios'){

								echo "<li class='hover-ver2'><a href='parametros_operativos.php?po_var=Comisiones_ATC'><i class='seoicon-pie-graph-split'></i>Comisiones ATC</a></li>";

						}

					?>	

					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=Desconexiones"><i class="seoicon-pie-graph-split"></i>Desconexiones</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=izzi_movil"><i class="seoicon-pie-graph-split"></i>izzi Móvil</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=Niveles_de_Servicio"><i class="seoicon-pie-graph-split"></i>Niveles de servicio</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=migraciones"><i class="seoicon-pie-graph-split"></i>Migraciones</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=matrizretencion"><i class="seoicon-pie-graph-split"></i>Matriz de retención</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=Pocket_Flex"><i class="seoicon-pie-graph-split"></i>Pocket/Flex</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=Portabilidad"><i class="seoicon-pie-graph-split"></i>Portabilidad</a></li>
					<!--<li class="hover-ver2"><a href=""><i class="seoicon-pie-graph-split"></i>Tablero de visitas</a></li>-->
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=Ventas"><i class="seoicon-pie-graph-split"></i>Ventas</a></li>
					<li class="hover-ver2"><a href="parametros_operativos.php?po_var=Ventas_complementos"><i class="seoicon-pie-graph-split"></i>Ventas complementos</a></li>
				</ul>
			</li>

			<li class="">
				<a href="#">Capacitación</a>
				<ul class="dropdown">
					<li class="hover-ver2"><a href="manualesguias.php"><i class="seoicon-draw"></i>Manuales operativos</a></li>
				</ul>

			</li>

			<li class="">
				<a href="#">Oferta Comercial</a>
				<ul class="dropdown">
					<li class="hover-ver2"><a href="actualizaciones_comerciales.php"><i class="seoicon-tags"></i>Actualizaciones comerciales</a></li>
					<li class="hover-ver2"><a href="barker.php"><i class="seoicon-tags"></i>Barker tomaturnos</a></li>
					<li class="hover-ver2"><a href="https://izzitelco.sharepoint.com/sites/mtk/cv/SitePages/Capacitaci%C3%B3n.aspx" target="_blank"><i class="seoicon-tags"></i>Resumen comercial</a></li>
					<li class="hover-ver2"><a href="scripts_autorizados.php"><i class="seoicon-tags"></i>Scripts autorizados</a></li>
					<!-- <li class="hover-ver2"><a href="destacadosprogramacion.php"><i class="seoicon-tags"></i>Destacados programación</a></li> -->
					
				</ul>
			</li>
		</ul>
	</nav>
	<ul class="nav-add">
		<li class="search search_main">
			<a href="#" class="js-open-search">
				<i class="seoicon-loupe"></i>
			</a>
		</li>
		<li class="cart">
			<?php
				include ("lecturasPendientes.php");
				$lecturas = lecturasPendientes($usuario);
			?>	
		</li>
	</ul>
	
	<div class='cart'>
		<!-- <img src='img/documento_2.gif' width='30'> -->
	</div>
	<div class="user-menu open-overlay">
		<a href="#" class="user-menu-content  js-open-aside">
			<span></span>
			<span></span>
			<span></span>
		</a>
	</div>
</div>
