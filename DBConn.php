<?php
$base = explode('/', $_SERVER['PHP_SELF']);
require $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/config.php";
class DBConn {

	function getConnection() {
		$con = mysqli_connect(HOST,DBUSERNAME,DBPWD,DBNAME);
		if($con->connect_errno > 0){
			die('Unable to connect to database [' . $db->connect_error . ']');
		} else {
			return $con;
		}
	}

	function closeConnection($con) {
		mysqli_close($con);
	}

	function selectQuery($con, $SQLstmt) {
		$query = mysqli_query($con, $SQLstmt);		
		// if($query) {
		// 	$result = mysqli_fetch_array($query);
		// } else {
		// 	$result = "";
		// }
		// mysqli_free_result($query);
		return $query;
	}

	function getNoOfRows($result) {
		return mysqli_num_rows($result);
	}
}

?>