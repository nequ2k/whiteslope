<?php

declare(strict_types=1);

class Dbh
{
    const USERNAME = 'root'; // probably stays, will see
    const PASSWORD = ''; // has to be changed due to database

    const DBNAME = 'recipello'; //has to be changed due to database

    protected function connect()
  {
      try
      {
          $dbh = new  PDO('mysql:host=localhost;dbname='.self::DBNAME, self::USERNAME, self::PASSWORD);
          return $dbh;
      }
      catch(PDOException $e)
      {
          echo "Error!: ".$e->getMessage()."<br />";
          die();
      }
  }

}