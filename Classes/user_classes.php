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
    public static function getTopChef(int $x):array{
        $dbh = new Dbh();
        $connection = $dbh->connect();

        $query = "SELECT users_id, users_user_name FROM users";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $chefsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pairs = [];
        foreach($chefsData as $chefData){
            $chef = new User(
                (int)$chefData['users_id'],
                $chefData['users_user_name']
            );
            $pairs[] = array($chef, self::setFinalUserRating($chef->getUsername()));
        }
        uasort($pairs, function ($a, $b) {
            return $b[1] - $a[1];
        });

        $i = 0;
        $chefs = [];
        foreach ($pairs as $pair) {
            $chefs[] = $pair[0];
            $i++;
            if ($i == $x) break;
        }
        return $chefs;
    }
    public static function setFinalUserRating(string $username)
    {
        $rating = self::avg(self::getUserIdByUsername($username));
        $recipes = Recipe::getRecipesByUsername($username);
        $fuzzy_rating = 1;
        $fuzzy_recipes = 1;


        if ($rating <= 3) $fuzzy_rating = 1;
        else if (($rating > 3) && ($rating <= 4)) $fuzzy_rating = 2;
        else if (($rating > 4) && ($rating <= 5)) $fuzzy_rating = 3;
        $fuzzy_rating = 0;


        if ($recipes <= 1) $fuzzy_recipes = 1;
        else if (($recipes > 4) && ($recipes <= 3)) $fuzzy_recipes = 2;
        else if ($recipes > 4) $fuzzy_recipes = 3;
        $fuzzy_users = 0;

        if ($rating == 1) return 1;
        else if (($fuzzy_rating == 2) && ($fuzzy_recipes == 2)) return 2;
        else if (($fuzzy_rating == 2) && ($fuzzy_recipes == 3)) return 3;
        else if (($fuzzy_rating == 3) && ($fuzzy_recipes == 2)) return 3;
        else if (($fuzzy_rating == 2) && ($fuzzy_recipes == 1)) return 1;
        else if (($fuzzy_rating == 3) && ($fuzzy_recipes == 1)) return 2;
        else if (($fuzzy_rating == 3) && ($fuzzy_recipes == 3)) return 3;
        return 0;
    }

    public function getId():int{
        return $this->id;
    }
    public function getUsername():string{
        return $this->username;
    }
}