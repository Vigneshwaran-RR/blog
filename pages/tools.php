<?php
session_start();
$base = explode('/', $_SERVER['PHP_SELF']);
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/DBConn.php";
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Tools.php";

$DBConnObj = new DBConn();
$Con = $DBConnObj->getConnection();
$tools_response = $DBConnObj->selectQuery($Con, SELECT_TOOLS);
$tools_data = array();
while($tools_result = mysqli_fetch_array($tools_response,MYSQLI_ASSOC)) {
	array_push($tools_data, $tools_result);
}
$DBConnObj->closeConnection($Con);

?>
<style>
.tools-main {
	background-color : transparent;
}
.tools_content {
	margin-top: 30px;
}
</style>
<div class="tools-main">
	<h3>Free Online Tools for Programmer</h3>
	<div>
		<table class="table table-bordered tools_content" style="background-color:#fff;">
			<?php
			for ($i = 0; $i <= sizeof($tools_data)-1; $i++) {		
			?>
			<tr>
				<td><span class="glyphicon glyphicon-menu-right"></span></td>
				<td><a href="#"> <?php echo $tools_data[$i]['name']; ?> </a></td>
			</tr>
			<?php
			}
			?>
		</table>
		
	</div>
</div>