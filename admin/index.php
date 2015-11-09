<?php
/**
 * Created by PhpStorm.
 * User: SERAC-Bangladesh
 * Date: 11/7/2015
 * Time: 11:09 PM
 */
require_once('../logged_session.php');
echo $id;
if(!isset($user) && $rank != 'admin'){
    echo "<script>alert(\"You are not allowd in this page\")</script>";
    echo("<script>location.href='../index.php'</script>");
}else
{
    include_once('dashboard.php');
}
?>
