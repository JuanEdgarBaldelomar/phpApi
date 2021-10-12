<?php


    if (!isset($_GET['option'])){

        //TODO controller 404

    }else{
        $action = $_GET['option'];

        switch ($action){

            case 'loginPatient':
                include  __DIR__ . '/controller/controllerPatientLogin.php';
                break;
            case 'getPatientActivities':
                //TODO controller getPatientActivities
                break;
            case 'setActivityDone':
                //TODO controller setActivityDone
                break;
            default:
                //TODO controller 404
                break;
        }

    }

