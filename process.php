<?php
/**
 * Created by PhpStorm.
 * User: Mozammel
 * Date: 11/9/2015
 * Time: 10:22 PM
 */
$fname = htmlentities($_POST['first_name']);
$lname = htmlentities($_POST['last_name']);
$user = htmlentities($_POST['email']);
$user = strtolower($user);
$address = htmlentities($_POST['address']);
$crimes = htmlentities($_POST['crimes']);
$password = ($_POST['password']);
$dob = htmlentities($_POST['dob']);
$rank = 'user';
include_once('inc/header.php');
include_once('pdo_connection.php');
include_once('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_name=$database_name;
$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
$sql="SELECT email FROM user WHERE email = '$user'";
$data = $dbcon->query($sql);
$row = $data->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['submit'])){
    $file = $_FILES['image'];
    $image_name = $file['name'];
    $image_temp = $file['tmp_name'];
    $image_type = $file['type'];
    $image_size = $file['size'];
    $image_error = $file['error'];
    $accept = array('jpg','jpeg','png');
    $temp = explode(".", $image_name);
    if($user== $row['email']){
        echo("<script>alert('This email id is already used. Please login')</script>");
        echo("<script>location.href='login.php'</script>");
    }
    elseif($file['size']>=50000){
        echo("<script>alert('Image size is not allowed')</script>");
        echo("<script>location.href='signup.php'</script>");
    }
    elseif(!in_array(end($temp), $accept))
    {
        echo("<script>alert('please upload jpg or png file')</script>");
        echo("<script>location.href='signup.php'</script>");
    }
    else
    {
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($image_temp,"images/$newfilename");
        echo "<img src=\"images/$newfilename\">";
        $picture = $newfilename;
        session_start();
        include_once('pdo_connection.php');
        include_once('database_config.php');
        $db_user =$database_user;
        $db_pass =$databse_pass;
        $db_name=$database_name;
        $dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
        $sql = "INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `address`, `crimes`, `password`, `dob`, `picture`, `rank`) VALUES (NULL, '$fname', '$lname', '$user', '$address', '$crimes', '$password', '$dob', '$picture', '$rank');";
        $preparestatement=$dbcon->prepare($sql);
        $preparestatement->execute();
        echo("<script>alert('Registered Successfully. Please log in with your password...')</script>");
        echo("<script>location.href='login.php'</script>");
        include_once('inc/footer.php');
    }

}else
{
    echo("<script>alert('Something went wrong...')</script>");
    echo("<script>location.href='signup.php'</script>");
}

?>