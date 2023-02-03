<?php
include 'config.php';

session_start();
if (!isset($_SESSION['ownername'])) {
  header("Location: ownerlogin.php");
}


    $req_id = $_GET['id'];


    $dl_query = "DELETE FROM request_property where id = {$req_id}";
    mysqli_query($conn, $dl_query);


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
    
    
        $send_mail_to = $_GET['email'];
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tsupperb@gmail.com';                     //SMTP username
        $mail->Password   = 'hnlctxfjwzdnmogy'; //SMTP password                             
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;           
    
    
        $mail->setFrom('tsupperb@gmail.com');
        $mail->addAddress($_GET['email']);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'House not available';
        $mail->Body    = '<b>Greeting from</b><br> house rental system, <br><br><br> We are sorry to share that the house you were looking for is not available for you at the momment, Kindly contact the administrator for further details. <br><br><br> For more information contact us at 000 000 000.<br><br><br> warm regards,<br><b>House rental system</b>';
    
    
        $mail->send();
    
    echo"<script>
    alert('Mail sent');
    </script>";
        
    
    header("Location: managerequest.php");



    

?>