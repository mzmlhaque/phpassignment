<?php
require_once('inc/header.php');
require_once('logged_session.php');
include('pdo_connection.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_name=$database_name;
$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
$update_id=htmlentities($_GET['id']);
$sql="SELECT * FROM user WHERE id=$update_id";
$data = $dbcon->query($sql);
$row = $data->fetch(PDO::FETCH_ASSOC);

if($_SESSION['id']!= $update_id && $_SESSION['user']!= $row['email'])
{
    echo("<script>alert('You are not allowed to edit this user.')</script>");
    echo("<script>location.href='profile.php'</script>");
}else
{
    include_once('inc/update_template.php');
    include_once('inc/footer.php');
}
?>