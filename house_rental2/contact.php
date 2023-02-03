<?php 
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>



<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Contact | House Rental</title>
    <link rel="stylesheet" href="./styles/contactstyle.css">
</head>
<body>



<!----------preloader start--------->



    <!----------preloader end--------->


    
<div class="cnmain">
<div class="cnbox">
	<div class="row">
			<h1>Apply Newsletter</h1>
	</div>
	<div class="row">
			<h4 style="text-align:center">We will get back soon!</h4>
	</div>

    <form name="submit-to-google-sheet">
	<div class="row input-container">
			<div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text" name="Name" required >
					<label>Name</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="email" name="Recipient" required >
					<label>Email</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" name="Phone" required >
					<label>Phone Number</label> 
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input wide">
					<textarea name="Text" ></textarea>
					<label>Message</label>
				</div>
			</div>
			<div class="col-xs-12">
				<button class="btn-lrg submit-btn" type="submit">Send an Email</button>
			</div>
	</div>
</div>

</form>


</div>

<!--------Footer start------->




<script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbz6dvGQuNm-qTqOF2N20ZRNOPgWXxWn-pGZI0PkU0SHzJdF7yg6mIzT2Mmat4iXj-23bA/exec'
  const form = document.forms['submit-to-google-sheet']

  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => console.log('Success!', response))
      .catch(error => console.error('Error!', error.message))
  })
</script>

</body>
</html>