<?php
    if(isset($_POST)) {
        error_reporting(0);
        include "../../../conexion_db.php";

        $query = "%".$_REQUEST['query']."%";

        if($query != "") {
            $result = $db->query("SELECT p.e_idproducto,p.c_nombreproducto, p.e_porcentajeganancia, p.e_precioventa,m.c_nombremarca, c.c_nombrecategoria
                FROM t_producto as p
                INNER JOIN t_marca as m ON p.e_idmarca = m.e_idmarca
                INNER JOIN t_categoria AS c ON p.e_idcategoria = c.e_idcategoria
                WHERE p.c_nombreproducto LIKE '$query' OR m.c_nombremarca LIKE '$query' OR c.c_nombrecategoria LIKE '$query'");
        }else {
            $result = $db->query("SELECT * FROM t_producto");
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
                        <td width="130px"><button type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="<?php echo $row[0];?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Modificar</button></td>
                    <td width="120px"><button type="button" class="form-control btn-danger roundtext eliminar-datos" data-toggle="modal" tag="<?php echo $row[0]?>" nombre-producto="<?php echo $row[1]; ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Eliminar</button></td>
                    </tr>
                    <?php
                }
            }
            else {
                ?><tr><td colspan="8">No se pudieron encontrar datos</td></tr><?php
            }
        }
        else {
            echo -1;
        }

        $db->close();
    }
?>