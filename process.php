<?php
require_once('inc/header.php');
error_reporting(0);
session_start();
//$_SESSION['email_page2']=$_GET['email'];
///**
// * Created by PhpStorm.
// * User: rajesh
// * Date: 9/30/15
// * Time: 10:40 AM
// */
//include('pdo_connection.php');
//include('database_config.php');
//$db_user =$database_user;
//$db_pass =$databse_pass;
//$db_name=$database_name;
//$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
//
//if(isset($_POST['register']))
//{
//    $fname=$_POST['first_name'];
//    $lname=$_POST['last_name'];
//    $email=$_POST['email'];
//    $address=$_POST['address'];
//    $crimes=$_POST['crimes'];
//    $password=$_POST['password'];
//    $dob=$_POST['dob'];
//    $picture=$_POST['picture'];
//    if(!empty(trim($_POST['name'])) || !empty(trim($_POST['salary'])))
//    {
//        //echo $name.$age.$address.$designation.$salary.$email.$password;
//        $sql="INSERT INTO user(fname, lname, email, address, crimes, password, dob, picture, rank) VALUES ('$fname','$lname', '$email' , '$address','$crimes','$password','$dob', '$picture','$rank')";
//        $preparestatement=$dbcon->prepare($sql);
//        $preparestatement->execute();
//        echo("<script>alert('Successfully saved..!!')</script>");
//        echo("<script>location.href='login.php'</script>");
//    }
//    else
//    {
//
//        echo("<script>alert('Sorry.! You put some field empty!')</script>");
//        echo("<script>location.href='index.php'</script>");
//    }
//}
//else
//{
//    echo("<script>alert('something went wrong')</script>");
//    echo("<script>location.href='index.php'</script>");

?>
    <?php
if(isset($_POST["submit"])) {

    $picture = $_FILES['picture']['name'];
    $temp_name = $_FILES['picture']['tmp_name'];

    echo $picture;

}
?>

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