<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Shahrukh Khan">
    <meta name="description" content="<?php echo PROJECT_NAME; ?>">
    <meta name="title" content="<?php echo PROJECT_NAME; ?>">

    <title><?php echo PROJECT_NAME; ?></title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="bootstrap/css/bootstrap-social.css" rel="stylesheet"> -->
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->
    <script src="bootstrap/js/jquery-1.9.0.min.js"></script>
  </head>
  <body>

    <!-- Facebook SDK --><!-- 
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=418591208597308&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script> -->


    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" target="_blank">Transport Management System</a>
        </div>
        <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1" >
          <ul class="nav navbar-nav">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>
            <li><a href="logout.php">Logout (<?php echo $_SESSION['user']['name'] ?>)</a></li>
            <?php } else { ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>

    <div class="container mainbody">