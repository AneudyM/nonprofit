<?php
/**
 * Created by PhpStorm.
 * User: aneudy
 * Date: 17/12/17
 * Time: 2:57 PM
 */

spl_autoload_register(
  function($class_name) {
    require_once("pkgs/email/".$class_name.".php");
  }
);

