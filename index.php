<?php
session_start();
if (! isset( $_SESSION[myusername] )  ){
	header("location:main_login.php");
}

$servername = "localhost";
$username = "root";
$password = "raspberryadmin";
$dbname = "VCVC";

// Create connection
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn2) {
    die("Connection failed: " . mysqli_connect_error());
}
$txt = $_SESSION[myusername];

$sql2 = "SELECT * FROM members WHERE username = '$txt'";
$result2 = mysqli_query($conn2, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
        echo "id: " . $row["id"]. " - Name: " . $row["toegangslevel"].  "<br>";
		switch ($row[toegangslevel]) {
			case 1:
				//echo "id: eerste" . $row["id"]. " - toegangslevel: " . $row["toegangslevel"].  "<br>";
				$_SESSION['mytoegangslevel'] = 1;				
				break;
			case 2:
				//echo "id: :2" . $row["id"]. " - toegangslevel: " . $row["toegangslevel"].  "<br>";
				$_SESSION['mytoegangslevel'] = 2;
				break;
			case 3:
				//echo "id: =3" . $row["id"]. " - toegangslevel: " . $row["toegangslevel"].  "<br>";
				$_SESSION['mytoegangslevel'] = 3;
				break;
			case 9:
				//echo "id: is 9 " . $row["id"]. " - toegangslevel: " . $row["toegangslevel"].  "<br>";
				$_SESSION['mytoegangslevel'] = 9;
				break;
			default:
				echo "Toegangslevel is niet ingesteld";
			}
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//DU" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="du">
  <head>
  	<title>VCVC</title>
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
			<a class="navbar-brand" href="##" style="color:#BEF781;text-align:" >Home</a>
        </div>
		<form class="navbar-right" action="logout.php" method="Post">   
			<a class="navbar-brand" href="../logout.php" style="color:#81BEF7"><?php echo "$_SESSION[myusername]";
			?> Uitloggen</a>
	    </form>       
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div style="height:1px;background-color:#819FF7" >
       <!--  	<p>
     <?php
			$t = date("H");
			if ($t <  "20") {
				 echo "<br>Goedendag ".$_SESSION[myusername]."!";
			} else {
				 echo "<br>Goedenacht "&& $_SESSION[myusername]&&"!";
			}
		?>
        </p> -->
      </div>
    </div>
    <div class="container">
	    <div class="row">
            <div class="col-md-6">
	          <h2>App Maandboek</h2>
	          <p>Smartphone App</p>
	          <p><a class="btn btn-default" href="../maandboekApp/index.php5" role="button">Naar de pagina &raquo;</a></p>
	        </div>
            <div class="col-md-6">
	          <h2>Web Maandboek</h2>
	          <p>Internet pagina</p>
	          <p><a class="btn btn-default" href="../maandboekWeb/index.php5" role="button">Naar de pagina &raquo;</a></p>
	        </div>                     			
		</div>
       	    <div class="row">
            <div class="col-md-6">
	          <h2>Grid</h2>
	          <p>Grid example(s)</p>
	          <p><a class="btn btn-default" href="../ajaxCRUD/examples/example.php" role="button">Naar de pagina &raquo;</a></p>
	        </div>
           <!-- <div class="col-md-6">
	          <h2>Web Maandboek</h2>
	          <p>Internet pagina</p>
	          <p><a class="btn btn-default" href="../maandboekWeb/index.php5" role="button">Naar de pagina &raquo;</a></p>
	        </div>    -->                  			
		</div>                   
        	<!---        
            <?php
			if ( $_SESSION['mytoegangslevel'] == 1 ){
				echo "<div class=\"col-md-4\">
	          <h2>Te doen</h2>
	          <p>Wat is er gedaan moet er nog gedaan worden?</p>
	          <p><a class=\"btn btn-default\" href=\"../tedoen/tedoen.php5\" role=\"button\">Naar de pagina &raquo;</a></p>
	        </div>";
			}
			?>
            --->  					
      <hr>

      <footer>
        <p><span style="font-size:-2">&copy; Roeland Panhuysen 2015</span></p>
      </footer>
    </div> <!-- /container -->
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
