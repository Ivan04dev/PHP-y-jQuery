<div class="mCustomScrollbar">
	<div class="popup right-menu">

		<div class="right-menu-wrap titulo_izquierdo">

			<div class="user-menu-close js-close-aside">
				<a href="#" class="user-menu-content  js-clode-aside">
					<span></span>
					<span></span>
				</a>
			</div>
			
			<!--
			<div class="logo">
				<a href="principal.php" class="full-block-link"></a>
				<img loading="lazy" align="left"src="img/logo_tiendas_negro.png" alt="cx tiendas" width="180" height="60">
			</div>
			-->
			<p class="text">Dirección de Experiencia al Cliente</p>
			<br>
			<div align="center">
				<a href="../logout.php" title="Cerrar sesión">
					<img src="img/close_home.png" width="35" height="35">
				</a>
			</div>			

		</div>

		<div class="widget contacts">

	
		    <div class="reloj">
		      <b id="horas" class="horas"></b>
		      <b class="horas">:</b>
		      <b id="minutos" class="minutos"></b>
		      <b class="horas">:</b>
		      <b id="segundos" class="segundos"></b>
		      <b id="ampm" class="ampm"></b>
		      
		      <div class="cajaSegundos">

		        	
		        
		      </div>
		    </div>


		    <div class="wfecha">
		      <div id="diaSemana" class="diaSemana"></div>
		      <div id="caldia" class="dia"></div>
		      <div id="calmes" class="mes"></div>
		       - 
		      <div id="calanio" class="anio"></div>
		    </div>


			<?php #echo "<p class='sub-title'>".date('d-m-Y')."</p>";?>
			<?php 
				#echo date("l"); 
				define('DIASEMANA', array( '','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo' ));
				$midia = date("N"); 
				#echo DIASEMANA[$midia];			
			?>


			<h5 class="contacts-title"></h5>

			<div class="contacts-item">	
				<div class="content">	
					<a href='miPerfil.php'><?php echo $nombreCompleto; ?></a>	
				</div>	
			</div>	

			<div class="contacts-item">

				<img loading="lazy" src="img/contact_oficina.png" alt="Origen">

				<div class="content">
					<a href="#" class="title"><?php echo $sucursal; ?></a>
					<p class="sub-title"><?php echo $puesto; ?></p>
				</div>
			</div>

			<div class="contacts-item">
				<img loading="lazy" src="img/contact_ubicacion.png" alt="Origen">
				<div class="content">
					<a href="#" class="title"><?php echo $ciudad; ?></a>
					<p class="sub-title"><?php echo $region; ?></p>
				</div>
			</div>

		</div>

	</div>

</div>
