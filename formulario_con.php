<!DOCTYPE html>
<html lang="es">

<head lang="es">
    <?php

    include("_headPlantilla.php");

    ?>

</head>

<body>
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
                <h4 class="stunning-header-title">Mantenimiento Tiendas Consulta</h4>
            </div>
        </div>
        <!-- End Stunning header -->
        <!-- Inicio Formulario -->
        <div class="heading">

            <?php

            include("_formatoFecha.php");

            $conexion = new conexionBD();
            $con = $conexion->conectar();
            $consulta = new consultaBD();

            $PARC    =  '*';

            if ($usuario == 'ivdelgadoga') {

                $TBC = 'ATC_MANTENIMIENTO_TIENDAS';
                #$CADENAC = "WHERE ESTATUS = 'Asignado' ORDER BY FECHA DESC";
                $CADENAC = "ORDER BY FECHA DESC";
            } elseif ($usuario == 'nvvazquez' || $usuario == 'asaucedo' || $usuario == 'estrejo' || $usuario == 'jmtellez' || $usuario == 'dcruzs' || $usuario == 'krojo' || $usuario == 'ssmartinez') {

                $TBC = 'ATC_MANTENIMIENTO_TIENDAS';
                $CADENAC =  "ORDER BY FECHA DESC";
            } else {

                if ($nivel == '1' || $nivel == '2') {

                    $TBC = 'ATC_MANTENIMIENTO_TIENDAS';
                    $CADENAC = "WHERE TIENDA = '$sucursal' ORDER BY FECHA DESC";
                }

                if ($nivel == '3') {

                    $TBC = 'ATC_REQMARKETING LEFT JOIN ATC_SUCURSAL ON ATC_SUCURSAL.SUCURSAL = ATC_REQMARKETING.TIENDA LEFT JOIN ATC_RESPONSABLES ON ATC_RESPONSABLES.HUB = ATC_SUCURSAL.HUB';
                    #LEFT JOIN ATC_SUCURSAL ON ATC_SUCURSAL.SUCURSAL = ATC_REQMARKETING.TIENDA LEFT JOIN ATC_RESPONSABLES ON ATC_RESPONSABLES.HUB = ATC_SUCURSAL.HUB
                    $CADENAC =  "WHERE ATC_RESPONSABLES.RESPONSABLE = '$usuario' ORDER BY FECHA DESC";
                }
            }

            $consulta->consultaDatos($conexion->conexion, $PARC, $TBC, $CADENAC);

            ?>

            <div class="heading-line">
                <?php #echo $usuario; 
                ?>
            </div>
        </div>

        <!-- Fin Formulario -->
        <!-- Contactos -->
        <!-- Fin Contactos -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class='div_tabla'>

                    <table class="shop_table cart table table-hover" id='tabla-mantenimiento-tiendas'>
                        <thead class="cart-product-wrap-title-main">
                            <tr>
                                <th>Fecha</th>
                                <th>Folio</th>
                                <th>Usuario</th>
                                <!-- <th>Region</th> -->
                                <!-- <th>Ciudad</th> -->
                                <!-- <th>Tienda</th> -->
                                <th>Requerimiento</th>
                                <th>Tipo</th>
                                <th>Comentarios</th>
                                <th>Fecha Modificado</th>
                                <!-- <th>Usuario Modificador</th> -->
                                <th>Área Responsable</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <?php

                        echo "<tbody>";

                        while ($resArray = oci_fetch_array($consulta->stmt)) {

                            echo "<tr class='cart_item'>";
                            echo '<td>' . $resArray['FECHA'] . '</td>';
                            echo '<td>' . $resArray['FOLIO'] . '</td>';
                            echo "<td>" . $resArray['USUARIO'] . "</td>";
                            #echo "<td>" . $resArray['REGION'] . "</td>";
                            #echo "<td>" . $resArray['CIUDAD'] . "</td>";
                            #echo "<td>" . $resArray['TIENDA'] . "</td>";
                            echo "<td>" . $resArray['REQUERIMIENTO'] . "</td>";
                            echo "<td>" . $resArray['CATEGORIA'] . "</td>";
                            echo "<td>" . $resArray['COMENTARIOS'] . "</td>";
                            echo "<td>" . $resArray['FECHAMODIFICADO'] . "</td>";
                            #echo "<td>" . $resArray['USUARIOMODIFICA'] . "</td>";
                            echo "<td>" . $resArray['AREARESPONSABLE'] . "</td>";
                            echo "<td>" . $resArray['ESTATUS'] . "</td>";
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
    <!-- Inicio Footer -->
    <footer class="footer">

        <?php include("_footerHome.php"); ?>

    </footer>
    <!-- Fin Footer -->
    <!-- JS Script -->
    <?php include("_scripts.php"); ?>
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/datatables.css" rel="stylesheet">
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/jquery.tablesorter.js"></script>
    <script src="js/jquery.tablesorter.widgets.js"></script>
    <script src="js/jquery.tablesorter.combined.js"></script>
    <script src="js/tablas_fechacompleta.js"></script>
    <script src="js/rangoFechas.js"></script>
    <script src="js/atm_incidencias_edi.js"></script>
    <script src="js/tablascx.js"></script>
    <!-- ...end JS Script -->
</body>

</html>
