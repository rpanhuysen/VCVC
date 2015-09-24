<?php
session_start();
if (! isset( $_SESSION[myusername] ) ){
	header("location:../main_login.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//DU" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="du">
  <head>
  	<title>Homesite Roeland Panhuysen - Boeken</title>
  	<meta charset="utf-8">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Homesite">
    <meta name="author" content="Roeland Panhuysen">
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

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
		<a class="navbar-brand" href="##" style="color:#BEF781;text-align:" >Te doen</a>
        </div>
		<form class="navbar-right" action="logout.php" method="Post">
           <a class="navbar-brand" href="../logout.php" style="color:#81BEF7">Uitloggen</a>
	    </form>       
    </nav>
    <div class="container">
    	<div class="row">

<?php
			echo 	"<div class=\"col-md-6\">	  
					  <p><h2><br></h2><h4>Lijstje te doen:<br>
					  3. Pijndagboek in aangepaste vorm toevoegen<br>
					  4. Breadcrumb voor site(siteindex) maken
					  5. Certificaten ed
					  6. Google maps
					  7. <a href=\"(https://www.enocean.com/en/energy-harvesting/)\">Energy harvesting </a>
					  </h4></p>
					</div>";
			echo 	"<div class=\"col-md-6\">
					  <p><h2><br></h2><h4>Lijstje gedaan:<br>
					  1. uniform stijl op pagina's <br>
					  2. Boeken item toegevoegd<br></h4></p>		 
					</div>";		

?>
	</div>
</div>
</body>
</html>
