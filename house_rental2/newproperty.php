<?php
include 'header.php';
include 'config.php';

if (!isset($_SESSION['ownername'])) {
  header("Location: ownerlogin.php");
}


?>
<?php


if (isset($_POST['submit'])) {
    $name        = $_POST['name'];
    $monthly     = $_POST['monthly'];
    $address     = $_POST['address'];
    $access      = $_POST['access'];
    $floor       = $_POST['floor'];
    $utility     = $_POST['utility'];
    $status      = $_POST['status'];
    $city        = $_POST['city'];
    $loclink = $_POST['loclink'];
    $bhk = $_POST['BHK'];
    $owner = $_SESSION['ownername'];

    $descrip     = mysqli_real_escape_string($conn, $_POST['descrip']);
    $target_dir  = "uploads/";
    $target_file = $target_dir . basename($_FILES["images"]["name"]);
    $temp_file   = $_FILES["images"]["name"];
    move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
    $query   = "INSERT INTO properties (name,monthly,city,address,loclink,access,floor,bhk,ownername,utility,descrip,status,images) VALUES ('$name','$monthly','$city','$address','$loclink','$access','$floor','$bhk','$owner','$utility','$descrip','$status','$temp_file')";
    $insert  = $conn->query($query);
    $last_id = $conn->insert_id;
    $c       = count($_FILES['img']['name']);
    if ($insert) {
        if ($c <= 7) {
            for ($i = 0; $i < $c; $i++) {
                $img_name = $_FILES['img']['name'][$i];
                move_uploaded_file($_FILES['img']['tmp_name'][$i], "uploads/" . $img_name);
                $query_multi = "INSERT INTO details(images,proid) VALUES
('$img_name','$last_id')";
                $ins         = $conn->query($query_multi);
            }
        } else {
            echo "MAX LIMIT EXCEED";
        }
    }
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
      <center><h1 class="div-title">Insert New Property</h1></center>
      <form action="" method="post" enctype="multipart/form-data">
        <input
          type="text"
          name="name"
          class="form-input"
          placeholder="Name Of Property"
          required
        />

        <input
          type="number"
          name="monthly"
          class="form-input"
          placeholder="Monthly Charge"
          required
        />

        <select     class="form-input" name="city" id="" required>
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
          placeholder="Full Address"
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
          name="access"
          class="form-input"
          placeholder="Access"
          required
        />

        <input
          type="number"
          name="floor"
          class="form-input"
          placeholder="Floor Space"
          required
        />

        <input
          type="text"
          name="utility"
          class="form-input"
          placeholder="Utility"
          required
        />

        
        <select     class="form-input" name="BHK" id="" required>
          <option value="4">4 BHK</option>
          <option value="3">3 BHK</option>

          <option value="2">2 BHK</option>
          <option value="1">1 BHK</option>
        </select>

        <textarea
          class="form-input"
          name="descrip"
          rows="3"
          id="textArea"          placeholder="Description"

        ></textarea>

        <select     class="form-input" name="status" id="" required>
          <option value="available">NOT SOLD</option>
          <option value="sold">SOLD</option>

          <option value="coming soon">Coming Soon</option>
        </select>
        <label class="label">
        <input class="input-image" type="file" name="images" required />
        <span>SELECT MAIN IMAGE</span>
        </label>

        <label class="label">
        <input class="input-image" type="file" name="img[]" multiple required />
        <span>SELECT OTHER IMAGES</span>
        </label>
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

