<?php
/**
 * Created by PhpStorm.
 * User: Mozammel
 * Date: 11/9/2015
 * Time: 10:22 PM
 */
include_once('inc/header.php');
if(isset($_POST['submit'])){
    $file = $_FILES['image'];
    if($file['size']>=50000){
        echo("<script>alert('Image size is not allowed')</script>");
        echo("<script>location.href='signup.php'</script>");
    }else
    {
        $image_name = $file['name'];
        $image_temp = $file['tmp_name'];
        $image_type = $file['type'];
        $image_size = $file['size'];
        $image_error = $file['error'];
        $temp = explode(".", $image_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($image_temp,"images/$newfilename");
        echo "<img src=\"images/$newfilename\">";
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $user = $_POST['email'];
        $address = $_POST['address'];
        $crimes = $_POST['crimes'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $rank = 'user';
        $picture = $newfilename;
        session_start();
        include('pdo_connection.php');
        include('database_config.php');
        $db_user =$database_user;
        $db_pass =$databse_pass;
        $db_name=$database_name;
        $dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
        $sql = "INSERT INTO `datadriven`.`user` (`id`, `fname`, `lname`, `email`, `address`, `crimes`, `password`, `dob`, `picture`, `rank`) VALUES (NULL, '$fname', '$lname', '$user', '$address', '$crimes', '$password', '$dob', '$picture', '$rank');";
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