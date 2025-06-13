<?php
//Create our database
class database
{
    //save our connection information in a private variable
    private $host = '172.31.22.43';
    private $username = 'Sukhdeep200625266';
    private $password = 'XQ2z-U8vCa';
    private $database = 'Sukhdeep200625266';

    //store our connection information in a protected variable
    protected $connection;

    public function __construct()
    {
        if (!$this->connection) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->connection->connect_error) {  // <-- Check connect_error property
                die("<p>Cannot connect to database: " . $this->connection->connect_error . "</p>");
            }
        }
        return $this->connection;
    }
}
?>