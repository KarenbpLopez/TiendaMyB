<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    include_once('phpMailer/Exception.php') ;
    include_once('phpMailer/PHPMailer.php') ;
    include_once('phpMailer/SMTP.php');

    //funciones php
    function obtenerCodigo() {
        $rand1 = rand(10,99);
        $rand2 = rand(10,99);
        $rand3 = rand(10,99);

        return $rand1.$rand2.$rand3;
    }

    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        //verificar si existe
        $correo = $_REQUEST["correo"];
        $result = $db->query("SELECT * FROM t_usuario WHERE c_correo = '$correo'");
        $id = "";
        while($row = mysqli_fetch_array($result)) {
            $id = $row[0];
        }
        
        if($id != "") {
            //hacer el resto
            $passtmp = md5(obtenerCodigo());
            $result = $db->query("UPDATE t_usuario SET c_passwordtmp = '$passtmp' WHERE c_correo = '$correo'");

            if($result) {
                $anio = date("Y");

                $Mensaje = "<!DOCTYPE html >
                <html  lang='es'>
                <head>
                    <meta charset='utf-8' />
                    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                    
                    <style type='text/css'>
                        /* Client-specific Styles */
                        div, p, a, li, td { -webkit-text-size-adjust:none; }
                        #outlook a {padding:0;} /* Force Outlook to provide a 'view in browser' menu link. */
                        html{width: 100%; }
                        body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
                        /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
                        .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing. */
                        #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important; }
                        
                        img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
                        a img {border:none;}
                        .image_fix {display:block;}
                        p {margin: 0px 0px !important;}
                        table td {border-collapse: collapse;}
                        table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
                        a {color: #33b9ff;text-decoration: none;text-decoration:none!important;}
                        /*STYLES*/
                        table[class=full] { width: 100%; clear: both; }
                        /*IPAD STYLES*/
                        @media only screen and (max-width: 640px) {
                        a[href^='tel'], a[href^='sms'] {
                        text-decoration: none;
                        color: #33b9ff; /* or whatever your want */
                        pointer-events: none;
                        cursor: default;
                        }
                        .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {
                        text-decoration: default;
                        color: #33b9ff !important;
                        pointer-events: auto;
                        cursor: default;
                        }
                        table[class=devicewidth] {width: 440px!important;text-align:center!important;}
                        table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
                        img[class=banner] {width: 440px!important;height:220px!important;}
                        img[class=col2img] {width: 440px!important;height:220px!important;}
                        
                        
                        }
                        /*IPHONE STYLES*/
                        @media only screen and (max-width: 480px) {
                        a[href^='tel'], a[href^='sms'] {
                        text-decoration: none;
                        color: #33b9ff; /* or whatever your want */
                        pointer-events: none;
                        cursor: default;
                        }
                        .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {
                        text-decoration: default;
                        color: #33b9ff !important; 
                        pointer-events: auto;
                        cursor: default;
                        }
                        table[class=devicewidth] {width: 280px!important;text-align:center!important;}
                        table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
                        img[class=banner] {width: 280px!important;height:140px!important;}
                        img[class=col2img] {width: 280px!important;height:140px!important;}
                        
                        
                        }
                    </style>
                </head>
                <body>                
                
                <!-- start of Full text -->
                <table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='full-text'>
                <tbody>
                    <tr>
                        <td>
                            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                            <tbody>
                                <tr>
                                    <td width='100%'>
                                        <table bgcolor='#ffffff' width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                                        <tbody>
                                            <!-- Spacing -->
                                            <tr>
                                                <td height='20' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                            </tr>
                                            <!-- Spacing -->
                                            <tr>
                                                <td>
                                                    <table width='560' align='center' cellpadding='0' cellspacing='0' border='0' class='devicewidthinner'>
                                                    <tbody>
                                                        <!-- Title -->
                                                        <tr>
                                                            <td style='margin: 0 0 7px; font-size: 22px; color: #e67e22; line-height: 24px;'>
                                                                <h2 >&iexcl;Hola!</h2>
                                                            </td>
                                                        </tr>
                                                        <!-- End of Title -->
                                                        <tr>
                                                            <td width='100%' height='25' style='font-size:1px; line-height:5px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                                        </tr>
                                                        <!-- content -->
                                                        <tr>
                                                            <td style='color: #34495e; margin: 4% 10% 2%; text-align: justify; font-family: sans-serif; margin: 2px; font-size: 20px; line-height: 24px;'>    
                                                                Por favor haz click en el siguiente bot&oacute;n para poder recuperar tu cuenta.
                                                            </td>
                                                        </tr>
                                                        <!-- End of content -->
                                                        
                                                        <!-- spacing -->
                                                        <tr>
                                                        <td width='100%' height='65' style='font-size:1px; line-height:5px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                                    </tr>
                                                    <!-- End of spacing -->
                                                    <table width='270' align='center' border='0' cellpadding='0' cellspacing='0' class='devicewidthinner'>
                                                        <tbody>
                                                            <!-- button -->
                                                            <tr>
                                                                <td>
                                                                <table width='160' height='40' bgcolor='#3498db' align='center' valign='middle' border='0' cellpadding='0' cellspacing='0' style='border-radius:3px;' class='tablet-button'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height='0' align='center' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height='30' align='center' valign='middle' style='font-family: Helvetica, arial, sans-serif;  font-size: 22px;color: #ffffff; text-align:center;line-height: 20px;' class='tablet-button'>
                                                                            <a style='color: #ffffff; text-align:center;text-decoration: none; border-radius: 5px;' href='http://localhost/TiendaMyB/pages/restablecerClave.php?u=$id&cod=$passtmp'>Ingresar</a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height='0' align='center' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                </td>
                                                            </tr>
                                                            <!-- end of button -->
                                                        </tbody>
                                                    </table>
                                                            <!-- spacing -->
                                                        <tr>
                                                            <td width='100%' height='25' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                                        </tr>
                                                        <!-- End of spacing -->
                                                            <td style='color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif; margin: 2px; font-size: 20px;'>
                                                                
                                                                    <p style='color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0'>$anio</p>
                                                            </td>
                                                        </tr>
                                                    </tr>
                                                        
                                                    </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- Spacing -->
                                            <tr>
                                                <td height='20' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                            </tr>
                                            <!-- Spacing -->
                                        </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
                </table>
                <!-- End of Full Text -->
                </body>
                </html>";

                                        
                            //enviar correo con phpmailer
                            $mail = new PHPMailer;                                      //Create a new PHPMailer instance

                            $mail->IsSMTP(); // telling the class to use SMTP
                            $mail->SMTPAuth = true;                  // enable SMTP authentication
                            $mail->Host = "smtp.gmail.com"; // sets the SMTP server
                            $mail->Port = 587;                    // set the SMTP port for the GMAIL server
                            $mail->Username = "ddsistemasii20@gmail.com"; // SMTP account username
                            $mail->Password = "DDsistemas2";        // SMTP account password be 25, 465 or 587
                            
                            $mail->setFrom('ddsistemasii20@gmail.com', "MYB");   //Set who the message is to be sent from
                            $mail->addAddress($correo);                     //Set who the message is to be sent to
                            $mail->isHTML(true);
                            $mail->Subject = 'Restablecer contra';                            //Set the subject line
                            $mail->Body = utf8_decode($Mensaje);                             //Replace the plain text body with one created manually

                            //send the message, check for errors
                            if (!$mail->send()) {
                                $db->rollback();
                                echo -1;
                            } else {
                                $db->commit();
                                echo 0;
                            }
            }
            else {
                //aqui es el error
                echo -1;
            }
        }
        else {
            echo -2;
        }
    }
    else {
        echo -1;
    }
?>