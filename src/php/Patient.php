<?php

require_once 'PatientRecord.php';
require_once 'Insurance.php';

class Patient implements PatientRecord {
  // Properties
  private $_id;
  private $pn;
  private $first;
  private $last;
  private $dob;
  private $insurances = [];

  // Constructor
  public function __construct($pn) {
    // Connect to the MySQL database
    $mysqli = new mysqli('localhost', 'root', '', 'test_task');

    // Query the database for the patient with the given pn and fill out the properties
    $query = "SELECT * FROM patient WHERE pn = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $pn);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $this->_id = $row['_id'];
    $this->pn = $row['pn'];
    $this->first = $row['first'];
    $this->last = $row['last'];
    $this->dob = $row['dob'];

    // Query the database for the insurances of the patient and fill out the $insurances array with new Insurance objects
    $query = "SELECT * FROM insurance WHERE patient_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $this->_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      $this->insurances[] = new Insurance($row['_id'], $row['iname'], $row['from_date'], $row['to_date']);
    }

    // Close the database connection
    $mysqli->close();
  }

  // Methods
  public function getId() {
    return $this->_id;
  }

  public function getPatientNumber() {
    return $this->pn;
  }

  public function getName() {
    return $this->first . ' ' . $this->last;
  }

  public function getInsurances() {
    return $this->insurances;
  }

  public function printTable($date) {
    // Convert the date to the correct format
    $date = date("Y-m-d", strtotime($date));

    // Print the table
    foreach ($this->insurances as $insurance) {
      $isValid = $insurance->isValid($date) ? 'Yes' : 'No';
      echo $this->pn . ', ' . $this->getName() . ', ' . $insurance->getInsuranceName() . ', ' . $isValid . "\n";
    }
  }
}