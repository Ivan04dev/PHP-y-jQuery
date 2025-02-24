<?php
#echo "Desde mntto_tiendas_con.php";

    include("../../server/BD/_config/conexionBD.php");
    include("../../server/BD/_config/consultaBD.php");

    $conexion = new conexionBD();
    $con = $conexion->conectar();
    $consulta = new consultaBD();

    $consulta->consultaDatos($conexion->conexion,
    "*",
    "ATC_MANTENIMIENTO_TIENDAS",
    "ORDER BY FECHA DESC");

?>

<div class="container">
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
                                        <table class="table table-hover" id='abastecimiento'>
                                            <thead class="cart-product-wrap-title-main">
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Folio</th>
                                                    <th>Usuario</th>
                                                    <th>Region</th>
                                                    <th>Ciudad</th>
                                                    <th>Tienda</th>
                                                    <th>Requerimiento</th>
                                                    <th>Tipo</th>
                                                    <th>Comentarios</th>
                                                    <th>Fecha Modificado</th>
                                                    <th>Usuario Modificador</th>
                                                    <th>Área Responsable</th>
                                                    <th>Estatus</th>
                                                </tr>
                                            </thead>
                                            <?php

                                            echo "<tbody>";

                                            while ($resArray = oci_fetch_array($consulta->stmt)) {

                                                echo "<tr class='cart_item'>";
                                                echo '<td>' . $resArray['FECHA'] . '</td>';
                                                echo '<td>'.$resArray['FOLIO'].'</td>';
                                                echo "<td>" . $resArray['USUARIO'] . "</td>";
                                                echo "<td>" . $resArray['REGION'] . "</td>";
                                                echo "<td>" . $resArray['CIUDAD'] . "</td>";
                                                echo "<td>".$resArray['TIENDA']."</td>";
                                                echo "<td>".$resArray['REQUERIMIENTO']."</td>";
                                                echo "<td>" . $resArray['CATEGORIA'] . "</td>";
                                                echo "<td>" . $resArray['COMENTARIOS'] . "</td>";
                                                echo "<td>" . $resArray['FECHAMODIFICADO'] . "</td>";
                                                echo "<td>" . $resArray['USUARIOMODIFICA'] . "</td>";
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

                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <!-- FIN TABLA -->
    </div>
