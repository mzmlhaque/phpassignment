<?php
/**
 * Created by PhpStorm.
 * User: Mozammel
 * Date: 11/10/2015
 * Time: 1:32 AM
 */
error_reporting(0);
require_once('logged_session.php');
if($id != $_POST['id']){
    echo "<script>alert(\"You are not allowd in this page\")</script>";
    echo("<script>location.href='../index.php'</script>");
}else
{
    if(isset($_POST['update'])) {
        $id = htmlentities($_POST['id']);
        $fname = htmlentities($_POST['first_name']);
        $lname = htmlentities($_POST['last_name']);
        $dob = htmlentities($_POST['dob']);
        $address = htmlentities($_POST['address']);
        $email = htmlentities($_POST['email']);
        $email = strtolower($email);
        $crimes = htmlentities($_POST['crimes']);
        $password = $_POST['password'];
        include_once('pdo_connection.php');
        include_once('database_config.php');
        $db_user = $database_user;
        $db_pass = $databse_pass;
        $db_name = $database_name;
        $dbcon = $connection_object->connection('localhost', $db_user, $db_pass, $db_name);
        $sql="SELECT * FROM user WHERE email = '$email'";
        $data = $dbcon->query($sql);
        $row = $data->fetch(PDO::FETCH_ASSOC);


            if ( $id != $row['id'] && $email == $row['email']) {
                echo("<script>alert('This email is already used in another account. Please try another.')</script>");
                echo("<script>location.href='profile.php'</script>");
            }
            elseif (!empty(trim($_POST['first_name'])) || !empty(trim($_POST['email']))) {
            $sql = "UPDATE user SET fname = '$fname', lname = '$lname', dob = '$dob', crimes = '$crimes', address = '$address', email = '$email', password = '$password' WHERE id =$id;";
            $preparestatement = $dbcon->prepare($sql);
            $preparestatement->execute();
            echo("<script>alert('Successfully update..!!')</script>");
            echo("<script>location.href='profile.php'</script>");
        }

            else {
                echo("<script>alert('Sorry.! You put some field empty!')</script>");
                echo("<script>location.href='index.php'</script>");
            }
    }
}
?>