<?php include 'header.php'; ?>

<?php

session_start();



include 'config.php';

 if(isset($_GET['posts'])){
$id=$_GET['posts']; $query2= "SELECT * FROM properties where id='$id'";
$readd=$conn->query($query2); } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>property</title>
    <link rel="stylesheet" href="./styles/productstyle.css" />
  </head>
  <body>
    <a href="property.php">
      <div class="prv-btn"><</div>
    </a>

    <?php while ($row= $readd->fetch_assoc()) { ?>
    <div class="main-div">
      <div class="left-div">
        <img src="uploads/<?php echo  $row['images']; ?>" class="upld_img" />
      </div>
      <div class="right-div">
        <h1 class="prpt-name"><?php echo  $row['name'];   ?></h1>
        <h1 class="prpt-price">
          Monthly Rent<br />
          <span><?php echo  $row['monthly'];   ?>$</span>
        </h1>

        <h1 class="prpt-price">
          Availability<br />
          <span><?php echo  $row['status'];   ?></span>
        </h1>

        <h1 class="prpt-price">
          Location<br />
          <span><?php echo  $row['city'];   ?></span>
        </h1>

        <a href="requestproperty.php"><button class="contact-btn">CONTACT OWNER</button></a>
      </div>
    </div>
    <div class="cent-div">
      <h1 style="color: rgb(225, 223, 223)">Description:</h1>
      <p class="content-desc"><?php echo $row['descrip'];  ?></p>
      <div class="images">
        <h1 style="color: rgb(225, 223, 223); margin-top: 4rem">Images:</h1>
        <br />

        <?php  $image_name="SELECT * FROM properties as p join details as d 
      on p.id =d.proid where d.proid =".$row['id'];
     $_SESSION['prop_id'] = $row['id'];
      $read1=$conn->query($image_name); foreach ($read1 as $value) { ?>

        <div class="image">
          <img src="uploads/<?php echo $value['images']; ?>" />
        </div>

        <?php  } ?>
      </div>
      <h1 class="prpt-price with-bg">
        Floor Area<br />
        <span><?php echo  $row['floor'];   ?></span>
      </h1>
      <h1 class="prpt-price with-bg">
        Utility<br />
        <span><?php echo  $row['utility'];   ?></span>
      </h1>

      <h1 class="prpt-price with-bg">
        Type<br />
        <span><?php echo  $row['bhk'];   ?> BHK</span>
      </h1>

      
      <h1 class="prpt-price with-bg">
        Owner<br />
        <span><?php echo  $row['ownername'];   ?> </span>
      </h1>
      <h1 style="color: rgb(225, 223, 223); margin-top: 4rem">Location:</h1>

      <div class="map-div">
        <iframe
          src="<?php echo  $row['loclink'];  ?>"
          width="100%"
          height="100%"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
      <a href="<?php echo  $row['loclink'];  ?>"
        ><button class="get-dir-btn">Get Direction</button></a
      >
    </div>
    <?php   } ?>
  </body>
</html>

<!-- 
<?php while ($row= $readd->fetch_assoc()) { ?>

<tr>
  <td> <?php echo $row['address'];  ?></td>
  <td><?php echo $row['access'];  ?></td>
  <td><?php echo $row['floor'];  ?></td>
  <td><?php echo $row['utility'];  ?></td>
  <td><?php echo $row['descrip'];  ?></td>
  <td class="rooms">

      <?php  $image_name="SELECT * FROM properties as p join details as d 
            on p.id =d.proid where d.proid =".$row['id'];
            $read1=$conn->query($image_name);

            foreach ($read1 as $value) { ?>

              <img src="uploads/<?php echo $value['images']; ?>" />
              
            <?php  } ?>
            </td>
</tr>
<?php   } ?> -->
