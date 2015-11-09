<?php
/**
 * Created by PhpStorm.
 * User: Mozammel
 * Date: 11/8/2015
 * Time: 12:33 PM
 */

require_once('../logged_session.php');
include('../pdo_connection.php');
include('../database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_name=$database_name;
$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
if($rank == 'admin')
{
    $id=$_GET['id'];
    $sql="update user set rank = 'admin' where id = $id;";
    $preparestatement=$dbcon->prepare($sql);
    $preparestatement->execute();
    echo("<script>alert('You have made a new admin ..!!')</script>");
    echo("<script>location.href='index.php'</script>");


}
else
{

    echo("<script>alert('You are not allowed on this page...')</script>");
    echo("<script>location.href='index.php'</script>");
}