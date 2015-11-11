<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome to Datadriven Website</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://daks2k3a4ib2z.cloudfront.net/5379a5938fa1ea4e1cba8034/537efd4a7b58dcd03527229e_favicon.ico">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,900,900italic,400italic,700,300italic,300' rel='stylesheet' type='text/css'>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section>
    <nav role="navigation" id="main-navbar" class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button data-target="#nav-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggled navbar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php session_start();
                error_reporting(0);
                $name = $_SESSION['fname']. ' '. $_SESSION['lname'];
                ?>
                <a href="index.php"><img class="navbar-left" alt="" src="images/logo.png"></a>
                <span style="color: #ddd;padding-top: 12px;margin-left: 10px;" class="navbar-left">Welcome <?php echo $name?></span>
            </div>

            <div id="nav-collapse" class="collapse menu navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php
                    if(isset($_SESSION['rank']) && $_SESSION['rank'] =='admin'){
                        echo "<li><a href=\"admin/index.php\">Dashboard</a></li>";
                    }
                    else{
                        echo" ";
                    }


                    if(isset($_SESSION['user']) && $_SESSION['user'] !=null){
                        echo " <li><a href=\"profile.php\">profile</a></li>";
                        echo "<li><a href=\"logout.php\">Logout</a></li>";

                    }else
                    {
                        echo "<li><a href=\"login.php\">login</a></li>
                    <li><a href=\"signup.php\">Register</a></li>";
                    }

                    ?>



                </ul>
            </div>
        </div>
    </nav>
</section>