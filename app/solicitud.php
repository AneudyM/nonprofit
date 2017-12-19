<?php
/**
 * Created by PhpStorm.
 * User: aneudy
 * Date: 17/12/17
 * Time: 2:37 PM
 */

spl_autoload_register(
  function($class_name) {
    require_once('pkgs/email/'.$class_name.'.php');
  }
);

$request = new LoanRequest();
$request->setFirstName("Aneudy");
$request->setLastName("Mota");
$request->setAddress("100 Western Ave.");
$request->setCountry("United States");
$request->setEmail("aneudy.catalino@gmail.com");
$request->setPhone("269-350-4104");
$request->setProvince("Kalamazoo");
$request->setSector("Kalamazoo");










