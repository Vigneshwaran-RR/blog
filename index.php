<?php 
// Start the session
session_start();
$base = explode('/', $_SERVER['PHP_SELF']);
require $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <meta content="IE=edge" http-equiv="X-UA-Compatible"> 
    <meta content="width=device-width,initial-scale=1" name="viewport"> 
    <meta content="Check out codes, scripts and programming standards. This is a Tutorial website to get tricky scripts and fun to implement" name="description"> 
    <meta content="Software Engineer" name="Vigneshwaran">

    <title><?php siteName(); ?> | <?php pageTitle(); ?></title>
    <style type="text/css">
        article { text-align: left; padding-left: 20px; padding-right: 0px; padding-bottom: 20px; padding-top: 40px;}
        .myheader {
            background: url(assets/images/bg-header-1.png) repeat;   
        }
        .rightpane {
            margin-top: 50px;
            padding-left: 2%;
            max-width: 100%;
        }
        footer { position:fixed; left:0px; bottom:0px; height:20px; width:100%; background:#999; text-align: center; }
    </style>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo assetsDir(); ?>/js/jquery-3.1.1.js"></script>
    <script src="<?php echo assetsDir(); ?>/js/md5.js"></script>
    <script src="<?php echo assetsDir(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo assetsDir(); ?>/js/code/braintree.js"></script>
    <script src="<?php echo assetsDir(); ?>/js/code/bundle.js"></script>
    <script src="<?php echo assetsDir(); ?>/js/code/less.min.js"></script>
    
    <script src="<?php echo assetsDir(); ?>/js/controlpanel.js"></script>
    <script src="<?php echo assetsDir(); ?>/js/code/highlight.js?autoload=true&amp;skin=sunburst&amp;lang=css" defer></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo assetsDir(); ?>/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo assetsDir(); ?>/css/bootstrap-theme.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo assetsDir(); ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo assetsDir(); ?>/css/top-button.css">
    <link rel="stylesheet" href="<?php echo assetsDir(); ?>/css/code/default.css"> 
    <link rel="stylesheet" href="<?php echo assetsDir(); ?>/css/code/menu.css"> 
     
    <script language="javascript">
    $(document).ready(function(){
        // browser window scroll (in pixels) after which the "back to top" link is shown
        var offset = 300,
            //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
            offset_opacity = 1200,
            //duration of the top scrolling animation (in ms)
            scroll_top_duration = 700,
            //grab the "back to top" link
            $back_to_top = $('.cd-top');

        //hide or show the "back to top" link
        $(window).scroll(function(){
            ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if( $(this).scrollTop() > offset_opacity ) { 
                $back_to_top.addClass('cd-fade-out');
            }
        });

        //smooth scroll to top
        $back_to_top.on('click', function(event){
            event.preventDefault();
            $('body,html').animate({
                scrollTop: 0 ,
                }, scroll_top_duration
            );
        });
    });
    </script>
    
</head>
    <body>  

        <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
          <!-- <div class="container"> -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>  
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="brand" style="text-decoration:none;font-size:18px;font-weight:bold">&lt;<?php echo siteName(); ?>/&gt;</a></li>
                <li role="presentation"><a href="/<?php echo rootDir(); ?>" title="Home">Home</a></li>
                <li role="presentation"><a href="/<?php echo rootDir(); ?>?page=tools">Tools&nbsp;<span class="badge" style="background-color:#286091;font-size:10px;"><?php echo $_SESSION["tools_count"] ?> added</span></a></li>
                <li><a href="/<?php echo rootDir(); ?>?page=controlpanel">Admin</a></li>
                <li role="presentation"><a href="/<?php echo rootDir(); ?>?page=about-me">About Me</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION["user"])) {
                    ?>
                    <li>
                        <div class="row" style="padding-top:15px;color:#fff;">
                            <div class="col-md-6">
                                <?php echo ucwords($_SESSION["user"]); ?>
                            </div>
                            <div class="col-md-6">
                                <span>|</span>&nbsp;&nbsp;<a href="." id="logout" style="color:#fff;">Logout</a>
                            </div>
                        </div>
                    <?php
                }
                ?>
              </ul>
              
            </div><!-- /navbar-collapse -->
          <!-- </div> -->
        </nav><!-- /navbar --> 

        <div class="row">            
            <div class="col-md-1">
            </div>
            <div class="col-md-8">
                <div class="container-fluid scrollable main">
                    <article>        
                        <div>
                            <?php pageContent(); ?>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-3 rightpane">
                <div class="right-pane">
                    <?php include $_SERVER['DOCUMENT_ROOT']."/".$base[1]."/pages/right-pane.php"; ?>
                </div>
            </div>
        </div>
        <a href="#0" class="cd-top">Top</a>
    </body>
    <footer>
        <small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>. All rights reserved.</small>       
    </footer>
</html>
<?php
if(isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}
?>