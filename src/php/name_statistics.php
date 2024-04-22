<?php
// Connect to the MySQL database
$mysqli = new mysqli('localhost', 'root', '', 'test_task');

function createNameStats($mysqli) {
  // Query the database for all patient names
  $query = "SELECT first, last FROM patient";
  $result = $mysqli->query($query);
  $names = '';
  while ($row = $result->fetch_assoc()) {
    // Concatenate the names into a single string
    $names .= $row['first'].$row['last'];
  }
  // Convert the string to lowercase and remove non-alphabetic characters
  $names = strtolower(preg_replace("/[^a-z]/", "", $names));
  // Count the occurrences of each letter
  $counts = count_chars($names, 1);
  // Calculate the total number of letters
  $total = strlen($names);
  // Sort the counts array by key (letter) in ascending order
  ksort($counts);
  // Determine the appropriate line break
  $lineBreak = PHP_SAPI === 'cli' ? "\n" : "<br>";
  // Display the results
    foreach ($counts as $letter => $count) {
        $percentage = number_format($count / $total * 100, 2);
        echo strtoupper(chr($letter))."\t".$count."\t".$percentage." %".$lineBreak;
  }
}

// Call the function
createNameStats($mysqli);

// Close the database connection
$mysqli->close();
?>