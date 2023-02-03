<?php 

include 'header.php';
include 'config.php';



if (!isset($_SESSION['ownername'])) {
    header("Location: index.php");
}

$usr_name = $_SESSION['ownername'];



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





if (isset($_POST['type_filter']))
{
  $type_fil = $_POST['type_filter'];
}

else
{
  $type_fil = 5;
}




$query="SELECT * FROM properties WHERE ownername = '{$usr_name}';"  ;




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

  <input type="number" name="type_filter" placeholder="BHK" class="input" required>

  <button type="submit">Filter</button>
</form>
</div>   
      <?php while ($row=$read->fetch_assoc()) { ?>

        <?php 		$_SESSION['prop_id'] = $row['id'];
  ?>
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
        <a href="editproperty.php?id=<?php echo  $row['id'];  ?>&monthly=<?php echo  $row['monthly'];   ?>&name=<?php echo  $row['name'];   ?>&city=<?php echo  $row['city'];   ?>&address=<?php echo  $row['address'];   ?>&access=<?php echo  $row['access'];   ?>&floor=<?php echo  $row['floor'];   ?>&bhk=<?php echo  $row['bhk'];   ?>&utility=<?php echo  $row['utility'];   ?>&descrip=<?php echo  $row['descrip'];   ?>&status=<?php echo  $row['status'];   ?>"> <button class="card-visit-btn">Edit Details</button></a>
        </div>
      </div>

      <?php } ?>
    </div>

    <div class="control_pan_main">
      <a href="managerequest.php"><button>Manage Requests</button></a>
      <a href="newproperty.php"><button>Add New Property</button></a>
    </div>

    <style>
      .control_pan_main {
  display: flex;
  background-color: #000;
  width: 100vw;
  padding: 4rem 0rem;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.control_pan_main button
{
  padding: 1rem 2rem;
  margin: 1rem;
  background-color: #99cd32;
}
    </style>

    
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
