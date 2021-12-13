<?php
define('DB_SERVER', 'localhost'); // Hostname
define('DB_USER', 'root'); //Database Username
define('DB_PASS', ''); // Database Password
define('DB_NAME', 'db_moforyou'); // Database Name

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
}
?>