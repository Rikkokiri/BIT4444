<?php
//This file defines the database connection class

require_once("config.php");

//Database connection class
class DBConnection {
  private $dbConn;

  //Method for opening the database connection
  public function open_connection() {
    $this->dbConn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Error checking
    if(mysqli_connect_errno()){
      //Die() is going to print an error message to the page
      //and stop execution of the php file
      die("Database connection error: ".mysqli_connect_error()." (".mysqli_connect_errno().")");
    }
  }

  //Method for closing the database connection
  public function close_connection() {
    //If the connection is null, we are not going to close it
    if(isset($this->dbConn)) {
      mysqli_close($this->dbConn);
      unset($this->dbConn);
    }
  }

  //Method for executing query statements
  public function query($sql) {

    $result = mysqli_query($this->dbConn, $sql);

    //Error checking
    if(!$result) {
      die("Database query error: ".mysqli_error($this->dbConn)." (".mysqli_errno($this->dbConn).")");
    }
    return $result;
  }

  //Class constructor
  function __construct() {
    $this->open_connection();
  }

} //End of the class DBConnection

$mydb = new DBConnection();

?>
