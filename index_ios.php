<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="raspberryadmin"; // Mysql password 
$db_name="VCVC"; // Database name 
$tbl_name="gevoel"; // Table name 
$tbl_Cafe="gevoel"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


if(isset($_GET["userid"])){
   $userid = trim($_GET["userid"]);
}
else{
   $userid = '';
}
if(isset($_GET["ios_username"])){
   $ios_username = trim($_GET["ios_username"]);
}
else{
   $ios_username = '';
}
if(isset($_GET["ios_password"])){
   $ios_password = trim($_GET["ios_password"]);
}
else{
   $ios_password = '';
}
if(isset($_GET["cafe"])){
	 
   $cafe = trim($_GET["cafe"]);
   echo "waarde van cafe : $cafe";
}
else{
   $cafe = '';
}
if(isset($_GET["sfeer"])){
   $sfeer = trim($_GET["sfeer"]);
}
else{
   $sfeer = '';
}
if(isset($_GET["muziek"])){
   $muziek = trim($_GET["muziek"]);
}
else{
   $muziek = '';
}
if(isset($_GET["assortiment"])){
   $assortiment = trim($_GET["assortiment"]);
}
else{
   $assortiment = '';
}
if(isset($_GET["publiek"])){
   $publiek = trim($_GET["publiek"]);
}
else{
   $publiek = '';
}
if(isset($_GET["behang"])){
   $behang = trim($_GET["behang"]);
}
else{
   $behang = '';
}

$current_timestamp = date("Y-m-d H:i:s");

if(isset($_GET["overschrijf"])){
   $overschrijf = trim($_GET["overschrijf"]);
}
else{
   $overschrijf = '0';
}

//Is er al gestemd voor de huidige maand?  als ($overschrijf > 0) wel, dan insert, anders niet, dan update  

$myHuidigeMaand= date("n");//huidige maand
$sqlCafe="SELECT * FROM $tbl_Cafe WHERE voornaam='$ios_username' and maand='$myHuidigeMaand'";// and gestemd='$myGestemd'";
$result=mysql_query($sqlCafe);
$overschrijf=mysql_num_rows($result);

if($overschrijf == 0){
$sql = "INSERT INTO `VCVC`.`gevoel`
			(
			userid,
			voornaam,
			cafe,
			sfeer,
			muziek,
			assortiment,
			publiek,
			behang,
            maand,
            last_update
			)
			VALUES
			('$userid',
			'$ios_username',
			'$cafe',
			'$sfeer',
			'$muziek',
			'$assortiment',
			'$publiek',
			'$behang',
            '$myHuidigeMaand',
            '$current_timestamp'
			)
			";
}else{
    $sql = "UPDATE `VCVC`.`gevoel`
            SET
            `cafe` = '$cafe',
            `sfeer` = '$sfeer',
            `assortiment` = '$assortiment',
            `muziek` = '$muziek',
            `publiek` = '$publiek',
            `behang` = '$behang',
            `last_update` = '$current_timestamp'
            WHERE voornaam = '$ios_username' AND maand =  '$myHuidigeMaand'
			";
};

$result=mysql_query($sql);
//echo $result;
echo "einde pagina index_ios.php overschrijf: ";
echo $overschrijf;
?>


  