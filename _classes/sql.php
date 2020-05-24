<?php
class sql {
    static $sql;
	static $pile=0;
    static function on() {
	    self::$pile++;
		if (self::$pile==1) {
	    self::$sql=new mysqli('localhost', 'root', 'root', 'ocn'); 
        if (mysqli_connect_error()) {
        die('Probléme de connection '.mysqli_connect_errno().''.mysqli_connect_error());
   }
     }
      }
	  static function query($requeteSql) { 
	       $req=self::$sql->query($requeteSql); 
		   if ($req) return $req;
		   else {
		       die(self::$sql->error);
			   }
			   }
      
	  static function off() {
	     self::$pile--;
	     if (self::$pile==0) self::$sql->close();
      }
	  static function escape($s) {
	       return self::$sql->real->real_escape_string($s);
	  }

}
$base = mysqli_connect ('localhost', 'root', 'root', 'ocn');