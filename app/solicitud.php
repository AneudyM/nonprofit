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

$email = new Email();
$request = new LoanRequest();
$sender = 'info@intelycs.com';

$request->setFirstName($_POST['first_name']);
$request->setLastName($_POST['last_name']);
$request->setAddress($_POST['address']);
$request->setCountry($_POST['country']);
$request->setEmail($_POST['email']);
$request->setPhone($_POST['phone']);
$request->setProvince($_POST['province']);
$request->setSector($_POST['sector']);


/** Construct the Email report */
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
$message[] = '<th align="right">Tel&eacute;fono:</th>';
$message[] = '<td>'.$request->Phone().'</td>';
$message[] = '</tr>';

// Email field
$message[] = '<tr>';
$message[] = '<th align="right">Email:</th>';
$message[] = '<td>'.$request->Email().'</td>';
$message[] = '</tr>';

// Address field
$message[] = '<tr>';
$message[] = '<th align="right">Direcci&oacute;n:</th>';
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
$message[] = '<th align="right">Pa&iacute;s:</th>';
$message[] = '<td>'.$request->Country().'</td>';
$message[] = '</tr>';

$message[] = '</body></html>';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: '.$sender.'';

$email->Headers($headers);
$email->To("aneudy.catalino@gmail.com");
$email->Message($message);
$email->Subject("[Prueba] Solicitud de Prestamo");

mail($email->GetReceiver(), $email->GetSubject(), implode("\r\n", $email->GetMessage()), implode("\r\n", $email->GetHeaders()));









