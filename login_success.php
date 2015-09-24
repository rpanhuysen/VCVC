<!--- Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. --->


<?php
session_start();
if (! isset( $_SESSION[myusername] ) ){
	header("location:main_login.php");
}
?>

<html>
<body>
<?php
//print_r($_SESSION);
$a = "test";
$b = "anothertest";

var_dump(isset($_SESSION));      // TRUE
var_dump(isset($a, $b)); // TRUE

// The key 'hello' equals NULL so is considered unset
// If you want to check for NULL key values then try: 
///var_dump(array_key_exists('myusername', $_SESSION)); // TRUE
if(array_key_exists('myusername', $_SESSION)){
var_dump(isset($_SESSION));  
}
?>
Login Successful
</body>
</html>