<?php
// Connect to the MySQL database
$mysqli = new mysqli('localhost', 'root', '', 'test_task');

function displayPatientInfo($mysqli) {
  // Query the database and display the patient and insurance information
  $query = "SELECT patient.pn, patient.last, patient.first, insurance.iname, insurance.from_date, insurance.to_date
        FROM patient
        INNER JOIN insurance ON patient._id = insurance.patient_id
        ORDER BY insurance.from_date, patient.last";
  $result = $mysqli->query($query);
  // Determine the appropriate line break
  $lineBreak = PHP_SAPI === 'cli' ? "\n" : "<br>";
  while ($row = $result->fetch_assoc()) {
    // Format the dates
    $from_date = date("m-d-Y", strtotime($row['from_date']));
    $to_date = date("m-d-Y", strtotime($row['to_date']));
    // Display the row
    echo $row['pn'].', '.$row['last'].', '.$row['first'].', '.$row['iname'].', '.$from_date.', '.$to_date.$lineBreak;
  }
}

// Call the function
displayPatientInfo($mysqli);

// Close the database connection
$mysqli->close();
?>