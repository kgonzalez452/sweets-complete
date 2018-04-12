<?php
class Members {
    public $members = array();

    //mysql connection params
     public $user = 'sweetscomplete';
     public $dbname = 'sweetscomplete';
     public $password = 'Extremejello14';
     public $host = 'localhost';
     public $dsn = '';
     public $pdo = '';
     public $testmode = TRUE;

     public function __construct() {
         $this->$dsn = sprintf('mysql:dbname=%s;host=%s', $this->dbname, $this->host);
         if ($this->testmode) {
             $this->pdo = new PDO($this->dsn, $this->$user, $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
         } else {
             $this->pdo = new PDO($this->dsn, $this->user, $this->password);
         }

         $sql = 'SELECT * FROM `members`';
         $stmt = $this->pdoprepare($sql);
         $stmt->execute();

         while  ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             $this->members[] = $row;
         }

        }
    
    // public function __construct() {

    // }

    public function getmembers() {
        return $this->members;
    }

}

?>