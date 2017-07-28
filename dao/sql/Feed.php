<?php

define("SELECT_PUBLISHED_RECENT_FEED", 
	"SELECT * FROM feed WHERE feed_status='Published'");
define("INSERT_NEED_FEED", "INSERT INTO feed(id,title,created_at,updated_at,image_location
	 feed_status,page_url,description,code)VALUES(?,?,?,?,?,?,?,?,?)");
?>