<?php
class Products {
    public $products = array();

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

         $sql = 'SELECT * FROM `products`';
         $stmt = $this->pdoprepare($sql);
         $stmt->execute();

         while  ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             $this->produducts[] = $row;
         }

        }
    


    // public function __construct() {
    //     //"00000001"," F1000"," Fudge","Invenire percipitur eum ea, in saepe persequeris has, meis dicta albucius an vix. Utinam nonumes necessitatibus vel ne. Ad mea tacimates temporibus. Duo dicam timeam integre in. Ius an libris latine, ludus inimicus quo te, ridens scripta placerat in pri. Nec ex feugiat abhorreant.
    //     // ","0.10","1","95_2542284"

    //     $labels = array('id', 'sku', 'title', 'description', 'price', 'special', 'link');
    //     $fh = fopen('./Model/products.csv', 'r');
    //     if ($fh) {
    //         while (!feof($fh)) {
    //             $row = fgetcsv($fh);
    //             $tempRow = array();
    //             if(isset($row) && is_array($row) && count($row) > 0) {
    //                 foreach($row as $key => $value) {
    //                     $tempRow[$labels[$key]] = $value;
    //                 }
    //                 $this->products[] = $tempRow;

    //             }
    //         }
    //     }
    // }

    public function getProducts(){
        return $this->products;
    }

    public function getTitles() {
        $titles = array();
        foreach($this->products as $row) {
            $titles[] = $row['title'];
        }
        return $titles;
    }

}



?>