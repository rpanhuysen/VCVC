<?php

//geef ook gestemd en naam cafe terug  -gedaan
//haal waardes op als er al is gestemd en geef deze door

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="raspberryadmin"; // Mysql password 
$db_name="VCVC"; // Database name 
$tbl_name="members"; // Table name
$tbl_Cafe="gevoel"; // Table name 

$count='0';

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

if(isset($_GET["ios_username"])){
   $myusername = trim($_GET["ios_username"]);
}
else{
   $myusername = '';
}

if(isset($_GET["ios_password"])){
	 
   $mypassword = trim($_GET["ios_password"]);
   //echo "waarde van cafe : $ios_password";
}
else{
   $mypassword = '';
}

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
//Voor productie label toevoegen in ios gedeelte die de naam uit getLastname opvraagt, wordt nu niet gecheckt dus
//$sql="SELECT * FROM $tbl_name WHERE username='$ios_username' and password='$ios_password' and maand='$myCafeMonth' and gestemd='$myGestemd'";

//Is de user bekend?
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
//echo $sql;
//echo $count;
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	//als er 1 match is voor inlog dan uitvoeren van query voor maand/cafe, deze wordt dan naar de app gestuurd.
	//Is er in de huidige maand al gestemd? 
    $myHuidigeMaand= date("n"); //huidige maand in nummers(1 tm 12)
    $sqlCafe="SELECT * FROM $tbl_Cafe WHERE voornaam='$myusername' and maand='$myHuidigeMaand'";// and gestemd='$myGestemd'";
    $resultCafe=mysql_query($sqlCafe);
	$count2=mysql_num_rows($resultCafe);
    //echo "count 2: ";
    //echo $count2;
	if($count2 > 0){
	$count = '2';
        //echo "$count2";
	}
    //else{
	//echo 0;
	//}
/*
if (strpos($_SERVER['HTTP_USER_AGENT'],'Windows') > 0 )
{
	echo "OS is windows";
	header("location:index.php");
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'],'Macintosh') > 0 )
{
	echo "OS is macintosh";
	header("location:index.php");
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'],'iPad') > 0 )
{
	echo "OS is Linux(iOS) op iPad. Resultaat login is: @result";
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'],'iPhone') > 0 )
{
	echo "OS is Linux(iOS) op iPhone. Resultaat login is: @result";
}
*/
//echo $sql;
//echo $result;
echo $count;
    
} else {
    //echo $sql;
    //echo $count;
	echo " Wrong Username or Password ";
    //echo $myusername;
    //echo $myCafeMonth;
    //echo $myCafe;
}
?>