<?php

//Pop up message when there is no connection
function confirm_query($result_set){
	if (!$result_set)
	{
		die("Unable to connect to database!");

		}
	
	}
	
	function get_all_info()
	{
		global $connection;
		$query = "SELECT * FROM information ORDER BY position ASC";
		$info_set= mysql_query($query);
		confirm_query($info_set);
		return $info_set;

	
	}
	
	
	
	
	function get_pages_for_info($information_id)  /// This time we are passing an argument
	{
		global $connection;
	
		$query_2="SELECT * FROM pages WHERE information_id = {$information_id} ORDER BY position ";
        $page_set= mysql_query($query_2);
        confirm_query($page_set);
		return $page_set;
		
	}
	
	function get_info_by_id($information_id)
	{
		global $connection;
		$query_3 = "SELECT * ";
		$query_3 .= "FROM information "; //Append equals, so the value can change
		$query_3 .= "WHERE id= " .$information_id;
		$query_3 .= " LIMIT 1 ";  //Mysql command to limit results by 1
		
		$result_set = mysql_query($query_3, $connection);
		confirm_query ($result_set);
		
		if ($info = mysql_fetch_array($result_set)){
		return $info;
		}
		else
		{ 
		return NULL;
		
		}
	}

	function get_pages_by_id($page_id)
	{
	
		global $connection;
		$query_3 = "SELECT *";
		$query_3 .= "FROM pages "; //Append equals, so the value can change
		$query_3 .= "WHERE id=" .$page_id;
		$query_3 .= " LIMIT 1";  //Mysql command to limit results by 1
		
		$result_set = mysql_query($query_3, $connection);
		confirm_query($result_set);
		
		if ($page = mysql_fetch_array($result_set)){
		return $page;
		}
		else
		{ 
		return NULL;
		
		}
	}
	


?>