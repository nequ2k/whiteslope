<?php
include_once 'recipe_classes.php';

class User extends Dbh
{
    private int $id;
    private string $username;
    public function __construct(int $id, string $username)
    {
        $this->id = $id;
        $this->username = $username;
    }

    public static function getUserIdByUsername(string $username):int{
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT users_id FROM users where users_user_name = :username";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $data['users_id'];
        return $id;
    }
    public static function searchChefs(string $chef):array{
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT users_id, users_user_name FROM users WHERE users_user_name LIKE :chef";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':chef', "%".$chef."%", PDO::PARAM_STR);
        $stmt->execute();
        $chefsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $chefs = [];
        foreach($chefsData as $chefData){
            $chef = new User(
                (int)$chefData['users_id'],
                $chefData['users_user_name']
            );
            $chefs[] = $chef;
        }
        return $chefs;
    }
    public static function avg(int $id): float{

        $dbh = new Dbh();
        $connection = $dbh->connect();
        $query = "        SELECT u.users_user_name, AVG(r.rating) AS average_rating FROM users u 
            JOIN recipes rcp ON u.users_id = rcp.user_id LEFT JOIN ratings r ON rcp.recipe_id = r.recipe_id
            WHERE u.users_id = :id GROUP BY u.users_user_name;";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $ratingsData = $stmt->fetch(PDO::FETCH_ASSOC);
        if($ratingsData == null) return 0;
        return round((float)$ratingsData['average_rating'],1);
    }
    public function getId():int{
        return $this->id;
    }
    public function getUsername():string{
        return $this->username;
    }
}