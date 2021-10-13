<?php

class PatientModel {

    public function patientLogin($conn,$patientId,$patientPassword){


        $jsonData = new stdClass();
        $jsonData->patientId = "";
        $jsonData->patientPassword = "";
        $jsonData->patientName = "";



        $stmt = $conn->prepare("SELECT n_historial_clinic, nom, telefon FROM PACIENTS WHERE n_historial_clinic = :patientId");
        $stmt->bindParam(':patientId',$patientId);
        $stmt->execute();
        $patientExists = $stmt->rowCount();

        if($patientExists == 1){

            $patientData = $stmt->fetch(PDO::FETCH_OBJ);
            $savedPassword = $patientData->telefon;
            if(password_verify($patientPassword,$savedPassword)){

                $jsonData->patientId = $patientData->n_historial_clinic;
                $jsonData->patientPassword = "true";
                $jsonData->patientName = $patientData->nom;

            }else{
                $jsonData->patientPassword = "false";
            }
        }else{
            $jsonData->patientId = "false";
        }

        return $jsonData;

    }

}