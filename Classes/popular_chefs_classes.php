<?php
declare(strict_types=1);
require 'dbh_classes.php';
class PopularChefs extends \Dbh
{
   private int $user_id;
   private string $user_name;

   public function getPopularChefs($count): array
   {
       
       return $chefs;
   }




}