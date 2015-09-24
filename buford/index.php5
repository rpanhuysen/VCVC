<?php
session_start();
if (! isset( $_SESSION[myusername] )  ){
	header("location:main_login.php");
}

echo $_SERVER['HTTP_USER_AGENT'];

//$browser = get_browser(null, true);
//print_r($browser);

// returns true if $needle is a substring of $haystack


if (strpos($_SERVER['HTTP_USER_AGENT'],'Windows') > 0 )
{
    echo 'OS is windows';
	$_request_platform =  "Windows";
	$_can_install = 0;
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'],'Macintosh') > 0 )
{
	echo "OS is OS-X";
	$_request_platform =  "Macintosh";
	$_can_install = 0;
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'],'iPad') > 0 )
{
	echo "OS is Linux(iOS)";
	$_request_platform =  "iPad";
	$_can_install = 1;
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') > 0 )
{
	echo "OS is Linux(iOS)";
	$_request_platform =  "iPhone";
	$_can_install = 1;
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
        //echo "id: " . $row["id"]. " - Name: " . $row["toegangslevel"].  "<br>";
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
			<a class="navbar-brand" href="##" style="color:#BEF781;text-align:" >App download</a>
        </div>
		<form class="navbar-right" action="logout.php" method="Post">   
			<a class="navbar-brand" href="../logout.php" style="color:#81BEF7">
			<?php echo "$_SESSION[myusername]";
			?> Uitloggen</a>
	    </form>       
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div style="height:1px;background-color:#819FF7" >
      </div>
    </div>
    <div class="container">
       	 <div class="row">
            <div class="col-md-6">
            	<p>
                  <br>
                  <img src="images/1PersonTown.png" height="207" width="330" />&nbsp;&nbsp;  
                </p>
	          <h2>Buford</h2>
              <?php
			  
              if($_request_platform == "Windows")
			  {
				echo "Er is geen installatie voor Microsoft Windows.";
			  }
			  elseif ($_request_platform == "Linux")
			  {
				echo "Er is geen installatie voor Apple Macintosh.";  
			  }
			  elseif ($_request_platform == "iPad")
			  {
				echo "<a href=\"itms-services://?action=download-manifest&url=http://vcvc.nl/buford/manifest.plist\">Installeer de ad-hoc-distributie app op je iPad</a>";  
			  }
			  elseif ($_request_platform == "iPhone")
			  {
				echo "Installeer de ad-hoc-distributie app op je iPhone";  
			  }
			  else 
			  {
				echo "Er is geen installatie";  
			  }		  
			 ?>
	<!--    <p>Installeer de <a href="http://roeland.ad.local/appserv/albronstage/android/albronstage1.2.0.apk"><cfoutput>#naamApp#</cfoutput></a> app op een Android tablet/phone.<br>
		</p>
    <cfelseif REQUEST.platform EQ "MAC">
		<p>Installeer <a href="itms-services://?action=download-manifest&url=http://roeland.ad.local/appserv/albronstage/apple/manifest.plist"><cfoutput>#naamApp#</cfoutput> app</a> op de iPad/iPhone/iPod.<br>
        </p>
	<cfelse>
    	De app kan niet op een pc worden geinstalleerd.
	</cfif>    
	          <p>Download en installeer!</p>
	          <p><a class="btn btn-default" href="../buford/index.php" role="button">Naar de pagina &raquo;</a></p> -->
	        </div>
           <!-- <div class="col-md-6">
	          <h2>Web Maandboek</h2>
	          <p>Internet pagina</p>
	          <p><a class="btn btn-default" href="../maandboekWeb/index.php5" role="button">Naar de pagina &raquo;</a></p>
	        </div>    -->                  			
		</div>                   
        	      
     <!--       <?php
			echo $_SERVER['HTTP_USER_AGENT'];
			if ( $_SESSION['mytoegangslevel'] == 1 ){
				echo "<div class=\"col-md-4\">
	          <h2>Te doen</h2>
	          <p>Wat is er gedaan moet er nog gedaan worden?</p>
	          <p><a class=\"btn btn-default\" href=\"../tedoen/tedoen.php5\" role=\"button\">Naar de pagina &raquo;</a></p>
	        </div>";
			}
			?>
             					 -->
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


