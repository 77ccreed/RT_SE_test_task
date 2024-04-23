# RT_SE Test Task

This repository contains the implementation for a MySQL and PHP test task designed to manage patient and insurance data. The project is structured to demonstrate database operations, PHP scripting, and object-oriented programming.

## Project Structure

The project is organized into several directories and files:

- **/src**
  - **/database**
    - `schema.sql`: SQL scripts for creating and populating database tables.
  - **/php**
    - `Insurance.php`: Defines the `Insurance` class, which represents an insurance policy.
    - `Patient.php`: Defines the `Patient` class, which represents a patient and their associated insurances.
    - `PatientRecord.php`: Defines the `PatientRecord` interface, which the `Patient` class implements.
    - `name_statistics.php`: A script that calculates and displays statistics about the names of the patients in the database.
    - `patient_insurance_info.php`: A script that displays information about the patients and their insurances in the database.
    - `test_script.php`: A test script that creates `Patient` objects for all patients in the database and prints a table of their insurances and whether they are valid on the current date.
- `README.md`: Project documentation.

## Setup

To set up the project:

1. Start your MySQL server.
2. Create a new database named `test_task`.
3. Run the `schema.sql` script to create and populate the `patient` and `insurance` tables in the `test_task` database.
4. Update the database connection parameters in the PHP scripts if necessary.

## Usage

To use the project, run the PHP scripts in the `/php` directory. For example, to run the `test_script.php` script, use the following command:

```sh
php test_script.php
```

This will print a table with the patient number, name, insurance name, and whether the insurance is valid on the current date, for all patients and their insurances. The table is ordered by patient number in ascending order.
