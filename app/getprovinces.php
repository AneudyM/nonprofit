<?php
/**
 * User: amota
 * Date: 06/01/18
 * Time: 2:10 PM
 */

include_once("../app/config/dbsettings.php");

$province = utf8_decode($_GET['province']);

$municipalities = $mysqli->query("SELECT name FROM municipality WHERE province_name='$province'");

while ($row = $municipalities->fetch_assoc()) {
  echo "<option>".utf8_encode($row['name'])."</option>"."\n";
}
