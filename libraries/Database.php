<?php
    class Database {
        private $dbhost = DB_HOST;
        private $dbuser = DB_USER;
        private $dbpass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbconn;
        private $sql;
        public function __construct(){
            try {
                $this->dbconn = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
                if ($this->dbconn->connect_error) {
                    throw new Exception("Unable to connect to Database");
                }
            } catch (Exception $e) {
                echo "Error occured at " .$e->getFile(). " in class " . get_class($e) . " on line ".  $e->getLine(). " saying " .$e->getMessage();
            }
            
        }

        public function escapeString($data){
            return $this->dbconn->real_escape_string($data);
            
        }
        public function fetchUserInfo($email){
            $this->sql = "SELECT * FROM logins where Email ='$email'";
            return $this->dbconn->query($this->sql);
        }

        public function registerUser($username,$email,$password){
            try {
                $this->sql = "INSERT INTO logins (Username,Email,Pass_word) VALUES ('$username','$email','$password')";
                if ($this->dbconn->query($this->sql) === TRUE) {
                    header("location:userPage.php?");
                }else {
                    throw new Exception ("Failed to insert a record");
                }
            } catch (Exception $e) {
                echo "Error occured at " .$e->getFile(). " in class " . get_class($e) . " on line ".  $e->getLine(). " saying " .$e->getMessage();
            }
            
        }

        public function storeUserInfo($username,$email){
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
        }
        // public function validation($email,$password){
        //     try {
                
        //     } catch (\Throwable $th) {
        //         //throw $th;
        //     }
        // }
    }
    
?>
