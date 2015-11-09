<?php
/**
 * Created by PhpStorm.
 * User: Mozammel
 * Date: 11/10/2015
 * Time: 2:26 AM
 */
error_reporting(0);
session_start();
include('pdo_connection.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_name=$database_name;
$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
$id = $_GET['id'];
$sql="SELECT * FROM user WHERE id=$id";
$data = $dbcon->query($sql);
$row = $data->fetch(PDO::FETCH_ASSOC);
$name = $row['fname'].' '. $_SESSION['lname'];
$image = $row['picture'];
$email = $row['email'];
$address = $row['address'];
$date = $row['dob'];
$crimes = $row['crimes'];


?>

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
    <style>
        body{
            padding-top:100px;

        }
        footer{
            margin-top: 20%
        }

        .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

        small {
            display: block;
            line-height: 1.428571429;
            color: #999;
        }
    </style>

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
                <a href="index.php"><img class="navbar-left" alt="" src="images/logo.png"></a>
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

                    ?>

                    <li><a href="profile.php">profile</a></li>
                    <?php
                    if(isset($_SESSION['user']) && $_SESSION['user'] !=null){
                        echo "<li><a href=\"logout.php\">Logout</a></li>";
                    }else
                    {
                        echo "<li><a href=\"login.php\">login</a></li>
                    <li><a href=\"signup.html\">Register</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="images/<?php echo $image?>" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4><?php echo $name?></h4>
                            <small><cite title="San Francisco, USA"><?php echo $address?> <i class="glyphicon glyphicon-map-marker">
                                    </i></cite></small>
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i><?php echo $email?>
                                <br />
                                <i class="glyphicon glyphicon-gift"></i>Date of birth: <?php echo $date?></p>
                            <h><?php echo $crimes?></h>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <small class="text-center">&copy; Copyright: International Mafia Don- 2015.</small>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
