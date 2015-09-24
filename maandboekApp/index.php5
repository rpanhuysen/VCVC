<?php
session_start();
if (! isset( $_SESSION[myusername] ) ){
	header("location:../main_login.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//DU" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="du">
  <head>
  	<title>Gezelligheids app</title>
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
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
    <link href="../portfolio/jumbotron.css" rel="stylesheet">

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
		<a class="navbar-brand" href="##" style="color:#BEF781;text-align:" >Apps</a>
        </div>
		<form class="navbar-right" action="../portfolio/logout.php" method="Post">
           <a class="navbar-brand" href="../logout.php" style="color:#81BEF7">Uitloggen</a>
	    </form> 
	</nav>
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      	<div class="container">
        	<h2>VCVC</h2>          
		</div>
    </div>
    
        <div class="container">
        <div class="row">
			<div class="col-md-6">
              <h2>De VCVC gezelligheidsApp!</h2>
              <p><a href="##" >iOS app voor de VCVC</a></p>
              <p><br><br><br>
				<img name="vcvcIcon" src="images/vcvcapp.png" style="left:50px;heigth:320px;width:200px;">
				<br><br><br>
			 </p>
            </div>		  	
          	<!--<div class="col-md-6">
              <h2>Stage bij Albron(Google Play)</H2>
              <p><a href="https://play.google.com/store/apps/details?id=air.nl.albron.stageapp" >Android app voor de stageafdeling van Albron</a></p>
              <p>
              	<img name="mona" src="images/druppels.png" style="height:100px;width:100px;">
				<img name="schaatsen" src="images/duiveltje.jpg" style="height:100px;width:100px;">
              </p>
            </div>  -->
        </div>
      <footer>
        <p><span style="font-size:-5">&copy; Roeland Panhuysen 2015</span></p>
      </footer>
    </div> <!-- /container -->
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="file:///C|/Naar website Raspberry Pi/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="file:///C|/Naar website Raspberry Pi/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>