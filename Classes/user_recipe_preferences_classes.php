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
    public function saveUserPreferences(): string
    {
    	
    }

}
?>
