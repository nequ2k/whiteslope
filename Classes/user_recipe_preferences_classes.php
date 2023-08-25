<?php
require_once 'dbh_classes.php';

class UserPreference extends Dbh
{
    private int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getPreferences(): array
    {
        $connection = $this->connect();

        $query = 'SELECT * FROM categories';
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $categories;
    }

    public function getSpicy():bool
    {
        $connection = $this->connect();

        $query = 'SELECT isSpicy FROM users';
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result[0]["isSpicy"]==1) return true;
        else return false;
    }

    public function getVegan():bool
    {
        $connection = $this->connect();

        $query = 'SELECT isVegan FROM users';
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result[0]["isVegan"]==1) return true;
        else return false;
    }
    public function getUserPreferences(): array
    {
        $connection = $this->connect();

        $query = "SELECT preference FROM user_preferences WHERE user_id = :user_id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':user_id',$this->userId, PDO::PARAM_INT);
        $stmt->execute();
        $preferences = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $preferences;
    }
    
    public function saveUserPreferences(int $userId,?string $data)
    {
        $connection = $this->connect();
    if($data ===NULL) $data="";
    $queryCheck = "SELECT user_id FROM user_preferences WHERE user_id = :user_id";
    $stmtCheck = $connection->prepare($queryCheck);
    $stmtCheck->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmtCheck->execute();

    if ($stmtCheck->rowCount() > 0) {
        $queryUpdate = "UPDATE user_preferences SET preference = :preference WHERE user_id = :user_id";
        $stmtUpdate = $connection->prepare($queryUpdate);
        $stmtUpdate->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':preference', $data, PDO::PARAM_STR);
        $stmtUpdate->execute();
    } else {
        $queryInsert = "INSERT INTO user_preferences (user_id, preference) VALUES (:user_id, :preference)";
        $stmtInsert = $connection->prepare($queryInsert);
        $stmtInsert->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmtInsert->bindParam(':preference', $data, PDO::PARAM_STR);
        $stmtInsert->execute();
    }
    }

}
?>
