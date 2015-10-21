

<?php

	require ("includes/constants.php");
	//1. Create a connection
	$connection = mysql_connect(DB_SERVER, DB_USER,DB_PASS);

?>

<?php
		//2. Select a Db (Sterling)
		$db = mysql_select_db(DB_NAME,$connection);

?>



<?php require_once("includes/functions.php"); ?>

<?php

if (isset($_GET['info'])) //grab value!
{
	$table1 = $_GET['info']; // so if this has a set create the variable
	$table2="";
}
else if (isset($_GET['page'])) //else if for our pages
{
	$table1="";
	$table2 = $_GET ['page'];
	
}
else{ //final else statement because there is more than 2 things that can happen

   $table1 = "";
   $table2 = "";

}

?>




<?php include("includes/header.php");?>


<div id ="content"> <!-- Main Content-->


<table id = "table"> <!-- html table-->

<tr>

<td id="nav" >

<ul class="info">

<?php



 $info_set = get_all_info();



while ($info = mysql_fetch_array($info_set)){
echo "<li> <a href = \"content.php?info=" . urlencode($info["id"]) . "\">{$info["menu"]}</a></li>"; //in line substitution




$page_set= get_pages_for_info($info["id"]);
echo "<ul class=\"pages\">";
while ($page = mysql_fetch_array($page_set)){
echo "<li> <a href =\"content.php?page = " .urlencode($page["id"]). "
\">{$page["menu"]}</a></li>"; //in line substitution


}

echo "</ul>";
}
?>


</ul>
</td>

<td id= "main">

<h2> Main Content</h2>

 <?php echo $table1; ?><br>
 <?php echo $table2; ?>

 </td>


</tr>

</table>

</div>

<?php

require("includes/footer.php");

?>

