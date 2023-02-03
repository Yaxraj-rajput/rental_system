<?php
include 'header.php';
include 'config.php';



session_start();
if (!isset($_SESSION['ownername'])) {
  header("Location: ownerreg.php");
}


$id = $_SESSION['prop_id'];


if (isset($_GET['submit'])) {
    $name        = $_GET['name'];
    $monthly     = $_GET['monthly'];
    $address     = $_GET['address'];
    $access      = $_GET['access'];
    $floor       = $_GET['floor'];
    $utility     = $_GET['utility'];
    $status      = $_GET['status'];
    $city        = $_GET['city'];
    $bhk = $_GET['bhk'];

    $descrip     = mysqli_real_escape_string($conn, $_GET['descrip']);
    
    $query   = "UPDATE `properties` SET `name`='$name',`monthly`='$monthly',`city`='$city',`address`='$address',`access`='$access',`floor`='$floor',`bhk`='$bhk',`utility`='$utility',`descrip`='$descrip',`status`='$status' WHERE id = '$id'";
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
      <center><h1 class="div-title">Edit Property</h1></center>
      <form action="" method="GET" enctype="multipart/form-data">
        <input
          type="text"
          value="<?php echo  $_GET['name'];   ?>"
          name="name"
          class="form-input"
          placeholder="Name Of Property"
          required
        />

        <input
          type="number"
          value="<?php echo  $_GET['monthly'];   ?>"
          name="monthly"
          class="form-input"
          placeholder="Monthly Charge"
          required
        />

        <select class="form-input" name="city" id="" required>
          <option value="<?php echo  $_GET['city'];   ?>" selected><?php echo  $_GET['city'];   ?></option>

          <option value="Ahmedabad">Ahmedabad</option>
          <option value="Surat">Surat</option>

          <option value="Rajkot">Rajkot</option>
          <option value="Vadodara">Vadodara</option>
          <option value="Bhavnagar">Bhavnagar</option>
          <option value="Jamnagar">Jamnagar</option>
          <option value="Navsari">Navsari</option>
        </select>

    

        <textarea
          class="form-input"
          

          name="address"
          rows="3"
          id="textArea"
          placeholder="<?php echo  $_GET['address'];   ?>"
          required
        ></textarea>


        <input
        type="text"
          class="form-input"
          name="loclink"
   
          placeholder="Location link"
          required
        />
          
        <input
          type="text"
          value="<?php echo  $_GET['access'];   ?>"

          name="access"
          class="form-input"
          placeholder="Access"
          required
        />

        <input
          type="number"
          value="<?php echo  $_GET['floor'];   ?>"

          name="floor"
          class="form-input"
          placeholder="Floor Space"
          required
        />

        <input
          type="text"
          value="<?php echo  $_GET['utility'];   ?>"

          name="utility"
          class="form-input"
          placeholder="Utility"
          required
        />

        
        <select     class="form-input" name="bhk" id="" required>
        <option value="<?php echo  $_GET['bhk'];   ?>" selected><?php echo  $_GET['bhk'];   ?></option>
          <option value="4">4 BHK</option>
          <option value="3">3 BHK</option>

          <option value="2">2 BHK</option>
          <option value="1">1 BHK</option>
        </select>

        <textarea
          class="form-input"
         

          name="descrip"
          rows="3"
          id="textArea"          placeholder="<?php echo  $_GET['descrip'];   ?>"

        ></textarea>

        <select     class="form-input" name="status" id="" required>
        <option value="<?php echo  $_GET['status'];   ?>" selected><?php echo  $_GET['status'];   ?></option>
          <option value="available">NOT SOLD</option>
          <option value="sold">SOLD</option>

          <option value="coming soon">Coming Soon</option>
        </select>
        <!-- <label class="label">
        <input class="input-image" type="file" name="images" required />
        <span>SELECT MAIN IMAGE</span>
        </label>

        <label class="label">
        <input class="input-image" type="file" name="img[]" multiple required />
        <span>SELECT OTHER IMAGES</span>
        </label> -->
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

