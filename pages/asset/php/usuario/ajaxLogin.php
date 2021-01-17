<?php
    session_start();

    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        //verificar si existe
        $correo = $_REQUEST["correo"];
        $password = md5($_REQUEST["clave"]);

        $result = $db->query("SELECT * FROM t_usuario WHERE c_correo = '$correo' AND c_clave = '$password'");
        $id = "";
        while($row = mysqli_fetch_array($result)) {
            $id = $row[0];

            $_SESSION["id_emp"] = $row[3];
            $_SESSION["id_user"] = $row[0];
        }

        if($id != "") {
            echo 0;
        }
        else {
            echo -1;
        }

        $db->close();
    }
    else {
        echo -1;
    }
?>