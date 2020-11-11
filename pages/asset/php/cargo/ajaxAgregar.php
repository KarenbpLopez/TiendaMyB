<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $cargo = $_REQUEST['cargo'];
        $salario = $_REQUEST['salario'];
        $tipo = $_REQUEST['tipo'];

        //COMIENZA
        $db->autocommit(FALSE);

        // $nuevo = $db->query("SELECT * FROM  t_cargo WHERE c_nombrecargo = '" .$cargo. "'");
        // if(mysql_num_rows($nuevo) > 0){
        //     // alert("ya existe");
        //     
        // }else{
        //insertar primero cargo
        $result_cargo = $db->query("INSERT INTO t_cargo(c_nombrecargo, db_salario, e_tipo) VALUES ('$cargo','$salario','$tipo')");
        $id_cargo = $db->insert_id;

        if($result_cargo) {
            echo $id_cargo;

            $db->commit();
            $db->autocommit(TRUE);
        }
        else {
            echo -1;
            $db->rollback();
            $db->autocommit(TRUE);
        // }
        }

        //TERMINA
    }
    else {
        echo -1;
    }
    
?>