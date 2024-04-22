-- Create the database
CREATE DATABASE IF NOT EXISTS test_task;
USE test_task;

-- Create the patient table
CREATE TABLE IF NOT EXISTS patient (
    _id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pn VARCHAR(11) DEFAULT NULL,
    first VARCHAR(15) DEFAULT NULL,
    last VARCHAR(25) DEFAULT NULL,
    dob DATE DEFAULT NULL
);

-- Create the insurance table
CREATE TABLE IF NOT EXISTS insurance (
    _id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_id INT(10) UNSIGNED NOT NULL,
    iname VARCHAR(40) DEFAULT NULL,
    from_date DATE DEFAULT NULL,
    to_date DATE DEFAULT NULL,
    FOREIGN KEY (patient_id) REFERENCES patient(_id)
);

-- Populate the patient table
INSERT INTO patient (pn, first, last, dob) VALUES
('001', 'John', 'Doe', '1990-01-01'),
('002', 'Jane', 'Doe', '1992-02-02'),
('003', 'Jim', 'Beam', '1993-03-03'),
('004', 'Jill', 'Valentine', '1994-04-04'),
('005', 'Jack', 'Sparrow', '1995-05-05');

-- Populate the insurance table
INSERT INTO insurance (patient_id, iname, from_date, to_date) VALUES
(1, 'Medicare', '2020-01-01', '2023-01-01'),
(1, 'Blue Cross', '2021-02-01', '2024-02-01'),
(2, 'Medicaid', '2020-03-01', '2023-03-01'),
(2, 'HealthNet', '2021-04-01', '2024-04-01'),
(3, 'Cigna', '2020-05-01', '2023-05-01'),
(3, 'Aetna', '2021-06-01', '2024-06-01'),
(4, 'UnitedHealth', '2020-07-01', '2023-07-01'),
(4, 'Humana', '2021-08-01', '2024-08-01'),
(5, 'Kaiser', '2020-09-01', '2023-09-01'),
(5, 'Blue Shield', '2021-10-01', '2024-10-01');
