<?php
require_once 'dbh_classes.php';

class UserPreference extends Dbh
{
    private int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserPreferences(): array
    {
        $connection = $this->connect();

        $query = 'SELECT * FROM categories';
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $categories;
    }
    
    public function saveUserPreferences(int $userId,string $data)
    {
        $connection = $this->connect();

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
