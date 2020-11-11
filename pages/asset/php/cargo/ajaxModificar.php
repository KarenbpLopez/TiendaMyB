<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_cargo = $_REQUEST['id_cargo'];

        $cargo = $_REQUEST['cargo'];
        $salario = $_REQUEST['salario'];
        $tipo = $_REQUEST['tipo'];

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar primero cargo
        $result_cargo = $db->query("UPDATE t_cargo SET c_nombrecargo = '$cargo', db_salario = '$salario', e_tipo = '$tipo' WHERE e_idcargo = $id_cargo");

        if($result_cargo) {
            echo $id_cargo;

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