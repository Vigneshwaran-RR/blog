<?php
session_start();
$base = explode('/', $_SERVER['PHP_SELF']);
require $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/functions.php";
require $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/DBConn.php";
require $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Login.php";

class Login {
	/* authenticate(@params) 
	 	@params 
	 	username - username submitted by user,
	 	password - md5 password from UI js
	*/
	function authenticate($userName, $password) {
		$DBConnObj = new DBConn();
		$Con = $DBConnObj->getConnection();
		if ($stmt = $Con->prepare(SELECT_USER)) {
			$stmt->bind_param("ss", $userName, $password);
			$stmt->execute(); 
			$stmt->store_result();
			$num_of_rows = $stmt->num_rows;
			if($stmt->num_rows >= "1") {			
	   			$stmt-> bind_result($id, $name);
					while ($stmt->fetch()) {
						$_SESSION["user"] = $name;
						echo $id."_SUCCESS";
					}
					$stmt->free_result();
			} else {
				echo "0_FAILURE";
			}
		}
		$DBConnObj->closeConnection($Con);
	}
}

// Check the $_POST array is not empty
if($_POST) {
	$userName = $_POST['username'];
	$password = $_POST['password'];
	//Call the respective method got from ajax passing the arguments 
	(new Login)->{$_POST['method']}($userName, $password);
}

?>