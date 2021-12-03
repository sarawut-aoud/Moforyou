<?php 

    define('DB_SERVER','localhost'); // Hostname
    define('DB_USER','root'); //Database Username
    define('DB_PASS',''); // Database Password
    define('DB_NAME','db_moforyou'); // Database Name

    class DB_con {
        // Connect Database
        function __construct()
        {
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME); 
            $this->dbcon = $conn;
            
            if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL : ". mysqli_connect_error();
            }
        }

        // Resgistration 
        public function register($card,$fname,$email,$phone,$username,$password){
            $reg = mysqli_query($this->dbcon, "INSERT INTO tbl_farmer(card,fullname,email,phone,username,password) 
            VALUES('$card','$fname','$email','$phone','$username','$password')");
            return $reg;
        }
    }
?>