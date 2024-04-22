<?php

interface PatientRecord {
  public function getId(); // method for returning implementing record "_id" property
  public function getPatientNumber(); // method for returning implementing record's associated patient number
}