<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $nombremarca = $_REQUEST['nombre'];

        //COMIENZA
        $db->autocommit(FALSE);

        //insertar marca
        $result_marca = $db->query("INSERT INTO t_marca(c_nombremarca) VALUES ('$nombremarca')");
        $id_marca = $db->insert_id;

        if($result_marca) {
            echo $id_marca;

            $db->commit();
            $db->autocommit(TRUE);
        }
        else {
            echo -1;
            $db->rollback();
            $db->autocommit(TRUE);
        }

        //TERMINA
    }
    else {
        echo -1;
    }
?>