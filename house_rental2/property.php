<?php 

include 'header.php';
include 'config.php';









if (isset($_POST['price_filter_ps']))
{
  $price_fil_ps = $_POST['price_filter_ps'];
}

else
{
  $price_fil_ps = 9999999999;
}



if (isset($_POST['price_filter_ng']))
{
  $price_fil_ng = $_POST['price_filter_ng'];
}

else
{
  $price_fil_ng = 0;
}





if (isset($_POST['type_filter_ps']))
{
  $type_fil_ps = $_POST['type_filter_ps'];
}

else
{
  $type_fil_ps = 5;
}


if (isset($_POST['type_filter_ng']))
{
  $type_fil_ng = $_POST['type_filter_ng'];
}

else
{
  $type_fil_ng = 0;
}




$query="SELECT * FROM properties WHERE monthly <= $price_fil_ps and monthly >= $price_fil_ng AND bhk <= $type_fil_ps AND  bhk >= $type_fil_ng;"  ;




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
  <input type="number" name="price_filter_ps" placeholder="Price Maxiumum" class="input" required>
  <input type="number" name="price_filter_ng" placeholder="Price Minimum" class="input" required>

  <input type="number" name="type_filter_ps" placeholder="BHK Maximum" class="input" required>
  <input type="number" name="type_filter_ng" placeholder="BHK Minimum" class="input" required>

  <button type="submit">Filter</button>
</form>
</div>   
      <?php while ($row=$read->fetch_assoc()) { ?>

      <div class="card-div">
        <div class="card-image">
          <img src="uploads/<?php echo  $row['images']; ?>" class="upld_img" />
        </div>

        <div class="card-side-cent"></div>
        <div class="card-content">
        <h3 class="content-card-desc">Description:</h3>
        <p class="content-descr"> <?php echo $row['descrip'];  ?></p>
        </div>
        <div class="card-side-right">
        <h1 class="content-card-title"><?php echo  $row['name'];   ?></h1>
        <h2 class="content-card-rent"><?php echo  $row['monthly'];   ?>$</h2>
        <a href="aboutproperty.php?posts=<?php echo  $row['id'];  ?>"> <button class="card-visit-btn">VISIT PROPERTY</button></a>
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
