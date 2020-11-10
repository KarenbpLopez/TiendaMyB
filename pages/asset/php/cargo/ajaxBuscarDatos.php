<?php
    if(isset($_POST)) {
        error_reporting(0);
        include "../../../conexion_db.php";

        $query = "%".$_REQUEST['query']."%";

        if($query != "") {
            $result = $db->query("SELECT * FROM t_cargo WHERE c_nombrecargo LIKE '$query' OR db_salario LIKE '$query'");
        }
        else {
            $result = $db->query("SELECT * FROM t_cargo");
        }

        if($result) {
            if($result->num_rows > 0) {
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td>$<?php echo $row[2]; ?></td>
                        <td width="200px">
                            <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="<?php echo $row[0]; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
                            <button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="<?php echo $row[0]; ?>" nombre-cargo="<?php echo $row[1];?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                        </td>
                    </tr>
                    <?php
                }
            }
            else {
                ?><tr><td colspan="4">No se pudieron encontrar datos</td></tr><?php
            }
        }
        else {
            echo -1;
        }
        $db->close();
    }

?>