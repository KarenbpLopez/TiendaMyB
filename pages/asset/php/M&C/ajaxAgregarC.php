<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $nombrecategoria = $_REQUEST['nombre'];

        //COMIENZA
        
        $db->autocommit(FALSE);
           $result_categoria = $db->query("INSERT INTO t_categoria(c_nombrecategoria) VALUES ('$nombrecategoria')");
           $id_categoria = $db->insert_id;
           

           if($result_categoria) {
            echo $id_categoria;
            
            $db->commit();
            $db->autocommit(TRUE);
           }
           else {
            echo -1;
            $db->rollback();
            $db->autocommit(TRUE);
           }
    }
            //TERMINA 
    else {
        echo -1;
    }
?>