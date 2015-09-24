<?php
session_start();
if (! isset( $_SESSION[myusername] )  ){
	header("location:../main_login.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//DU" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="du">
  <head>
  	<title>Gezelligheids site</title>
  	<meta charset="utf-8">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Homesite">
    <meta name="author" content="Roeland Panhuysen">
    <link rel="icon" href="/images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
    <link href="../boeken/jumbotron.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div align="left">
		<a class="navbar-brand" href="##" style="color:#BEF781;text-align:" >Database stemmen VcVcs</a>
        </div>
		<form class="navbar-right" action="../boeken/logout.php" method="Post">
           <a class="navbar-brand" href="../logout.php" style="color:#81BEF7">Uitloggen</a>
	    </form>       
    </nav>
    <div class="container">
    	<div class="row">Dagboek
	</div>
    <!--- --->
    <div class="container">
    	<div class="col-md-12"><br><br>
        </div>
    <div class="container">
	<!--- --->
<div class="container-fluid" align="center">
 
  <div class="row" style="background-color:lavender;">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
      <p>voornaam</p>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
      <p>Cafe</p>
    </div>
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
      <p>Sfeer</p>
    </div>
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
      <p>Muziek</p>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
      <p>Assortiment</p>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" >
      <p>Publiek</p>
    </div>
	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
      <p>Behang</p>
    </div>
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      <p>Datum Tijd</p>
    </div>
  </div>
<?php

$servername = "localhost";
$username = "root";
$password = "raspberryadmin";
$dbname = "VCVC";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM gevoel";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

			$sfeer = round($row[sfeer]*10, 0, PHP_ROUND_HALF_UP);
			$assortiment = round($row[assortiment]*10, 0, PHP_ROUND_HALF_UP);
			$muziek = round($row[muziek]*10, 0, PHP_ROUND_HALF_UP);
			$publiek = round($row[publiek]*10, 0, PHP_ROUND_HALF_UP);
			$behang = round($row[behang]*10, 0, PHP_ROUND_HALF_UP);

			echo "<div class=\"row\" style=\"background-color:lavenderblush;\">
					<div class=\"col-xs-2 col-sm-2 col-md-2 col-lg-2\">
					  <p>$row[voornaam]</p>
					</div>
					<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">
					  <p>$row[cafe]</p>
					</div>
					<div class=\"col-xs-1 col-sm-1 col-md-1 col-lg-1\">
					  <p>$sfeer</p>
					</div>
					<div class=\"col-xs-1 col-sm-1 col-md-1 col-lg-1\">
					  <p>$muziek</p>			
					</div>
					<div class=\"col-xs-1 col-sm-1 col-md-1 col-lg-1\">
					  <p>$assortiment</p>
					</div>
					<div class=\"col-xs-1 col-sm-1 col-md-1 col-lg-1\">
					  <p>$publiek</p>
					</div>
					<div class=\"col-xs-1 col-sm-1 col-md-1 col-lg-1\">
					  <p>$behang</p>			
					</div>
					<div class=\"col-xs-2 col-sm-2 col-md-2 col-lg-2\">
					  <p>$row[last_update]</p>	  
					</div>
				  </div>";
        }
} else {
    echo "Select from gevoel geeft geen resultaten";
}

mysqli_close($conn);

?>
	</div>
</div>
</body>
</html>

