<?php

// Import all databas classes
require './classes/animal.php';


/** Database connection manager */
class Database {
    private $conn;
    private $dbName;

    function __construct($database) {
        $this->dbName = $database;
    }

    private function preQuery() {
        if ($this->conn == null) {
            $this->conn = new mysqli('localhost', 'root', '', $this->dbName);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            } 
        }
    }

    private function postQuery() {
        // We no longer wants to close the connection after each query
        //$this->conn->close();
        // $this->conn = null;
    }

    private function query($queryString) {
       return $this->conn->query($queryString);
    }

    public function getAllAnimals() {
        $table = 'djur';
        $this->preQuery();
        
        $results = $this->query("SELECT * FROM $table");
        $finishedArrayOfAnimals = [];
        $object = $results->fetch_object('Animal', [$this->conn]);

        while( $object != null ) {
            array_push($finishedArrayOfAnimals, $object);
            $object = $results->fetch_object('Animal', [$this->conn]);
        }
        
        $this->postQuery();

        return $finishedArrayOfAnimals;
    }
}