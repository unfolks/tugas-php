<?php 
    class login
    {
        private $mysql;
        function __construct($conn)
        {
            $this -> mysql = $conn;
        }

        public function LoginUser($email, $password)
        {
            $db = $this->mysql->conn;
            $sql = "SELECT * FROM tbuser Where email='$email' And password='$password'";     
            $query = $db->query($sql) or die ($db->error);      
            
            return $query;
            
        }

        public function get_sesi()
        {
            return $_SESSION['loginadmin'];
        }
    }
    

?>