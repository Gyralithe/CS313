
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Week 3 Team PHP</title>
</head>

<body>

  <div>
	  Username: <?php echo $_POST["name"];?>
	</div>
	<div>
    Email: <?php echo $_POST["email"];?>
	</div>
	<div>
	  Major: <?php echo $_POST["major"];?>
	</div>
	<div>
	  Comments: <?php echo $_POST["comments"];?>
	</div>
	<div> 
	  Continents:
	  <?php
      for ($i = 1; $i < 8; $i++) {
        if (isset($_POST['continent'.$i])){
          echo $_POST['continent'.$i];
        }
      };
    ?>
  </div>

</body>
</html>
