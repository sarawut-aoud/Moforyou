<?php
define('DB_SERVER', 'localhost'); // Hostname
define('DB_USER', 'root'); //Database Username
define('DB_PASS', ''); // Database Password
define('DB_NAME', 'db_moforyou'); // Database Name
date_default_timezone_set('Asia/Bangkok');
class Database
{
    // Connect Database
    public function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }
    
    public function real_escape_string($valuse)
    {
        $real = mysqli_real_escape_string($this->dbcon, $valuse);
        return $real;
    }

   

}
