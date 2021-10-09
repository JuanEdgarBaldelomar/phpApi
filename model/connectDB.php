<?php

    class connectDB extends PDO{
        
        private $db;
        private $userName = 'root';
        private $userPassword = 'root';
        private $hostName = 'localhost';
        private $dbName = 'planificacio_cognitiva';

        function __construct(){
            
            try{

                //$this->db = new PDO("mysql:dbname={$dbName};host={$hostName}",$userName,$userPassword);
                //$this->db = new PDO('mysql:host=localhost;dbname={$dbName}',$userName,$userPassword);
                //$this->db = new PDO('mysql:host={$hostName};port=8889;dbname={$dbName}',$userName,$userPassword);
                $this->db = new PDO('mysql:dbname=planificacio_cognitiva;host=localhost','root', 'root');// TODO FIX
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }catch(PDOException $e){
                var_dump($e);
            }

        }
        

        function disconnect(){
            $this->$db = null;
        }
        

    }

?>
