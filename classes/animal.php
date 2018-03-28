<?php 

    class Animal
    {
        private $conn;

        function __construct($conn)
        {
            $this->conn = $conn;
        }

        function sayName()
        {
            echo $this->namn."</br>";
        }

        function updateName($newName)
        {
            $this->namn = $newName;
            $results = $this->conn->query("UPDATE djur SET namn = '$newName' WHERE id = $this->id");
            return $results;
        }
    }