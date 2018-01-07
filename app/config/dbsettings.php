<?php
/**
 * Created by PhpStorm.
 * User: amota
 * Date: 27/12/17
 * Time: 5:10 PM
 */

$user = "username";
$pass = "password";
$host = "hostname";
$db = "database";

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
  echo "Error: ".$mysqli->connect_errno. " - " . "Access to database denied.";
}
