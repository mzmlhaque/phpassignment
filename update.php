<?php
/**
 * Created by PhpStorm.
 * User: Mozammel
 * Date: 11/10/2015
 * Time: 1:32 AM
 */

require_once('logged_session.php');
if($id != $_POST['id']){
    echo "<script>alert(\"You are not allowd in this page\")</script>";
    echo("<script>location.href='../index.php'</script>");
}else
{
    if(isset($_POST['update'])) {
        include('pdo_connection.php');
        include('database_config.php');
        $db_user = $database_user;
        $db_pass = $databse_pass;
        $db_name = $database_name;
        $dbcon = $connection_object->connection('localhost', $db_user, $db_pass, $db_name);
            $id = $_POST['id'];
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $crimes = $_POST['crimes'];
            $password = $_POST['password'];
            if (!empty(trim($_POST['first_name'])) || !empty(trim($_POST['email']))) {
                $sql = "UPDATE user SET fname = '$fname', lname = '$lname', dob = '$dob', crimes = '$crimes', address = '$address', email = '$email' WHERE id =$id;";
                $preparestatement = $dbcon->prepare($sql);
                $preparestatement->execute();
                echo("<script>alert('Successfully update..!!')</script>");
                echo("<script>location.href='profile.php'</script>");
            } else {
                echo("<script>alert('Sorry.! You put some field empty!')</script>");
                echo("<script>location.href='index.php'</script>");
            }
    }
}
?>