<?php
 class Database {

     public $connection;
     public $statement;
     public function  __construct($config, $userName, $password)
     {
         $dsn = "mysql:". http_build_query($config, "", ";");
//         $dsn = 'mysql:host=localhost;dbname=DynamicWebApplication;user=root;charset=utf8;port=3306;password=root';
         $this->connection = new PDO($dsn, $userName, $password,  [
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         ]);
     }

     public function constructQuery($query, $params = [])
     {
         $this->statement = $this->connection->prepare($query);
         $this->statement->execute( $params);

         return $this;
     }

     public function find(){
         return $this->statement->fetch();
     }

     public function findOrFail(){
         $result = $this->statement->fetch();
         if(!$result) {
             abort();
         }

         return $result;
     }

     public function get(){
         return $this->statement->fetchAll();
     }
 }