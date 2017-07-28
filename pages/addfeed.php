<?php
$base = explode('/', $_SERVER['PHP_SELF']);
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/DBConn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Category.php";
include_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Tag.php";
include_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Feed.php";

$DBConnObj = new DBConn();
$Con = $DBConnObj->getConnection();
$cat_response = $DBConnObj->selectQuery($Con, SELECT_CATEGORIES);
$tag_response = $DBConnObj->selectQuery($Con, SELECT_TAGS);
$cat_data = array();
$tag_data = array();
while($cat_result = mysqli_fetch_array($cat_response,MYSQLI_ASSOC)) {
	array_push($cat_data, $cat_result);
}
while($tag_result = mysqli_fetch_array($tag_response,MYSQLI_ASSOC)) {
	array_push($tag_data, $tag_result);
}
$DBConnObj->closeConnection($Con);
?>


<style type="text/css">
.feed_main{
	margin-top: 45px;
	background-color: #ECECEC;	
}
</style>
<div class="feed_main">
	<h3>Add Post</h3>
	<form id="feed_form">
		<div class="form-group">
		    <label for="feed_title">Title</label>
		    <input type="text" class="form-control" id="feed_tool" placeholder="Title">
	  	</div>
	  	<div class="form-group">
		    <label for="feed_desc">Description</label>
		    <textarea id="feed_desc" class="form-control" rows="10"></textarea>
	  	</div>
	  	<div class="form-group">
	  		<label for="feed_cat">Category</label>
		  	<select multiple class="form-control" >
				<?php 
				for ($i = 0; $i <= sizeof($cat_data)-1; $i++) {	
				?>
					<option class="form-control" value="<?php echo $cat_data[$i]['id']; ?>"><?php echo $cat_data[$i]['name']; ?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
	  		<label for="feed_tag">Tag</label>
			  <label class="checkbox-inline">
			  	<?php 
				for ($i = 0; $i <= sizeof($tag_data)-1; $i++) {	
				?>
			    <input type="checkbox" value="<?php echo $tag_data[$i]['id']; ?>">  <?php echo $tag_data[$i]['name']; ?>
			    <?php
				}
				?>
			  </label>
			</div>
		</div>
	  	<div class="form-group">
		    <label for="feed_code">Code</label>
		    <textarea id="feed_code" class="form-control" rows="5"></textarea>
	  	</div>
	  	<div class="form-group">
		    <label for="feed_code">File input</label>
		    <input type="file" id="feed_image">
		    <p class="help-block">Upload the snapshot</p>
	  	</div>	  
	  	<button type="submit" class="btn btn-success">Submit</button>
	</form>
</div>