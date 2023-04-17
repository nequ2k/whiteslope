<?php

declare(strict_types=1);

class Dbh
{
    const USERNAME = 'zvedcdubmz'; // probably stays, will see
    const PASSWORD = 'Whiteslope2023'; // has to be changed due to database

    const DBNAME = 'recipello-database'; //has to be changed due to database

    protected function connect()
  {
      try
      {
          $dbh = new  PDO('mysql:host=recipello-server.mysql.database.azure.com;dbname='.self::DBNAME, self::USERNAME, self::PASSWORD);
          return $dbh;
      }
      catch(PDOException $e)
      {
          echo "Error!: ".$e->getMessage()."<br />";
          die();
      }
  }




}