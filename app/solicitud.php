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

$message[] = '<html><body style="font-size: 16px">';
$message[] = '<img style="width: 400px;" src="http://cdd.org.do/img/branding/centered_logo.png" alt="Centro Dominicano de Desarrollo, Inc." />';
$message[] = '<hr>';
$message[] = '<table rules="all" style="border-color: #fff; width: 500px;" cellpadding="10">';
$message[] = '<caption><h1>Solicitud de Prestamo</h1></caption>';

// Full name row
$message[] = '<tr style="background-color: #baecac">';
$message[] = '<th align="right">Nombre:</th>';
$message[] = '<td>'.$request->FirstName()." ".$request->LastName().'</td>';
$message[] = '</tr>';

// Phone field
$message[] = '<tr>';
$message[] = '<th align="right">Telefono:</th>';
$message[] = '<td>'.$request->Phone().'</td>';
$message[] = '</tr>';

// Email field
$message[] = '<tr>';
$message[] = '<th align="right">Email:</th>';
$message[] = '<td>'.$request->Email().'</td>';
$message[] = '</tr>';

// Address field
$message[] = '<tr>';
$message[] = '<th align="right">Dirección:</th>';
$message[] = '<td>'.$request->Address().'</td>';
$message[] = '</tr>';

// Sector field
$message[] = '<tr>';
$message[] = '<th align="right">Sector:</th>';
$message[] = '<td>'.$request->Sector().'</td>';
$message[] = '</tr>';

// Province field
$message[] = '<tr>';
$message[] = '<th align="right">Provincia:</th>';
$message[] = '<td>'.$request->Province().'</td>';
$message[] = '</th>';

// Country field
$message[] = '<tr>';
$message[] = '<th align="right">País:</th>';
$message[] = '<td>'.$request->Country().'</td>';
$message[] = '</tr>';

$message[] = '</body></html>';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

print implode("\r\n", $headers);

mail('aneudy.catalino@gmail.com', 'Solicitud de Prestamo', implode("\r\n", $message), implode("\r\n", $headers));









