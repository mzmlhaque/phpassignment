<?php
error_reporting(0);
require_once('../logged_session.php');
$update_id = $_GET['id'];
if($rank != 'admin'){
    echo "<script>alert(\"Access Denied\")</script>";
    echo("<script>location.href='../index.php'</script>");
}else
{
    include('../pdo_connection.php');
    include('../database_config.php');
    $db_user =$database_user;
    $db_pass =$databse_pass;
    $db_name=$database_name;
    $dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
    $sql="SELECT * FROM user WHERE id=$update_id";
    $data = $dbcon->query($sql);
    $row = $data->fetch(PDO::FETCH_ASSOC);
    include_once('admin_header.php');
    include_once('edit-template.php');
}
?>