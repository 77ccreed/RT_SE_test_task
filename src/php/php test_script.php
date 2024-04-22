<?php

require_once 'Patient.php';

// Connect to the MySQL database
$mysqli = new mysqli('localhost', 'root', '', 'test_task');

// Query the database for all patient numbers
$query = "SELECT pn FROM patient ORDER BY pn ASC";
$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
  // Create a new Patient object for each patient number
  $patient = new Patient($row['pn']);
  // Print the table for the current date
  $patient->printTable(date('Y-m-d'));
}

// Close the database connection
$mysqli->close();