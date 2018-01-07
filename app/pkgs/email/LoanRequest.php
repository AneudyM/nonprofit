<?php
/**
 * User: aneudy
 * Date: 17/12/17
 * Time: 3:22 PM
 *
 * This class handles the Loan Requests messages requested via
 * the Micro-loans Request Form in the "servicios/solicitud.html"
 * page.
 *
 */

class LoanRequest {
  private $firstName;
  private $lastName;
  private $phone;
  private $email;
  private $address;
  private $municipality;
  private $province;
  private $country;

  /** Setters */
  public function setFirstName($firstname) {
    $this->firstName = $firstname;
  }

  public function setLastName($lastname) {
    $this->lastName = $lastname;
  }

  public function setPhone($phone) {
    $this->phone = $phone;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setAddress($address) {
    $this->address = $address;
  }

  public function setMunicipality($municipality) {
    $this->municipality = $municipality;
  }

  public function setProvince($province) {
    $this->province = $province;
  }

  public function setCountry($country) {
    $this->country = $country;
  }

  /** Getters */

  public function FirstName() {
    return $this->firstName;
  }

  public function LastName() {
    return $this->lastName;
  }

  public function Phone() {
    return $this->phone;
  }

  public function Email() {
    return $this->email;
  }

  public function Address() {
    return $this->address;
  }

  public function Municipality() {
    return $this->municipality;
  }

  public function Province() {
    return $this->province;
  }

  public function Country() {
    return $this->country;
  }

}



