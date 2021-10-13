<?php

    class ConnectDB extends PDO {
        
        private $db = null;
        var $userName = 'root';
        private $userPassword = 'root';
        private $hostName = 'localhost';
        private $dbName = 'planificacio_cognitiva';

        public function __construct(){
            
            try{

                //$this->db = new PDO('mysql:dbname=planificacio_cognitiva;host=localhost','root', 'root');// TODO FIX
                $this->db = new PDO('mysql:dbname='.$this->dbName.';host='.$this->hostName,$this->userName, $this->userPassword);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }catch(PDOException $e){
                var_dump($e);
            }

        }
        

        public function disconnect(){
            $this->$db = null;
        }

    }


