<?php
    if(isset($_POST)) {
        error_reporting(0);
        include "../../../conexion_db.php";

        $query = "%".$_REQUEST['query']."%";

        if($query != "") {
            $result = $db->query("SELECT * FROM t_cliente WHERE c_dui LIKE '$query' OR c_nombre LIKE '$query' OR c_apellido LIKE '$query'
            OR c_direccion LIKE '$query'");
        }
        else {
            $result = $db->query("SELECT * FROM t_cliente");
        }

        if($result) {
            if($result->num_rows > 0) {
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td width="130px">
                            <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="<?php echo $row[0]; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
                            </td>
                        <td width="130px">
                            <button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="<?php echo $row[0]; ?>" nombre-cargo="<?php echo $row[1];?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                            </td>
                    </tr>
                    <?php
                }
            }
            else {
                ?><tr><td colspan="7">No se pudieron encontrar datos</td></tr><?php
            }
        }
        else {
            echo -1;
        }

        $db->close();
    }
?>