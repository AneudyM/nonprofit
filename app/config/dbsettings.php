<?php
/**
 * Created by PhpStorm.
 * User: amota
 * Date: 27/12/17
 * Time: 5:10 PM
 */

$user = "intelycs_dr_adm";
$pass = "djb5944014";
$host = "intelycs.com";
$db = "intelycs_dr_adm";

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
  echo "Error: ".$mysqli->connect_errno. " - " . "Access to database denied.";
}
