<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_cargo = $_REQUEST['id_cargo'];

        //COMIENZA
        $db->autocommit(FALSE);

        //borrar primero dias
        $result_cargo = $db->query("DELETE FROM t_cargo WHERE e_idcargo = $id_cargo");

        if($result_cargo) {
            echo 0;

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