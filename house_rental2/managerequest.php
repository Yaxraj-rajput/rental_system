<?php 

include 'header.php';
include 'config.php';

session_start();

if (!isset($_SESSION['ownername'])) {
    header("Location: index.php");
}



if (isset($_POST['price_filter']))
{
  $price_fil = $_POST['price_filter'];
}

else
{
  $price_fil = 9999999999;
}






$query="SELECT * FROM request_property WHERE offer_price < $price_fil;"  ;




$read=$conn->query($query); 



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Document</title>
  </head>
  <body>

    <div class="main-div">
<div class="left-div-bar"><form action="" method="post">
  <input type="number" name="price_filter" placeholder="Price" class="input" required>

  <button type="submit">Filter</button>
</form>
</div>   
      <?php while ($row=$read->fetch_assoc()) { ?>

      <div class="card-div">
        

        <div class="card-side-cent"></div>
        <div class="card-content">
        <h3 class="content-card-desc">Description:</h3>
        <p class="content-descr"> <?php echo $row['descrip'];  ?></p>
        <h3 class="content-card-desc">Contact number:</h3>
        <p class="content-descr"> <?php echo $row['phone'];  ?></p>
        <h3 class="content-card-desc">Email:</h3>
        <p class="content-descr"> <?php echo $row['email'];  ?></p>
        </div>
        <div class="card-side-right">
        <h1 class="content-card-title"><?php echo  $row['name'];   ?></h1>
        <h2 class="content-card-rent"><?php echo  $row['offer_price'];   ?>$</h2>
        <a href="sendmail.php?email=<?php echo  $row['email'];  ?>"> <button onclick="" class="card-visit-btn" style="margin: 1rem;">APPROVE</button></a>

        <a href="deletedata.php?id=<?php echo  $row['id'];  ?>&email=<?php echo  $row['email'];  ?>"> <button class="card-visit-btn" style="margin: 1rem; background-color: #630909;">DECLINE</button></a>
    </div>
      </div>

      <?php } ?>
    </div>

    
  </body>
</html>
<!-- 
<div class="main-div">
  <a href="single.php?posts=<?php echo  $row['id'];  ?>"><div class="card-div">
    <h1><?php echo  $row['name'];   ?></h1>

    <h2><?php echo  $row['monthly'];   ?></h2>

    <h2><?php echo  $row['address'];   ?></h2>
    <img src="uploads/<?php echo  $row['images']; ?>" class="upld_img" />
    <br />
    <a href="single.php?posts=<?php echo  $row['id'];  ?>">Details</a>
  </div>
</div>
</a>
