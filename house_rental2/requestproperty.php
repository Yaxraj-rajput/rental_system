<?php
include 'header.php';
include 'config.php';

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}


?>
<?php


if (isset($_POST['submit'])) {
    $name        = $_SESSION['username'];
    $prop_id = $_SESSION['prop_id'];
    $phone = $_POST['phone'];
    $email = $_SESSION['email'];
    $offer_price = $_POST['offer_price'];
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id']; 


    // echo $name;
    // echo $prop_id;
    // echo $email;
    $descrip     = mysqli_real_escape_string($conn, $_POST['descr']);
    
    $query   = "INSERT INTO `request_property`(`id`, `name`, `prop_id`, `phone`, `email`, `address`, `offer_price`, `user_id`, `descrip`) VALUES ('[value-1]','$name','$prop_id','$phone','$email','$address','$offer_price','$user_id','$descrip')";
    $insert  = $conn->query($query);
    $last_id = $conn->insert_id;

}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/insertstyle.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="main-div">
      <center><h1 class="div-title">Request Property</h1></center>
      <form action="" method="post" enctype="multipart/form-data">


        <input
          type="number"
          name="phone"
          class="form-input"
          placeholder="Phone Number"
          required
        />

        
        <input
          type="number"
          name="offer_price"
          class="form-input"
          placeholder="Offer Price"
          required
        />


        
        <input
          type="text"
          name="address"
          class="form-input"
          placeholder="Full Address"
          required
        />

    

        <textarea
          class="form-input"
          name="descr"
          rows="3"
          id="textArea"
          placeholder="Description"
          required
        ></textarea>



<br>
        <button type="reset" class="cancel-btn">Cancel</button>
        <br>
        <button type="submit" name="submit" class="submit-btn">
          Submit
        </button>
      </form>
    </div>
  </body>
</html>

