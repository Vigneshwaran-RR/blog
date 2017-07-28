<?php
$base = explode('/', $_SERVER['PHP_SELF']);
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/DBConn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Feed.php";

$DBConnObj = new DBConn();
$Con = $DBConnObj->getConnection();
$response = $DBConnObj->selectQuery($Con, SELECT_PUBLISHED_RECENT_FEED);
$data = array();
while($result = mysqli_fetch_array($response,MYSQLI_ASSOC)) {
	array_push($data, $result);
}
$DBConnObj->closeConnection($Con);
?>

<style type="text/css">
.post-thumb {
	margin-right: 15px;
	margin-bottom: 20px;
	padding-top: 15px;
}
.separator {
	background: url(assets/images/separator.png) repeat-x bottom;
	height:30px;
}
.post-data {
	padding-top: 10px;
}
.extlink a, a.readlink {
	float: left;
	/*margin: 0 7px 0 0;*/
	text-decoration: none;
	background: #dc005a;
	border: 1px solid #dc005a;
	padding-top: 15px;
	padding-left: 10px;
	border-radius: 3px;
	display: block;
	font: bold 15px Arial,Helvetica,sans-serif;
	line-height: 130%;
	color: #fff;
	float: right;
	height: 8%;
	width: 35%;
}
.readmore {
	border-top-width: 1px; 
	margin-top: 13px;
	margin-left: 20px;
}
</style>

<div class="row-fluid" style="box-shadow:0 0 5px #A0A0A0; background-color:#fff; width:100%; margin:40px auto; font:12px/20px Arial,sans-serif">
	<?php
	for ($i = 0; $i <= sizeof($data)-1; $i++) {		
	?>
	<div style="padding:30px">
		<div>
			<a href="#" style="font-size:20px;font-weight:bold;color:#7A4B94">
			<?php
				echo $data[$i]['title'];
			?>
			</a>
		</div>
		<div style="padding-top:15px;">
			<span style="color:#BFB5C5"> <?php echo date("jS F, Y", strtotime($data[$i]['created_at'])); ?> </span> <span> | </span>
			<span style="color:#db7030"> <?php echo $data[$i]['feed_status']; ?> </span>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="post-thumb">
					<a href="#">
						<img src="<?php echo imagesDir(); ?>javascript-table-dragger.png" height="100" width="100">
					</a>
					<!-- <div class="extlink"> -->
					<!-- </div> -->
				</div>
			</div>
			<div class="col-md-8">
				<div class="post-data">
					<div class="desc-data">
						<?php echo $data[$i]['description']; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
			</div>
			<div class="col-md-4">
				<button class="btn btn-lg btn-default readmore"><a href="#"> Read more </a></button>
			</div>
		</div>
		<label>Code</label>
		<pre class="hljs prettyprint" style="border:none; border-left: 4px solid #e07218" id="quine">
		<code>
		class TestRun {
			public TestRun() {
				//initialize variable here
			}
			public static void main() {
				...
			}
		}	
		</code>
		</pre>
		<div class="separator"></div>

	</div>
	<?php
	}
	?>
</div>