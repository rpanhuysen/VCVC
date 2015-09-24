<!DOCTYPE html>
<html lang="du">
  <head>
  	<title>Bootstrap grid Example for showing pijndagboek entries in mySQL database</title>
  	<meta charset="utf-8">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Voorbeeld applicatie voor responsiveness voor Pijndagboek">
    <meta name="author" content="Roeland Panhuysen">
    <link rel="icon" href="file:///C|/inetpub/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="file:///C|/inetpub/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
    <link href="file:///C|/inetpub/wwwroot/CSS/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
	
	<cfquery  name="selectGevoel" dataSource="user"> 
        SELECT userid, pijn, vermoeidheid, instabiliteit, last_update
        FROM Gevoel
	</cfquery>
	<!---<cfdump var="#selectGevoel#" >--->
	<!---CFGrid werkt niet onder railo, zie 
	http://www.cfmldeveloper.com/page.cfm/coldfusion-vs-railo-1/compatibility-features--->
<body>

<form action="file:///C|/inetpub/wwwroot/Logic/loginform.cfm" method="Post">
    <input class="btn btn-lg btn-primary btn-block" type="submit" Name="Logout" value="Logout" align="right"> 
</form>

<div class="container-fluid" align="center">
  <h1>Hello <cfoutput>#GetauthUser()#</cfoutput>!</h1>
  <p>Resize the browser window to see the effect of the implemented bootstrap grid.</p>
  <div class="row" style="background-color:lavender;">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
      <p>Userid</p>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
      <p>Pijn</p>
    </div>
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      <p>Vermoeidheid</p>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      <p>Instabiliteit</p>
    </div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <p>Datum laatst aangepast</p>
    </div>
  </div>
  <cfoutput> 	
	 <cfloop query="selectGevoel" >
	  <div class="row" style="background-color:lavenderblush;">
	    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
	      <p>#Userid#</p>
	    </div>
    	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
	      <p>#Pijn#</p>
	    </div>
    	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
	      <p>#Vermoeidheid#</p>
	    </div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
	      <p>#Instabiliteit#</p>			
		</div>
	    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	      <p>#lsdateformat(last_update, "dd-mmm-yyyy")# #LSTimeFormat(last_update)#</p>
		  
	    </div>
	  </div>
	  </cfloop>
  </cfoutput>
</div>
    
</body>

</html>