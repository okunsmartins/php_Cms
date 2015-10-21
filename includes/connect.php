
<?php
	require("constants.php");
	//1. Create a connection
	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	
	if(!$connection)
	{
		die("Unable to connect to database!");
	
	}
	
?>

<?php
		//2. Select a Db (Sterling)
		$db = mysql_select_db(DB_NAME,$connection);
		if(!$db)
	{
		die("Unable to connect to database!");
	
	}
		

?>
