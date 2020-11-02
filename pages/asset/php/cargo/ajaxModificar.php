<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_cargo = $_REQUEST['id_cargo'];

        $cargo = $_REQUEST['cargo'];
        $salario = $_REQUEST['salario'];

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar primero empleado
        $result_cargo = $db->query("UPDATE t_cargo SET c_nombrecargo = '$cargo', db_salario = '$salario' WHERE e_idcargo = $id_cargo");

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