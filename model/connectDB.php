<?php

    class ConnectDB extends PDO{
        
        private $db;
        private $userName = 'root';
        private $userPassword = 'root';
        private $hostName = 'localhost';
        private $dbName = 'planificacio_cognitiva';

        public function __construct(){
            
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
        

        public function disconnect(){
            $this->$db = null;
        }

        /**
         * @throws Exception
         */
        private function executeQuery($query = "", $params = []){

            try{

                $stmt = $this->db->prepare($query);
                if ($stmt == false){
                    throw new  Exception("No se puede preparar la consulta: " . $query);
                }

                if($params){
                    $stmt->bindParam($params[0],$params[1]);
                }


                $stmt->execute();
                return $stmt;

            }catch(Exception $e){
                throw  new Exception($e->getMessage());
            }

        }


        /**
         * @throws Exception
         */
        public function select($query = "", $params = []){


            try {

                $stmt = $this->executeQuery($query,$params);
                $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                $stmt->close();

                return $result;

            }catch (Exception $e){
                throw new Exception($e->getMessage());
            }
            return false;
            

        }


    }


