<?php
    header('Content-Type: application/json');

	include ("../../server/BD/_config/conexionBD.php");
    include ("../../server/BD/_config/consultaBD.php");
	
	$conexion = new conexionBD();
	$con = $conexion->conectar();
	$consulta = new consultaBD();

	#$id    = $_GET['ID'];
	#$folio = $_GET['folio'];
	

	$hoy            = date("d-m-Y H:i:s");
	$modificadopor  = $_POST['modificadopor'];


	include_once("_formatoFecha.php");

	$conexion = new conexionBD();
	$con = $conexion->conectar();
	$consulta = new consultaBD();

	$TBC     = 'ATC_ELEMENTOSMANTTO';
	$PARC    =  'REQUERIMIENTO, TIPO, HRSSOLUCION';
	// $CADENAC =  "WHERE ID = '$id' AND FOLIO = '$folio'";
	$CADENAC =  "";

	#

	$consulta->consultaDatos($conexion->conexion, $PARC, $TBC, $CADENAC);

    $requerimientos = [];

	while ($resArray = oci_fetch_array($consulta->stmt)) {
        $requerimientos[] = [
            'REQUERIMIENTO' => $resArray['REQUERIMIENTO'],
		    'TIPO' => $resArray['TIPO'],
		    'HRSSOLUCION' => $resArray['HRSSOLUCION']
        ];
	}

    echo json_encode($requerimientos);
?>
