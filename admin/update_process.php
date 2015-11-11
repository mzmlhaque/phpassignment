<?php
require_once('../logged_session.php');
if($rank != 'admin'){
    echo "<script>alert(\"You are not allowd in this page\")</script>";
    echo("<script>location.href='../index.php'</script>");
}else
{
    include('../pdo_connection.php');
    include('../database_config.php');
    $db_user =$database_user;
    $db_pass =$databse_pass;
    $db_name=$database_name;
    $dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
    if($rank = 'admin')
    {
    $id=htmlentities($_POST['id']);
    $fname=htmlentities($_POST['first_name']);
    $lname=htmlentities($_POST['last_name']);
    $dob=htmlentities($_POST['dob']);
    $address=htmlentities($_POST['address']);
    $email=htmlentities($_POST['email']);
        $email = strtolower($email);
    $crimes=htmlentities($_POST['crimes']);
    $password=htmlentities($_POST['password']);
    if(!empty(trim($_POST['first_name'])) || !empty(trim($_POST['email'])))
    {
        //$sql="UPDATE user SET name = '$fname','$lname','$dob','$address','$user','$crimes','$password' WHERE id=$id;";
        $sql = "UPDATE user SET fname = '$fname', lname = '$lname', dob = '$dob', crimes = '$crimes', address = '$address', email = '$email' WHERE id =$id;";
        //$sql="UPDATE user SET fname = $fname, lname = $lname, dob = $dob, address = $address, email = $email, crimes = $crimes, password = '$password' WHERE id=$id;";
        $preparestatement=$dbcon->prepare($sql);
        $preparestatement->execute();
        echo("<script>alert('Successfully update..!!')</script>");
        echo("<script>location.href='index.php'</script>");
    }
    else
    {
        echo("<script>alert('Sorry.! You put some field empty!')</script>");
        echo("<script>location.href='index.php'</script>");
    }
}else{
        echo("<script>alert('something went wrong')</script>");
        echo("<script>location.href='index.php'</script>");
    }
}