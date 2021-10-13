<?php

    class ConnectDB extends PDO {
        

        var $userName = 'root';
        private $userPassword = 'root';
        private $hostName = 'localhost';
        private $dbName = 'planificacio_cognitiva';

        public function __construct(){
            
            try{
                parent::__construct('mysql:dbname='.$this->dbName.';host='.$this->hostName,$this->userName, $this->userPassword);
            }catch(PDOException $e){
                var_dump($e);
            }

        }


    }


