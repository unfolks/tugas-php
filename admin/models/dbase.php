<?php
    class database {
        private $host;
        private $user;
        private $pass;
        private $dbase;

        public $conn;

        function __construct($host, $user, $pass, $dbase)
        {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->dbase = $dbase;

            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbase) or die(mysqli_error());

            if (!$this -> conn){
                return false;
            }else{
                return true;
            }
        }
        
    }
?>