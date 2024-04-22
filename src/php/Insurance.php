<?php

class Insurance {
  // Properties
  private $_id;
  private $iname;
  private $from_date;
  private $to_date;

  // Constructor
  public function __construct($_id, $iname, $from_date, $to_date) {
    $this->_id = $_id;
    $this->iname = $iname;
    $this->from_date = $from_date;
    $this->to_date = $to_date;
  }

  // Methods
  public function getInsuranceName() {
    return $this->iname;
  }

  public function isValid($date) {
    return $date >= $this->from_date && $date <= $this->to_date;
  }
}