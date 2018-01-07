<?php
/**
 * User: aneudy
 * Date: 17/12/17
 * Time: 3:27 PM
 *
 * This class handles the Suggestion messages sent via the
 * Suggestions mailbox form linked from the footer of the page.
 *
 */

class Suggestion {
  private $area;
  private $suggestion;

  public function setArea($area) {
    $this->area = $area;
  }

  public function setSuggestionMsg($suggestion) {
    $this->suggestion = $suggestion;
  }

  public function Area() {
    return $this->area;
  }

  public function SuggestionMsg() {
    return $this->suggestion;
  }
}