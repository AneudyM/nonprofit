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

$sender = "info@intleycs.com";
$suggestion = new Suggestion();
$email = new Email();

$suggestion->setArea($_POST['area_field']);
$suggestion->setSuggestionMsg($_POST['suggestion_text']);

/** Create Email Headers */
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: '.$sender.'';

/** Create Suggestion HTML Email message */
$message[] = '<html><body style="font-size: 16px">';
$message[] = '<img style="width: 350px;" src="http://cdd.org.do/img/branding/centered_logo.png" alt="Centro Dominicano de Desarrollo, Inc." />';
$message[] = '<hr>';
$message[] = '<table rules="all" style="border-color: #fff; width: 600px;" cellpadding="10">';
$message[] = '<caption><h1>Sugerencia</h1></caption>';

/** Grab suggestion data from form */
$message[] = '<tr style="background-color: #baecac">';
$message[] = '<th width="200">Area</th>';
$message[] = '<th width="500">Sugerencia</th>';
$message[] = '</tr>';
$message[] = '<tr>';
$message[] = '<td align="center">'.$suggestion->Area().'</td>';
$message[] = '<td>'.$suggestion->SuggestionMsg().'</td>';
$message[] = '</tr>';
$message[] = '</body></html>';

$email->Headers($headers);
$email->Message($message);
$email->Subject("[Prueba] Nueva Sugerencia.");
$email->To("aneudy.catalino@gmail.com");

mail($email->GetReceiver(), $email->GetSubject(), implode("\r\n", $email->GetMessage()), implode("\r\n", $email->GetHeaders()));