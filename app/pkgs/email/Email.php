<?php
/**
 * Created by PhpStorm.
 * User: aneudy
 * Date: 17/12/17
 * Time: 4:47 PM
 */

class Email {
  private $receiver;
  private $subject;
  private $message;
  private $headers;

  public function To($email) {
    $this->receiver = $email;
  }

  public function GetReceiver() {
    return $this->receiver;
  }

  public function Subject($subject) {
    $this->subject = $subject;
  }

  public function GetSubject() {
    return $this->subject;
  }

  public function Message($message) {
    $this->message = $message;
  }

  public function GetMessage() {
    return $this->message;
  }

  public function Headers($headers) {
    $this->headers = $headers;
  }

  public function GetHeaders() {
    return $this->headers;
  }
}