<?php

    require 'model/connectDB.php';
    require 'model/PatientModel.php';

    $connection = new ConnectDB;
    $makePatientLogin = new PatientModel;

    $patientId = $_REQUEST['patientId'];
    $patientPassword = $_REQUEST['patientPassword'];

    $jsonData = $makePatientLogin->patientLogin($connection,$patientId,$patientPassword);

    header('Content-Type: application/json; charset=utf-8');
    echo $jsonData;

