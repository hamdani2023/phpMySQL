<?php

class Database
{
    private $servername = "localhost";
    private $username = "isil";
    private  $password = "isil";
    private   $dbname = "bookdb";

    private $conn = null;

    // Connect to the database
    public function connect()
    {
        if ($this->conn == null) {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            //echo "Connected successfully <br><br>";
        }

        return $this->conn;
    }


    public function testConnection()
    {

        if ($this->conn->connect_error) {
            return "Connection failed: " . $this->conn->connect_error;
        } else {
            return "Connection successful";
        }
    }


    // Disconnect from the database
    public function disconnect()
    {
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
            //echo "<br><br>Disconnected successfully";
        }
    }
}
