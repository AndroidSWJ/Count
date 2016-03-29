<?php
/**
 * Created by PhpStorm.
 * User: SWJ
 * Date: 2016/3/21
 * Time: 8:54
 */
class DBConnect{
    private static $conn;
    private static $instance;
    private $once=false;
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "61388";
    private $database='BackCount';

    public static function get_instance(){
        if(!(self::$instance instanceof self)){
            self::$instance=new self();
        }
        return self::$instance;
    }

    public function connect(){
        if(!$this->once){
        self::$conn = mysqli_connect($this->servername, $this->username, $this->password,$this->database);
        $this->once=true;

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
   }
        return self::$conn;
    }


}
