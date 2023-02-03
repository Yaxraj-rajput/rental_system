<?php
include 'config.php';

session_start();
if (!isset($_SESSION['ownername'])) {
  header("Location: ownerlogin.php");
}


    $req_id = $_GET['id'];


    $dl_query = "DELETE FROM properties where id = {$req_id}";
    mysqli_query($conn, $dl_query);


    header("Location: manageproperty.php");

    ?>