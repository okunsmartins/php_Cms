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




?>