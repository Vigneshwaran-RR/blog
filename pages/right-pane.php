<?php
session_start();
$base = explode('/', $_SERVER['PHP_SELF']);
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/functions.php";
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/DBConn.php";
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Tag.php";
require_once $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/dao/sql/Tools.php";

$DBConnObj = new DBConn();
$Con = $DBConnObj->getConnection();
$tags_response = $DBConnObj->selectQuery($Con, SELECT_TAGS);
$tools_response = $DBConnObj->selectQuery($Con, SELECT_TOOLS);
$tags_data = array();
$tools_data = array();
while($tags_result = mysqli_fetch_array($tags_response,MYSQLI_ASSOC)) {
	array_push($tags_data, $tags_result);
}
while($tools_result = mysqli_fetch_array($tools_response,MYSQLI_ASSOC)) {
	array_push($tools_data, $tools_result);
}
$_SESSION["tools_count"] = sizeof($tools_data);
$DBConnObj->closeConnection($Con);

?>

<style>
.category-more {
	margin-left: 50%;
}
</style>
<head>
	<script src="<?php echo assetsDir(); ?>js/login.js"></script>
</head>
<?php
if(!isset($_SESSION["user"])) {
?>
<!-- BEGIN # MODAL LOGIN -->
<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <h2><span id="signvalue" style="color:#4285F4 ">Sign in</span></h2>
            </div>
            
            <!-- Begin # DIV Form -->
            <div id="div-forms">
                <!-- Begin # Login Form -->
                <form id="login-form">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg" style="color:#45957A">Type your username and password.</span>
                        </div>
                        <input id="login_username" class="form-control" type="text" placeholder="Username" required>
                        <input id="login_password" class="form-control" type="password" placeholder="Password" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me?
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->
                
                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg" style="color:#45957A">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->
                
                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg" style="color:#45957A">Register an account.</span>
                        </div>
                        <input id="register_username" class="form-control" type="text" placeholder="Username" required>
                        <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                        <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->
            </div>
            <!-- End # DIV Form -->
            
        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->
<?php
}
?>
<div class="panel panel-primary" style="margin-top:30px">
  <div class="panel-heading">
    <h3 class="panel-title">Programmer's Tools</h3>
  </div>
  <div class="panel-body">
  	<ul class="list-group">
    <?php
    for ($i = 0; $i <= sizeof($tools_data)-1; $i++) {
    ?>
    	<li class="list-group-item"> <a href="#"> <?php echo $tools_data[$i]['name'];?> </a> </li>
    <?php
	}
    ?>
	</ul>
	<span><a class="glyphicon glyphicon-menu-down category-more" href="/<?php echo rootDir(); ?>?page=tools"></a></span>
  </div>
</div>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Categories</h3>
  </div>
  <div class="panel-body">
  	<ul class="list-group">
    <?php
    for ($i = 0; $i <= sizeof($tags_data)-1; $i++) {
    ?>
    	<li class="list-group-item"> <a href="#"> <?php echo $tags_data[$i]['name'];?> </a> </li>
    <?php
	}
    ?>
	</ul>
  </div>
</div>

