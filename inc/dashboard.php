<?php
/**
 * Created by PhpStorm.
 * User: SERAC-Bangladesh
 * Date: 11/7/2015
 * Time: 11:09 PM
 */
if(isset($_SESSION['user']) && $_SESSION['user'] !=null){
    echo "<script>alert(\"You are logged in\")</script>";
    echo("<script>location.href='../index.php'</script>");

}else
{
    echo $html;

}

?>
