

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
	$Sel_table1 = get_info_by_id($_GET['info']);

	$sel_t2 =0;
	$table2 =  NULL;
}
else if (isset($_GET['page'])) //else if for our pages
{
	$table1=0;
	$Sel_table1 = NULL;
	$table2 = get_pages_by_id($_GET['page']);
	
}
else{ //final else statement because there is more than 2 things that can happen

   $table1 = 0;
   $Sel_table1 = NULL;
   $table2 = 0;

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


 echo "<li";

	if($info["id"] == $Sel_table1['id'])
	{
 echo " class=\"selected\"";
}
 echo "> <a href = \"content.php?info= " . urlencode($info["id"]) . "\">{$info["menu"]}</a></li>"; //in line substitution




$page_set= get_pages_for_info($info["id"]);


echo "<ul class=\"pages\">";

while ($page = mysql_fetch_array($page_set)){

echo "<li";
if ($page["id"]== $table2['id'])
{
echo " class=\"selected\"";
}
echo "><a href =\"content.php?page = " .urlencode($page["id"]). "
\">{$page["menu"]}</a></li>"; //in line substitution


}

echo "</ul>";
}
?>


</ul>

<br><br>
<div id="new">
<a href = "new_info.php">Add New Information</a>

</div>
</td>

<td id= "main">

<?php if (!is_null($Sel_table1)) { ?>

<h2><?php echo $Sel_table1['menu']; ?></h2>

<?php} elseif (!is_null($table2)) { ?>

<h2><?php echo $table2 ['menu']; ?></h2>

<div class="page-content">

 <?php

  echo $table2['content'] ;

 ?>

</div>

<?php } else { ?>
<h2>Select a menu from our information table or page table</h2>
<?php } ?>

 </td>


</tr>

</table>

</div>

<?php

require("includes/footer.php");

?>