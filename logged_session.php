<?php
/**
 * Created by PhpStorm.
 * User: SERAC-Bangladesh
 * Date: 11/7/2015
 * Time: 11:36 PM
 */

session_start();
$id = $_SESSION['id'];
$user = $_SESSION['user'];
$rank = $_SESSION['rank'];
$name = $_SESSION['fname']. ' '. $_SESSION['lname'];
$address = $_SESSION['address'];
$crimes = $_SESSION['crimes'];
$date = $_SESSION['dob'];
$picture = $_SESSION['picture'];
?>